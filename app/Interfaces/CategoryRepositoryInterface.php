<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface 
{
    public function getCategories();
    public function getCategoryById($id);
    public function updateCategory($id, $details);
    public function storeCategories($details);
    public function deleteCategories($data);
    public function searchCategories($data);

}