<?php

require_once dirname(__FILE__).'/../DBConfig/DBConfig.php';

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
        return $this->isOverLimitBOT($total);
    }
    public function isOverLimitBOT($total) {
        return $total > 50000;
    }

}
