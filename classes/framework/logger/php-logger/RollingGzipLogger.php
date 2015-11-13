<?php
class RollingGzipLogger extends PSR3_Log_LoggerTrait {
	const INPUT_BUFFER_SIZE = 2048;
	const MAX_LOG_FILE_SIZE = 5242880;	// 5*1024*1024, a.k.a. 5MB
	protected $filename = '';
	protected $fp = null;
	protected $lockFilename = '';
	protected $lockFp = null;
	public function __construct($filename) {
		$this->filename = $filename;
		$this->lockFilename = $this->filename . '.lock';
	}
	public function __destruct() {
		//$this->releaseLock();  rollOver() will handle the lock
		if( isset($this->fp) ) {
			@fclose($this->fp);
			unset($this->fp);
		}
		$this->rollOver();
	}
    /**
     * Helper method to create a context array given an Exception
     * instance.  The context array is passed by reference to avoid
     * creating a duplicate copy just for the purpose of adding a
     * single element.
     *
     * @param Exception $e
     * @param array & $context passed by reference
     * @return array the context array with the exception added
     */
    public static function exceptionContext(Exception $e, & $context = array()) {
        $context['exception'] = $e;
        return $context;
    }
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array()) {
    	if( !$this->isValidLogLevel($level) ) {
    		throw new PSR3_Log_InvalidArgumentException("Unknown log level {$level}");
    	}

    	// start building our message
    	list($usec, $sec) = explode(" ", microtime());
    	$msec = round($usec * 1000);
    	while( strlen($msec) < 3 ) {
    		$msec = '0' . $msec;
    	}
    	$now = new DateTime('@' . $sec);
    	$now->setTimezone(new DateTimeZone(date_default_timezone_get()));

    	// do something with any exception in the context, should one exist
    	if( isset($context['exception']) ) {
    		$exception = $context['exception'];
    		unset($context['exception']);
    		$context = array_values($context);
    	}

		/*
		function	string	 The current function name. See also __FUNCTION__.
		line	integer	 The current line number. See also __LINE__.
		file	string	 The current file name. See also __FILE__.
		class	string	 The current class name. See also __CLASS__
		object	object	 The current object.
		type	string	 The current call type. If a method call, "->" is returned. If a static method call, "::" is returned. If a function call, nothing is returned.
		args	array	 If inside a function, this lists the functions arguments. If inside an included file, this lists the included file name(s).
		*/
	    $file = 'n/a'; 
	    $func = 'n/a'; 
	    $line = 'n/a'; 
	    $class = 'n/a';
	    $obj = 'n/a';
	    $type = 'n/a';
	    //$args = 'n/a';
	    $debugTrace = debug_backtrace(); 
	    $index = 1;
	    // TODO: wtf are we doing here, could be dangerous
	    while( !(isset($debugTrace[$index]) && isset($debugTrace[$index]['file'])) ) {
	    	$index++;
	    }
	    if( isset($debugTrace[$index]) ) { 
	        $file = isset($debugTrace[$index]['file']) ? $debugTrace[$index]['file'] : 'n/a'; 
	        $line = isset($debugTrace[$index]['line']) ? $debugTrace[$index]['line'] : 'n/a'; 
	    } 
	    if( isset($debugTrace[$index + 1]) ) {
	    	$func = isset($debugTrace[$index + 1]['function']) ? $debugTrace[$index + 1]['function'] : 'n/a'; 
	    	$obj = isset($debugTrace[$index + 1]['object']) ? $debugTrace[$index + 1]['object'] : 'n/a'; 
	    	$class = isset($debugTrace[$index + 1]['class']) ? $debugTrace[$index + 1]['class'] : 'n/a'; 
	    	$type = isset($debugTrace[$index + 1]['type']) ? $debugTrace[$index + 1]['type'] : 'n/a'; 
	    }
	    // build up the caller id portion of the message
	    $callerId = '';
	    if( $file !== 'n/a' ) {
    		$callerId = "{$file}:{$line}";
	    }
	    if( $file !== 'n/a' && $func !== 'n/a' ) {
	    	$callerId .= ' - ';
	    }
	    if( $func !== 'n/a' ) {
	    	if( $type === '->' ) {
	    		$callerId .= get_class($obj) . "{$type}{$func}";
	    	} else if( $type === '::' ) {
	    		$callerId .= "{$class}{$type}{$func}";
	    	} else {
                $callerId .= $func;
            }
	    }
    	$message = $now->format('Y-m-d H:i:s') 
    							. '.' . $msec 
    							. ' - ' . strtoupper($level) 
    							. ' - ' . $callerId 
    							. ' - ' . $this->interpolate($message, $context);

    	if( isset($exception) 
    		&& is_object($exception) 
    		&& (($exception instanceof Exception) || is_subclass_of($exception, 'Exception')) ) {
            $message .= "\n";
            $message .= (string)$exception;
    	}

    	$this->acquireLock();
    	if( !isset($this->fp) ) {
    		$this->fp = @fopen($this->filename, 'a');
		}
		if( @fstat($this->fp) === false ) {
			throw new Exception("Cannot open log file {$this->filename} for writing");
		}
		if( @fwrite($this->fp, $message) === false ) {
			throw new Exception("Fatal error writing to log file {$this->filename}");
		}
		if( substr($message, strlen($message) - 2, 1) !== PHP_EOL ) {
			if( @fwrite($this->fp, PHP_EOL) === false ) {
				throw new Exception("Fatal error writing newline to log file {$this->filename}");
			}
		}
		if( @fclose($this->fp) === false ) {
			throw new Exception("Cannot close log file {$this->filename}");
		}
		unset($this->fp);
		$this->releaseLock();
    }
    protected function isValidLogLevel($level) {
    	$clazz = null;
    	try {
	    	$clazz = new ReflectionClass('PSR3_Log_LogLevel');
    	} catch( ReflectionException $e ) {
    		throw new Exception('Fatal error reflecting PSR-3 LogLevel class, ' . $e->getMessage(), $e->getCode(), $e);
    	}
    	foreach( $clazz->getConstants() as $key => $value ) {
    		if( $value == $level ) {
    			return true;
    		}
    	}
    	return false;
    }
	/**
	* Nothing sophisticated, based on the reference 
	* implementation.
	*
	* Interpolates context values into the message 
	* placeholders.
	*/
	protected function interpolate($message, array $context = array()) {
		// build a replacement array with braces around the context keys
		$replace = array();
		foreach( $context as $key => $value ) {
			// ignore nulls and non scalars
			if( isset($value) && is_scalar($value) ) {
				$replace['{' . $key . '}'] = $value;
			}
		}
		// interpolate replacement values into the message and return
		return strtr($message, $replace);
	}
	protected function acquireLock() {
		if( !isset($this->lockFp) ) {
	    	$this->lockFp = fopen($this->lockFilename, 'w+');
	    	if( $this->lockFp === false ) {
	    		throw new Exception("Cannot open lock file {$this->lockFilename}");
	    	}
	    	// just trying to write re-entrant code, if possible
	    	if( @flock($this->lockFp, LOCK_EX) === false ) {
	    		throw new Exception("Cannot acquire lock on {$this->lockFilename}");
	    	}
		}
	}
	protected function releaseLock() {
		if( isset($this->lockFp) ) { 
			if( @flock($this->lockFp, LOCK_UN) === false) {
				throw new Exception("Fatal error unlocking lock file {$this->lockFilename}");
			}
            // releasing the lock before deleting the file is enough in Linux
            //  but in Windows we need to fclose() the lock file handle first
            if( $this->is_windows() ) {
                @fclose($this->lockFp);
            }
			if( @unlink($this->lockFilename) === false ) {
				throw new Exception("Fatal error deleting lock file {$this->lockFilename}");
			}
			unset($this->lockFp);
		}
	}
	protected function rollOver() {
		$this->acquireLock();
    	if( !isset($this->fp) ) {
    		$this->fp = @fopen($this->filename, 'rb');
		}
		if( ($stats = @fstat($this->fp)) === false ) {
			throw new Exception("Cannot open log file {$this->filename} for reading");
		}
		$size = $stats['size'];
		if( $size >= self::MAX_LOG_FILE_SIZE ) {
            // keep 1 compressed log for posterity
            $gzFilename = $this->filename . '.gz';
            if( ($gzfp = @gzopen($gzFilename, 'wb')) !== false ) {
                while( !feof($this->fp) ) {
                    $buffer = fread($this->fp, self::INPUT_BUFFER_SIZE);
                    gzwrite($gzfp, $buffer);
                }
                fclose($this->fp);
                unset($this->fp);
                unlink($this->filename);
	            gzclose($gzfp);
            } else {
            	$this->error("Failed to create gzipped logfile {$gzFilename}");
            }
        }
	    $this->releaseLock();
	}

    public function is_windows() {
    return (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN');
}

}