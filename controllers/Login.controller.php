<?php
getFile("Models/model.model.php");
getFile("views/login.view.php");
class LoginController extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        changeTitle("Login");
        if (isset($_POST['loginBtn'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $get_data = $this->getSingleById("users", "username", "$username");
            if ($password === $get_data['password']) {
                echo "berhasil anjay";
                session_start();
                $_SESSION['userData'] = $get_data;
                header("Location: /dashboard");
            } else {
                echo "gagal";
            }
        }

        login();
    }
}
