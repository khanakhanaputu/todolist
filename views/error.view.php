<?php
function error()
{
?>
<div class="bg-gray-100 flex items-center justify-center h-screen px-4">
    <div class="text-center">
        <img src="/public/assets/error.jpg" alt="error image" width="200" class="justify-self-center">
        <p class="text-9xl font-bold text-indigo-600">404</p>
        <h2 class="text-2xl font-semibold mt-4 text-gray-800">Oops! Like Your Girlfriend, URL doesnt exist</h2>
        <p class="mt-2 text-gray-500">Maybe...The URL you’re looking for went to get milk and never came back.</p>

        <a href="/"
            class=" mt-6 inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">
            Balik ke Beranda
        </a>

    </div>
</div>
<?php }
?>