<?php

namespace App\Actions\Filters;

use App\Actions\Filters\QueryFilter;

class LotFilter extends QueryFilter
{
    protected $orderField;

    /**
     * Search by table columns name
     * @param  string $str
     * @return Query Builder
     */
    public function query($str = '')
    {
        if (empty($str)) {
            return true;
        }
        $searchColumns = "name";

        return $this->builder->whereRaw("(CONCAT($searchColumns) LIKE ?)", "%{$searchColumns}%");
            // ->orWhereHas('type', function ($query) use ($str) {
            //     $query->where('name', 'LIKE', "%{$str}%");
            // })
            // ->orWhereHas('mainCategory', function ($query) use ($str) {
            //     $query->where('name', 'LIKE', "%{$str}%");
            // });
    }

    /**
     * filter product based on type
     * @param  int $typeId
     * @return Query Builder
     */
    public function typeId($typeId)
    {
        return $this->builder->where('type_id', $typeId);
    }

    /**
     * filter product based on supplier
     * @param  int $supplierId
     * @return Query Builder
     */
    public function supplierId($supplierId)
    {
        return $this->builder->where('supplier_id', $supplierId);
    }

    /**
     * filter product based on supplier
     * @param  int $subscriberId
     * @return Query Builder
     */
    public function subscriberId($subscriberId)
    {
        return $this->builder->where('subscriber_id', $subscriberId);
    }

    /**
     * filter product based on category
     * @param  int $categoryId
     * @return Query Builder
     */
    public function categoryId($categoryId)
    {
        return $this->builder->where('category_id', $categoryId);
    }

    /**
     * filter product based on sub category
     * @param  int $subCategoryId
     * @return Query Builder
     */
    public function subCategoryId($subCategoryId)
    {
        return $this->builder->where('sub_category_id', $subCategoryId);
    }
}