<?php

require_once dirname(__FILE__) . '/../DBConfig/DBConfig.php';

class Account {

    public function getAccount($userID) {

        $conn = DBConfig::connectDatabase();
        $q = $conn->query('SET character_set_client=utf8');
        $q = $conn->query('SET character_set_connection=utf8');
        $sql = "
        SELECT * FROM account WHERE user_id = ".$userID."
                ";
       
        $query = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $accounts[] = $this->getAccountFormated($row);
        }

       
        $data["accounts"] = $accounts;
        $jsonData = json_encode($data);
        return $jsonData;
    }
    public function getAccountFormated($user) {
        return array("accountID" => $user['account_id'], "accountName" => $user['account_name'], "balance" => intval($user['balance']));
    }

}
