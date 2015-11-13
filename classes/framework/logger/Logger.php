<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Apart of AceDealerServices.com.
 * User: bslaght
 * Date: 10/10/13
 * Time: 12:54 PM
 * Owned by Auto Credit Express
 */

class Logger {
    const ADMIN_EMAIL = 'bslaght@goacegroup.com';
    protected $filename = '';
    protected $rollingGzipLogger = '';

    public function __construct($filename){
        $this->filename = $filename;

        $this->rollingGzipLogger = new RollingGzipLogger($filename);
    }

    public function log($level, $message, array $context = array()){

        switch($level){
            case 'emergency':
                try{
                    mail(self::ADMIN_EMAIL, __FILE__, $message, "from: errors@acedealerservices.com");
                }
                catch(Exception $exception){
                    $this->rollingGzipLogger->emergency(
                        "Email for emergency not Sending. Emergency message:  ".$message,
                        array('exception' => $exception));
                }
                $this->rollingGzipLogger->emergency($message, $context);
        }
    }



}