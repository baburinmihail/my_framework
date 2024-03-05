<?php
   use App\Services\Page;
   use App\Models\UserModel;
   use App\Services\Router;

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
            <form action="/login_try"  method="post" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
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