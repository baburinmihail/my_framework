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
    <?php 
        $params = array(
            'client_id'     => '1eec5e03e6594d22a9b4d1aa89426774',
            'redirect_uri'  => 'http://localhost:8000/ya_login',
            'response_type' => 'code',
            'state'         => '123'
        );
         
        $url = 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query($params));
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
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" >Sign in</button>
                <button type="button" onclick="document.location='<?php echo $url; ?>'" class="button_ya w-100 btn btn-lg" style=" " >
                    <img src="assets/yandex/butten/butten.svg" width="36" height="36" alt="Яндекс svg">
                    <span class="content" style="color: white">
                        Войти с Яндекс ID
                    </span>
                </button>
            </form>
            </main>
            <!--footer-->
            <?php 
                Page::part('footer');
            ?>
    </body>
    
</html>