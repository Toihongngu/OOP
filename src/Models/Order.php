<?php

namespace App\Models;

use App\Commons\Model;

class Order extends Model 
{
    protected string $tableName = 'orders';

    
    public function findByUserID($userID) {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id = ?')
            ->setParameter(0, $userID)
            ->fetchAssociative();
    }
}