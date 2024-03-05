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
        <!--header-->
        <?php 
            Page::part('header');
        ?>
        <main class="form-signin">
            <form action="/register_try" method="post" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Please sign UP</h1>
                
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" placeholder="userName">
                    <label for="userName">userName</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    <label for="password">password</label>
                </div>
                <input type="file" class="form-control" name="avatar" id="avatar" placeholder="avatar">
                <div class="checkbox mb-3">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button> 
            </form>
        </main>
        <!--footer-->
        <?php 
            Page::part('footer');
        ?>
    </body>
</html>