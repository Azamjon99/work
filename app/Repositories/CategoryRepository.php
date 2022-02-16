<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface 
{
    public function getCategories()
    {
        return Category::all();
    }
    public function storeCategories($details)
    {
        return Category::create($details);
    }
    public function deleteCategories($id)
    {
        return DB::delete( "DELETE FROM categories WHERE id = '$id'");
    }

    public function getCategoryById($id) 
    {
        return Category::find($id);
    }

    public function updateCategory($id, $detail)
    {
        return  Category::whereId($id)->update($detail);
    }

    public function searchCategories($data)
    {
        return DB::table('categories')->where('name','LIKE','%'.$data."%")->orWhere('description','LIKE','%'.$data."%")->get();
    }
}