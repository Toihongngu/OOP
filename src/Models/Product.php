<?php

namespace App\Models;

use App\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function findByCate($category_id, $page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalPage = ceil(
            $queryBuilder
                ->select('COUNT(*) as count')
                ->from($this->tableName)
                ->where('category_id = ?')
                ->setParameter(0, $category_id)
                ->fetchOne()['count'] / $perPage
        );

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('category_id = ?')
            ->setParameter(0, $category_id)
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function filterByNameInCategory($category_id, $productName, $page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);
        $totalCount = $this->countByNameInCategory($category_id, $productName);
        $totalPage = ceil($totalCount / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('category_id = ?')
            ->andWhere('name LIKE ?')
            ->setParameter(0, $category_id)
            ->setParameter(1, '%' . $productName . '%')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    protected function countByNameInCategory($category_id, $productName)
    {
        $result = $this->queryBuilder
            ->select('COUNT(*) as count')
            ->from($this->tableName)
            ->where('category_id = ?')
            ->andWhere('name LIKE ?')
            ->setParameter(0, $category_id)
            ->setParameter(1, '%' . $productName . '%')
            ->fetchOne();

        return $result;
    }

    public function filterByName($productName, $page = 1, $perPage = 5)
    {
        $queryBuilder = clone ($this->queryBuilder);

        $totalCount = $this->countByName($productName);
        $totalPage = ceil($totalCount / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('name LIKE ?')
            ->setParameter(0, '%' . $productName . '%')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('id', 'desc')
            ->fetchAllAssociative();

        return [$data, $totalPage];
    }

    public function countByName($productName)
    {
        $result = $this->queryBuilder
            ->select('COUNT(*) as count')
            ->from($this->tableName)
            ->where('name LIKE ?')
            ->setParameter(0, '%' . $productName . '%')
            ->fetchOne();
        return $result;
    }
}
