<?php

namespace Cms\Controllers;

use Cms\Models\Category;

class CategoryController
{
    public Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index(): array
    {
        return $this->category->index();

    }
}