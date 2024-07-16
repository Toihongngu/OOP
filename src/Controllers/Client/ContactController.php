<?php

namespace App\Controllers\Client;

use App\Commons\Controller;
use App\Models\Category;

class ContactController extends Controller
{
    private Category $category;

    // Khởi tạo thuộc tính $category trong hàm khởi tạo
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $categories = $this->category->all();
        $this->renderViewClient('contact', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        echo __CLASS__ . '@' . __FUNCTION__;
    }
}
