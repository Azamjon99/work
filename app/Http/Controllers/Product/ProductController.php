<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $product;
    private CategoryRepositoryInterface $category;

    public function __construct(ProductRepositoryInterface $product, CategoryRepositoryInterface $categories)
    {
        $this->product= $product;
        $this->category= $categories;
    }
    public function getProductById($id)
    {
        $products = $this->product->getProductById($id);
        return view('products.product', compact('products'));
    }

    public function createProduct( CategoryRepositoryInterface $categories)
    {
        $categories = $this->category->getCategories();
        return view('products.create', compact('categories'));
    }
    public function storeProduct(ProductRequest $request)
    {
        $detail = $request->all();
        $this->product->storeProducts($detail);
        return redirect()->route('categories.index');
    }

    public function deleteProduct($id)
    {
        $this->product->deleteProducts($id);
        return redirect()->back();   
    }
    public function updateProduct($id, ProductRequest $request)
    {
        $detail = $request->only(['name', 'price', 'category_id']);
        $this->product->updateProducts($id, $detail);
        return redirect()->route('categories.index');
    }
    public function showProduct($id)
    {
        $categories = $this->category->getCategories();
        $product = $this->product->getProductsById($id);
        return view('products.update', compact('product', 'categories'));   
    }
}
 