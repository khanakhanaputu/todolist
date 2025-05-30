<?php
getFile("views/register.view.php");
getFile("models/model.model.php");
class registerController extends Model
{
    function index()
    {
        if (isset($_POST['registerBtn'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->getById("users", "username", "$username")) {
                echo "Username already taken";
                exit;
            }
            try {
                $this->create("users", ["NULL", "'$username'", "'$password'"]);
            } catch (\Throwable $th) {
                echo "gagal";
            }
        }
        register();
    }
}
