<?php

namespace App\Controllers\Client;

use App\Commons\Controller;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
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
        $page = $_GET['page'] ?? 1;
        $perPage = 12;
        $cate = $_GET['cate'] ?? 0;
        $search = "";
        $search = $_GET['search'] ?? "";

        if ($cate == 0) {
            list($products, $totalPage) = $this->product->filterByName($search, $page, $perPage);
        } else {
            list($products, $totalPage) = $this->product->filterByNameInCategory($cate, $search, $page, $perPage);
        }
        $categories = $this->category->all();

        $this->renderViewClient('shop', [
            'title' => $title,
            'products' => $products,
            'totalPage' => $totalPage,
            'categories' => $categories
        ]);
    }

}