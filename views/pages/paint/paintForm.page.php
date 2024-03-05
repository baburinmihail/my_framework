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
            <?php
                if (array_key_exists('username', $_SESSION)){
                    $user_id = $_SESSION["user_id"];
                    $email = $_SESSION["email"];
                    $username = $_SESSION["username"];
                    $avatar = $_SESSION["avatar"];
                 
            ?>
            <form action="/paint_add" method="post" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Пожалуйста выберити картину</h1>
                <div class="form-floating" style="display: none">
                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id ?>" >
                    <label for="user_id">user_id</label>
                </div>
                <div class="form-floating" style="display: none">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" >
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating" style="display: none">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $username ?>" >
                    <label for="userName">userName</label>
                </div>
                <div class="form-floating" style="display: none">
                    <input type="text" class="form-control" name="avatar" id="avatar" value="<?php echo $avatar ?>" >
                    <label for="avatar">avatar</label>
                </div>
                <input type="file" class="form-control" name="paint" id="paint"  placeholder="paint" required>
                <div class="checkbox mb-3">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Добавить</button> 
            </form>
            <?php
                }else{}
            ?>
        </main>
        <!--footer-->
        <?php 
            Page::part('footer');
        ?>
    </body>
</html>