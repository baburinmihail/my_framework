<?php
   use App\Services\Page; 
?> 
<!doctype html>
<html lang="en">
    <!--head-->
    <?php 
        Page::part('head');
    ?>
    <body class="text-center">
            <main class="form-signin">
                <h1>Не верный логин и пароль, проверте лог файл</h1>
            </main>
    </body>
</html>