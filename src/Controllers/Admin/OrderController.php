<?php

namespace App\Controllers\Admin;

use App\Commons\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    private Product $product;
    private Order $order;
    private Category $category;
    private OrderDetail $orderDetail;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->orderDetail = new OrderDetail();
        $this->order = new Order();
    }

    public function index()
    {
        $orders = $this->order->all();
        $this->renderViewAdmin('orders.index', [
            'orders' => $orders
        ]);
    }
    public function show($id)
    {
        $order = $this->order->findByID($id);
        $orderDetailProducts = $this->orderDetail->joinOrderDetailAndProducts($order['id']);
        $this->renderViewAdmin('orders.show', [
            'order' => $order,
            'orderDetailProducts' => $orderDetailProducts
        ]);
    }
    public function delivery($id)
    {
        $data = [
            'status_delivery' => $_POST['status_delivery'],
        ];
        $this->order->update($id, $data);
        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác update delivery thành công';

        header('Location: ' . url("admin/orders/$id/show"));
        exit;
    }
    public function payment($id)
    {
        $data = [
            'status_payment' => $_POST['status_payment'],
        ];
        $this->order->update($id, $data);
        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác update payment thành công';

        header('Location: ' . url("admin/orders/$id/show"));
        exit;
    }
}
