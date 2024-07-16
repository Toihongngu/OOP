<?php

namespace App\Controllers\Client;

use App\Commons\Controller;
use App\Commons\Helper;
use App\Models\User;
use Rakit\Validation\Validator;

class LoginController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        if(isset( $_SESSION['user'])){
            header('Location: ' . url());
        }
        $this->renderViewClient('login');
    }

    public function login()
    {
        try {
            $user = $this->user->findByEmail($_POST['email']);

            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);

            }

            $flag = password_verify($_POST['password'], $user['password']);
            if ($flag) {

                $_SESSION['user'] = $user;

                unset($_SESSION['cart']);
    
                header('Location: ' . url());
                exit;
            }

             throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login'));
            exit;
        }
    }
    public function showFormRegister()
    {
        $this->renderViewClient('register');
    }
    public function register()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'avatar' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();
    
        if ($validation->fails()) {
            // Lưu tất cả các lỗi vào session
            $_SESSION['errors'] = $validation->errors()->all();
    
            // Chuyển hướng lại trang đăng ký
            header('Location: ' . url('register'));
            exit;
        } else {
            // Kiểm tra xem email đã tồn tại
            $existingUser = $this->user->findByEmail($_POST['email']);
            if ($existingUser) {
                $_SESSION['errors'][] = 'Email đã tồn tại';
    
                // Chuyển hướng lại trang đăng ký
                header('Location: ' . url('register'));
                exit;
            }
    
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];
    
            // Kiểm tra và xử lý avatar
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $from = $_FILES['avatar']['tmp_name'];
                $filename = time() . '_' . $_FILES['avatar']['name'];
                $to = 'assets/uploads/' . $filename;
    
                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors'][] = 'Upload Không thành công';
    
                    header('Location: ' . url('register'));
                    exit;
                }
            }
    
            // Chèn dữ liệu người dùng vào cơ sở dữ liệu
            $this->user->insert($data);
    
            // Lưu thông báo trạng thái vào session
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';
    
            header('Location: ' . url());
            exit;
        }
    }
    

    public function logout()
    {
        unset($_SESSION['cart-' . $_SESSION['user']['id']]);
        unset($_SESSION['user']);

        header('Location: ' . url());
        exit;
    }
}