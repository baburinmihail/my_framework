<?php
    use App\Services\Page;
    use App\Services\Router;
    
    //if (!$_SESSION['username']){
    //        Router::redirect_run('login');
    //}
    
    //echo "<pre>";
    //    print_r($masiv);
    //echo "</pre>";
    //die();
    //foreach ($masiv as $paints){
    //    echo $users->email.'<br>';
    //    echo $users->username.'<br>';
    //    echo $users->password.'<br>';
    //    echo $users->avatar.'<br>';
    //}
?> 
<!doctype html>
<html lang="en">
    <!--head-->
    <?php 
        Page::part('head');
    ?>
    <body class="text-center">
        <!--header-->
        <?php 
            Page::part('header');
        ?>
        <main class="">
            <div class="container px-4 py-5" id="custom-cards">
                <h2 class="pb-2 border-bottom">Ваши данные не где не будут использоваться кроме данного учебного проекта</h2>
            </div>
        </main>
        <!--footer-->
        <?php 
            Page::part('footer');
        ?>
    </body>
</html>