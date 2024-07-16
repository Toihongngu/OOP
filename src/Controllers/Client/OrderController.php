<?php

namespace App\Controllers\Client;

use App\Commons\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;

class OrderController extends Controller
{
    public User $user;
    public Order $order;
    public OrderDetail $orderDetail;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->user = new User();
        $this->order = new Order();
        $this->orderDetail = new OrderDetail();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }
    public function index()
    {
        $this->renderViewClient('checkout');
    }
    public function checkout()
    {

        if (!isset($_SESSION['user'])) {
            header('Location: ' . url('login'));
        }
       
        $userID = $_SESSION['user']['id'];
        // Thêm dữ liệu vào Order & OrderDetail
        $this->order->insert([
            'user_id' => $userID,
            'user_name' => $_POST['user_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'user_address' => $_POST['user_address'],
        ]);
       
        $orderID =  $orderID = $this->order->getConnection()->lastInsertId();

        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        foreach ($_SESSION[$key] as $productID => $item) {
            $this->orderDetail->insert([
                'order_id' => $orderID,
                'product_id' => $productID,
                'quantity' => $item['quantity'],
                'price_regular' => $item['price_regular'],
                'price_sale' => $item['price_sale'],
            ]);
        }

        // Xóa dữ liệu trong Cart + CartDetail theo CartID - $_SESSION['cart_id']

        // Xóa trong SESSION
        unset($_SESSION[$key]);

        if (isset($_SESSION['user'])) {
            unset($_SESSION['cart_id']);
        }

        header('Location: ' . url());
        exit;
    }
}
