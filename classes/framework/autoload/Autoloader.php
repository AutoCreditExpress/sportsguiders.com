<?php

class Autoloader{
    protected $basePath = '';
    protected $classes = array(
        'Stripe'                          => 'lib/Stripe.php',
        'SubscriberDAO'                   => 'classes/subscriber/SubscriberDAO.php',
        'StripeWebhookHandler'            => 'classes/stripe_webhook/StripeWebhookHandler.php',
        'Login'                           => 'classes/login/Login.php',
        'Registration'                    => 'classes/login/Registration.php',
        'ReportDAO'                       => 'classes/report/ReportDAO.php',
        'Report'                          => 'classes/report/Report.php',
        'Waiver'                          => 'classes/report/Waiver.php',
        'Facts'                             => 'classes/report/Facts.php',
        'Injuries'                          => 'classes/report/Injuries.php',
        'Trending'                          => 'classes/report/Trending.php',
        'Player'                            => 'classes/report/Player.php',
        'PlayerDAO'                         => 'classes/report/PlayerDAO.php',
        'PHPMailer'                         =>'classes/libraries/PHPMailer.php'
    );

    public function __construct($basePath) {
        $this->setBasePath($basePath);
    }
    public function setBasePath($basePath) {
        $this->basePath = $basePath;
    }
    public function getBasePath() {
        return $this->basePath;
    }
    public function autoload($className) {

        if( isset($this->classes[$className])) {
            require_once ($this->getBasePath() . $this->classes[$className]);
        }
    }
}