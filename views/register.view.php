<?php
function register()
{ ?>
<form method="post">
    <div class="w-full h-screen flex justify-center items-center">
        <div class="w-1/5 mx-auto border flex flex-col p-5 gap-8">
            <h1 class="font-bold text-3xl">Buat akun</h1>
            <input class="border py-2 px-3" type="text" name="username" placeholder="username">
            <input class="border py-2 px-3" type="password" name="password" placeholder="password">
            <button class="w-full border p-2" type="submit" name="registerBtn">Register</button>
        </div>
    </div>
</form>
<?php } ?>