<?php
function login($gagal = false)
{
    if ($gagal === true) {
        echo "Login gagal";
    }
?>
    <form method="post">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="loginBtn">Login</button>
    </form>
<?php }
?>