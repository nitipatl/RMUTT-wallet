<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author pongpon
 */
class Account {

    public function getAccount($userID) {
        $accounts[] = array("accountID" => "1101041", "accountName" => "ค่าใช้จ่ายทั่วไป", "balance" => 44000);
        $accounts[] = array("accountID" => "1101042", "accountName" => "เงินสะสม", "balance" => 2000);
        $data["accounts"] = $accounts;
        $jsonData = json_encode($data);
        return $jsonData;
    }

}
