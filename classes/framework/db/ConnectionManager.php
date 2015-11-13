<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Apart of AceDealerServices.com.
 * User: bslaght
 * Date: 6/19/13
 * Time: 10:55 AM
 * Owned by Auto Credit Express
 */

namespace Classes\framework\db;


abstract class ConnectionManager {


    //Creates dynamic PDO connection.
    public function createPDO($name,PDO $pdo){
        $this->$name = $pdo;
    }

    //Destroys PDO Connection.
    public function destroyPDO($name){
        unset($this->$name);
    }

}