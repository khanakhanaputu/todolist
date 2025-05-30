<?php
function dashboard()
{
    session_start();
    $username = $_SESSION['userData']['username'];
    echo "hello $username";
}
