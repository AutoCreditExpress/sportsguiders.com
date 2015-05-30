<?php

class Autoloader{
    protected $basePath = '';
    protected $classes = array(
        'Stripe'                          => 'lib/Stripe.php',
        'SubscriberDAO'                   => 'classes/subscriber/SubscriberDAO.php',
        'StripeWebhookHandler'            => 'classes/stripe_webhook/StripeWebhookHandler.php'
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