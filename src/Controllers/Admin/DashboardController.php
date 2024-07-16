<?php

namespace App\Controllers\Admin;

use App\Commons\Controller;
use App\Commons\Helper;
use App\Models\Product;

class DashboardController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function dashboard()
    {
        $products = $this->product->all();
        $analysisProduct = array_map(function ($item) {
            return [
                $item['name'],
                $item['overview']
            ];
        }, $products);
        array_unshift($analysisProduct, ['Tên sản phẩm', 'Lượt views']);

        $this->renderViewAdmin(__FUNCTION__, [
            'analysisProduct' => $analysisProduct
        ]);
    }
}