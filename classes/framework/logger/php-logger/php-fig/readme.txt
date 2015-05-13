Bid Automation V8 (bid8)
Jason R. Simpson
Auto Credit Express
September 8, 2013 10:05AM EDT

The PHP Framework Interop Group has some smart computer scientists and popular 
projects as participants. You can see the current membership at the bottom of the
home page
   http://www.php-fig.org/

Yes, the membership includes Apache and their PSR-3 implementation, log4php. I use it
in the SerpFuel system; it is very similar to Apache's log4j in the Java world.
Why not use this instead of a roll-your-own logger?  bid8 requires the Google AdWords 
PHP Client Library.  It defines a Logger class as does Apache's log4php.  They also both 
use autoloaders as does the bid8 project.  Therein lies the conflict.

The production server where the bid8 project is deployed has php 5.2.17 installed.
This precludes me from using namespaces as they are not available until php 5.3.0.

The classes like LogLevel and LoggerInterface defined in PSR-3 require namespaces.
I have downloaded the package from github at
   https://github.com/php-fig/log/tree/1.0.0
and will hack it to not require namespaces. 

PEAR defined a collision avoidance convention for naming classes when php namespaces 
were unavailable. 
   http://pear.php.net/manual/en/standards.naming.php
For the sake of someone, anyone understanding the method to my madness, I will follow 
this standard.

Example:

PSR3_Log_LoggerInterface

PSR-3 also requires traits defined in PHP 5.4.0, 'a method for code reuse in single 
inheritance languages like PHP'.
   http://php.net/manual/en/language.oop5.traits.php
I have made them abstract classes.
