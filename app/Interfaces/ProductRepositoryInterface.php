<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function getProducts();
    public function storeProducts($details);
    public function deleteProducts($id);
    public function updateProducts($id, $detail);
    public function getProductById($id);
    public function getProductsById($id);

}