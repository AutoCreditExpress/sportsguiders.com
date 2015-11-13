<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Apart of AceDealerServices.com.
 * User: bslaght
 * Date: 6/20/13
 * Time: 7:44 AM
 * Owned by Auto Credit Express
 */

//namespace Classes\framework\security;

/**
 * Crypt passwords
 *
 * Class PwCrypt
 * @package Classes\framework\security
 */
class PwCrypt implements IPassword {

    /**
     * @var string the password as plain text
     */
    protected $password = '';
    /**
     * @var boolean indicator specifying whether or not the password
     *      is currently encrypted
     */
    protected $encrypted = false;
    /**
     * Unique key required by the AzDGCrypt class.<br/>CAVEAT: Do
     * <b>NOT</b> change these keys or any passwords
     * persisted with the old keys will be lost.
     */
    const KEYS = 'GuSNyp2CH9';

    /**
     * Constructs an instance of our password object given a plain
     * text password and an indicator specifying whether or not the
     * string is encrypted.
     *
     * @param string $password the plain text password
     * @param boolean $encrypted specifies if the password string is
     *                encrypted
     */
    public function __construct($password, $encrypted) {
        $this->password = $password;
        $this->encrypted = $encrypted;
    }

    /**
     * @see IPassword::toString()
     */
    public function toString() {
        return $this->password;
    }

    /**
     * @see IPassword::encrypt()
     */
    public function encrypt() {
        if( $this->encrypted === false ) {
            $cr64 = new AzDGCrypt(self::KEYS);
            $this->password = $cr64->crypt($this->password);
            $this->encrypted = true;
        }
        return $this->toString();
    }

    /**
     * @see IPassword::decrypt()
     */
    public function decrypt() {
        if( $this->encrypted === true ) {
            $cr64 = new AzDGCrypt(self::KEYS);
            $this->password = $cr64->decrypt($this->password);
            $this->encrypted = false;
        }
        return $this->toString();
    }

    /**
     * @see IPassword::isEncrypted()
     */
    public function isEncrypted() {
        return $this->encrypted;
    }

    /**
     * @see IPassword::equals()
     */
    public function equals(IPassword $that) {
        return ($this->decrypt() == $that->decrypt());
    }
}