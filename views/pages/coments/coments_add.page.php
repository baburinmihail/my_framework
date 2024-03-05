<?php
    use App\Services\Page;
    //echo "<pre>";
    //    print_r($masiv);
    //echo "</pre>";

    //style="display: none"
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
            <form action="/coments_try" method="post" enctype="multipart/form-data">
                <h1 class="h3 mb-3 fw-normal">Пожалуйста введите коментарий</h1>
                <div style="display: none" class="form-floating" >
                    <input type="text" class="form-control" name="id_paint" id="id_paint" value="<?php echo $masiv['id_paint'] ?>" >
                    <label for="id_paint">id_paint</label>
                </div>
                <div style="display: none" class="form-floating" >
                    <input type="text" class="form-control" name="user_id_paint" id="user_id_paint" value="<?php echo $masiv['user_id_paint'] ?>" >
                    <label for="user_id_paint">user_id_paint</label>
                </div>
                <div style="display: none" class="form-floating" >
                    <input type="text" class="form-control" name="email_paint" id="email_paint" value="<?php echo $masiv['email_paint'] ?>" >
                    <label for="email_paint">email_paint</label>
                </div>
                <div style="display: none" class="form-floating" >
                    <input type="text" class="form-control" name="username_paint" id="username_paint" value="<?php echo $masiv['username_paint'] ?>" >
                    <label for="username_paint">username_paint</label>
                </div>
                <div style="display: none" class="form-floating" >
                    <input type="text" class="form-control" name="avatar_paint" id="avatar_paint" value="<?php echo $masiv['avatar_paint'] ?>" >
                    <label for="avatar_paint">avatar_paint</label>
                </div>
                <div style="display: none" class="form-floating" >
                    <input type="text" class="form-control" name="paintName" id="paintName" value="<?php echo $masiv['paintName'] ?>" >
                    <label for="paintName">paintName</label>
                </div>
                <div class="form-floating" >
                    <textarea required class="form-control" name="coments" id="coments" rows="3" ></textarea>
                    <label for="coments">Ваш коментарий</label>
                </div>
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