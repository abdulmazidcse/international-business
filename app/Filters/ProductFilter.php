<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductFilter
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $query): Builder
    {
        if ($this->request->has('name')) {
            $query->where('name', 'like', '%' . $this->request->get('name') . '%');
        }

        // if ($this->request->has('min_price')) {
        //     $query->where('price', '>=', $this->request->get('min_price'));
        // }

        // if ($this->request->has('max_price')) {
        //     $query->where('price', '<=', $this->request->get('max_price'));
        // }

        // // New filters for category_id, brand_id, color_id, size_id
        // if ($this->request->has('category_id')) {
        //     $query->where('category_id', $this->request->get('category_id'));
        // }

        // if ($this->request->has('brand_id')) {
        //     $query->where('brand_id', $this->request->get('brand_id'));
        // }

        // if ($this->request->has('color_id')) {
        //     $query->where('color_id', $this->request->get('color_id'));
        // }

        // if ($this->request->has('size_id')) {
        //     $query->where('size_id', $this->request->get('size_id'));
        // }

        return $query;
    }
}
