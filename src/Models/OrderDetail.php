<?php

namespace App\Models;

use App\Commons\Model;

class OrderDetail extends Model
{
    protected string $tableName = 'order_details';

    public function joinOrderDetailAndProducts($orderID)
    {
        return $this->queryBuilder
            ->select('p.id', 'p.name', 'p.price_regular', 'p.price_sale', 'p.img_thumbnail', 'od.quantity')
            ->from('products', 'p')
            ->join('p', 'order_details', 'od', 'p.id = od.product_id')
            ->where('od.order_id = :order_id')
            ->setParameter('order_id', $orderID)
            ->executeQuery()
            ->fetchAllAssociative();
    }
    public function deleteByOrderID($orderID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('order_id = ?')
            ->setParameter(0, $orderID)
            ->executeQuery();
    }
}