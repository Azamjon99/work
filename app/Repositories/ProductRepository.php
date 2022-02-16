<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProducts()
    {
        return Product::all();
    }
    public function storeProducts($details)
    {
        return Product::create($details);
    }
    public function deleteProducts($id)
    {
        return DB::delete( "DELETE FROM products WHERE id = '$id'");
    }
    public function updateProducts($id, $detail)
    {
     
       return  Product::whereId($id)->update($detail);

    }
    public function getProductById($id) 
    {
        return DB::select( DB::raw("SELECT id, name, price FROM products WHERE category_id = '$id'"));
    }
    public function getProductsById($id) 
    {
        return Product::find($id);
    }

    public function searchProducts($data) 
    {
        return DB::table('products')->where('name','LIKE','%'.$data."%")->orWhere('price','LIKE','%'.$data."%")->get();
    }

}