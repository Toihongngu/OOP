<?php

namespace App\Controllers\Client;

use App\Commons\Controller;
use App\Commons\Helper;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        $title = 'E-Shopper';
        $page = 1;
        $perPage = 8;
        list($products, $totalPage) = $this->product->paginate($page, $perPage);

        $categories = $this->category->all();
        $this->renderViewClient('home', [
            'title' => $title,
            'products' => $products,
            'totalPage' => $totalPage,
            'categories' => $categories
        ]);
    }
}