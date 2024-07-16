<?php

namespace App\Controllers\Client;

use App\Commons\Controller;
use App\Commons\Helper;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;

class CartController extends Controller
{
    private Product $product;
    private Cart $cart;
    private CartDetail $cartDetail;

    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }
    public function detail()
    { // Chi tiết giỏ hàng
        $this->renderViewClient('cart');
    }
    public function add()
    {
        // Lấy thông tin sản phẩm theo ID
        $productID = $_GET['productID'] ?? null;
        $quantity = $_GET['quantity'] ?? 1;

        if (!$productID) {
            // Handle missing productID error
            header('Location: ' . url('cart/detail'));
            exit;
        }

        $product = $this->product->findByID($productID);
        if (!$product) {
            // Handle product not found error
            header('Location: ' . url('cart/detail'));
            exit;
        }

        // Khởi tạo SESSION cart
        // Check nếu người dùng đang đăng nhập hay không
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if (!isset($_SESSION[$key][$product['id']])) {
            $_SESSION[$key][$product['id']] = $product + ['quantity' => $quantity];
        } else {
            $_SESSION[$key][$product['id']]['quantity'] += $quantity;
        }

        // Nếu người dùng đang đăng nhập, lưu giỏ hàng vào cơ sở dữ liệu
        if (isset($_SESSION['user'])) {           
                $cart = $this->cart->findByUserID($_SESSION['user']['id']);
                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id']
                    ]);
                    $cart = $this->cart->findByUserID($_SESSION['user']['id']);
                    $cartID = $cart['id'];
                } else {
                    $cartID = $cart['id'];
                }

                $_SESSION['cart_id'] = $cartID;

                // Delete existing cart details
                $this->cartDetail->deleteByCartID($cartID);

                // Insert new cart details
                foreach ($_SESSION[$key] as $productID => $item) {
                    $this->cartDetail->insert([
                        'cart_id' => $cartID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity']
                    ]);
                }

            
           
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
    public function quantityInc()
    { // Tăng số lượng
        // Lấy ra dữ liệu từ cart_details để đảm bảo n có tồn tại bản ghi

        // Thay đổi trong SESSION
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }


        $_SESSION[$key][$_GET['productID']]['quantity'] += 1;

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }

    public function quantityDec()
    { // giảm số lượng
        // Lấy ra dữ liệu từ cart_details để đảm bảo n có tồn tại bản ghi

        // Thay đổi trong SESSION
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        if ($_SESSION[$key][$_GET['productID']]['quantity'] > 1) {
            $_SESSION[$key][$_GET['productID']]['quantity'] -= 1;
        }

        // Thay đổi trong DB
        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'],
                $_GET['productID'],
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }

    public function remove()
    { // xóa item or xóa trắng
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        unset($_SESSION[$key][$_GET['productID']]);

        if (isset($_SESSION['user'])) {
            $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
}
