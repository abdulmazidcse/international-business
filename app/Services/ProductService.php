<?php

namespace App\Services;

use App\Repositories\ProductRepositoryInterface;
use App\Filters\ProductFilter;

class ProductService
{
    protected $repository;
    protected $filter;

    public function __construct(ProductRepositoryInterface $repository, ProductFilter $filter)
    {
        $this->repository = $repository;
        $this->filter = $filter;
    }

    public function getAllProducts()
    {
        $query = $this->repository->all(); // Get a Builder instance from the repository
        // $filteredQuery = $this->filter->apply($query); // Apply filters to the Builder instance

        return $query; // Execute the query and get the results
    }

    public function getProductById($id)
    {
        return $this->repository->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateProduct($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->repository->delete($id);
    }

    public function addAdditionalFields($products)
    {
        return $products->map(function ($product) {
            $product->additional_field = 'Some Value'; // Add your logic here
            return $product;
        });
    }
}
