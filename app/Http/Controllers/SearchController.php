<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    private ProductRepositoryInterface $product;
    private CategoryRepositoryInterface $category;

    public function __construct(ProductRepositoryInterface $product, CategoryRepositoryInterface $categories)
    {
        $this->product= $product;
        $this->category= $categories;
    }

    public function search(Request $request)
    {
            if($request->ajax())
            {
            $products=$this->product->searchProducts($request->search);
            $datas=$this->category->searchCategories($request->search);
            if($products||$datas)
            {
               return view('search', compact('products', 'datas'));
            }
            }
            return redirect()->back();
    }
}
