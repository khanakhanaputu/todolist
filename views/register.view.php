<?php
function register()
{ ?>
    <form method="post">
        <h1>Buat akun</h1>
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="registerBtn">Register</button>
    </form>
<?php } ?>