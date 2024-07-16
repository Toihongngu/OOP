<?php

namespace App\Controllers\Admin;

use App\Commons\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\CartDetail;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;
    private CartDetail $cartDetail;
    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
        $this->cartDetail = new CartDetail();
    }

    public function index()
    {
        $products = $this->product->all();
        $categories = $this->category->all();
        $this->renderViewAdmin('products.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();
        $this->renderViewAdmin('products.create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:50',
            'price_regular' => 'required|integer|min:0',
            'price_sale' => 'required|integer|min:0',
            'overview' => 'required|max:50',
            'content' => 'required|max:50',
            'category_id' => 'required',
            'img_thumbnail' => 'required|uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
                'price_regular' => $_POST['price_regular'],
                'price_sale' => $_POST['price_sale'],
                'overview' => $_POST['overview'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id'],
            ];

            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Không thành công';

                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }

            $this->product->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác Add new product thành công';

            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function show($id)
    {
        $product = $this->product->findByID($id);
        $categories = $this->category->all();
        $this->renderViewAdmin('products.show', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function edit($id)
    {
        $product = $this->product->findByID($id);
        $categories = $this->category->all();
        $this->renderViewAdmin('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $product = $this->product->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:50',
            'price_regular' => 'required|integer|min:0',
            'price_sale' => 'required|integer|min:0',
            'overview' => 'required|max:50',
            'content' => 'required|max:50',
            'category_id' => 'required',
            'img_thumbnail' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/products/{$product['id']}/edit"));
            exit;
        } else {
            $data = [
               'name' => $_POST['name'],
                'price_regular' => $_POST['price_regular'],
                'price_sale' => $_POST['price_sale'],
                'overview' => $_POST['overview'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id'],
            ];

            $flagUpload = false;
            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Không thành công';

                    header('Location: ' . url("admin/products/{$product['id']}/edit"));
                    exit;
                }
            }

            $this->product->update($id, $data);

            if (
                $flagUpload
                && $product['img_thumbnail']
                && file_exists(PATH_ROOT . $product['img_thumbnail'])
            ) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác update thành công';

            header('Location: ' . url("admin/products"));
            exit;
        }
    }

    public function delete($id)
    {
        $product = $this->product->findByID($id);
        
        $cartDetailDelete = $this->cartDetail->findByProductID($product['id']);
        $this->cartDetail->delete($cartDetailDelete['id']);
        $this->product->delete($id);

        if (
            $product['img_thumbnail']
            && file_exists(PATH_ROOT . $product['img_thumbnail'])
        ) {
            unlink(PATH_ROOT . $product['img_thumbnail']);
        }
        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác delete thành công';
        header('Location: ' . url('admin/products'));
        exit();
    }
}
