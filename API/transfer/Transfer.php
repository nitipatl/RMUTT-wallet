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
        $total = $baseMoney + floatval($moneyAmount);
        if ($total > 50000) {
            return true;
        } else {
            return false;
        }
        /*
          $baseMoney = floatval($row['balance']);
          $total = $baseMoney + floatval($moneyAmount);
          return $this->isOverLimitBOT($total);
         * 
         */
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

    public function transferPost($accountFrom, $accountTo, $moneyAmount) {
        $conn = DBConfig::connectDatabase();
        $q = $conn->query('SET character_set_client=utf8');
        $q = $conn->query('SET character_set_connection=utf8');


        $sql = "
      UPDATE `account` SET `balance` = (balance - " . $moneyAmount . ") WHERE account_id = " . $accountFrom;
        $query = $conn->query($sql);

        $sql = "
      UPDATE `account` SET `balance` = (balance + " . $moneyAmount . ") WHERE account_id = " . $accountTo;
        $query = $conn->query($sql);

        $sql = "
      INSERT INTO `transaction` (`id`, `account_id_to`, `account_id_from`, `money_amount`, `timestamp_transfer`) VALUES (NULL, '" . $accountTo . "', '" . $accountFrom . "', " . $moneyAmount . ", CURRENT_TIMESTAMP);
            ";
        $query = $conn->query($sql);

        $sql = "
     SELECT * FROM `transaction` ORDER BY `transaction`.`timestamp_transfer` DESC
            ";
        $query = $conn->query($sql);
        $row = mysqli_fetch_assoc($query);



        $data = array("message" => "โอนเงินสำเร็จ");
        $result = array("transferDatatime" => $row["timestamp_transfer"],
            "accountTo" => $accountTo,
            "moneyAmount" => $moneyAmount
        );
        $data["result"] = $result;
        $jsonData = json_encode($data);
        return $jsonData;
    }

}
