<?php

require_once '../DBConfig/DBConfig.php';

class Transfer {

    public function checkBalanceToAccount($accountTo, $moneyAmount) {
        $conn = DBConfig::connectDatabase();
        $q = $conn->query('SET character_set_client=utf8');
        $q = $conn->query('SET character_set_connection=utf8');
        $sql = "
       SELECT * FROM account WHERE account_id = " . $accountTo . "
                ";

        $query = $conn->query($sql);
        $row = mysqli_fetch_assoc($query);
        $baseMoney= floatval($row['balance']);
        $total = $baseMoney+ floatval($moneyAmount);
        if($this->checkLimitBOT($total)){
            return true;
        }else{
            return false;
        }
    }
    public function checkLimitBOT($total) {
        return $total > 50000;
    }

}
