<?php

require_once '../DBConfig/DBConfig.php';

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
            $accounts[] = array("accountID" => $row['account_id'], "accountName" => $row['account_name'], "balance" => intval($row['balance']));
        }

       
        $data["accounts"] = $accounts;
        $jsonData = json_encode($data);
        return $jsonData;
    }

}
