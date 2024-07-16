<?php

namespace App\Controllers\Admin;

use App\Commons\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\CartDetail;
use Rakit\Validation\Validator;

class CategoryController extends Controller
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
        $categories = $this->category->all();
        $this->renderViewAdmin('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('categories.create');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:50',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
            ];      

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác Add new product thành công';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function show($id)
    {
        $category = $this->category->findByID($id);
        $this->renderViewAdmin('categories.show', [
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);   
        $this->renderViewAdmin('categories.edit', [
            'category' => $category
        ]);
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:50',        
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/{$category['id']}/edit"));
            exit;
        } else {
            $data = [
               'name' => $_POST['name'],              
            ];
           
            $this->category->update($id, $data);          

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác update thành công';

            header('Location: ' . url("admin/categories"));
            exit;
        }
    }

    public function delete($id)
    {
        $this->category->delete($id);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác delete thành công';
        header('Location: ' . url('admin/categories'));
        exit();
    }
}
