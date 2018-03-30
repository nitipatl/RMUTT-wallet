<?php

require_once dirname(__FILE__) . '/../DBConfig/DBConfig.php';

class Transfer {

    public function isOverForAccountTo($accountTo, $moneyAmount) {
        $conn = DBConfig::connectDatabase();
        $q = $conn->query('SET character_set_client=utf8');
        $q = $conn->query('SET character_set_connection=utf8');
        $sql = "
       SELECT * FROM account WHERE account_id = " . $accountTo . "
                ";

        $query = $conn->query($sql);
        $row = mysqli_fetch_assoc($query);
        $baseMoney = floatval($row['balance']);
        return $this->isOverLimitBOT($total);
    }

    public function isOverLimitBOT($total) {
        return $total > 50000;
    }

    public function isEnoughForAccountFrom($accountFrom, $moneyAmount) {
        $conn = DBConfig::connectDatabase();
        $q = $conn->query('SET character_set_client=utf8');
        $q = $conn->query('SET character_set_connection=utf8');
        $sql = "
       SELECT * FROM account WHERE account_id = " . $accountFrom . "
                ";

        $query = $conn->query($sql);
        $row = mysqli_fetch_assoc($query);
        $baseMoney = floatval($row['balance']);
        if ($baseMoney >= floatval($moneyAmount)) {
            return true;
        } else {
            return false;
        }
    }

    public function transferPre($accountFrom, $accountTo, $moneyAmount) {
        $data = array("message" => "OK", "accountFrom" => $accountFrom, "accountTo" => $accountTo, "moneyAmount" => $moneyAmount, "user" => null);

        if (!$this->isEnoughForAccountFrom($accountFrom, $moneyAmount)) {
            $data = array("message" => "is not enough");
        } else if ($this->isOverForAccountTo($accountTo, $moneyAmount)) {
            $data = array("message" => "is over");
        }


        $conn = DBConfig::connectDatabase();
        $q = $conn->query('SET character_set_client=utf8');
        $q = $conn->query('SET character_set_connection=utf8');
        $sql = "
       SELECT * FROM account WHERE account_id = " . $accountTo . "
                ";


        $data["user"] = array("message" => "OK");
        $jsonData = json_encode($data);
        return $jsonData;
    }

}
