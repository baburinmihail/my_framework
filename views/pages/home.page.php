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
                <h2 class="pb-2 border-bottom">Картины великих художников(для просмотра коментариев кликните на рисунок)</h2>
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                    <?php foreach ($masiv as $paints){  ?>
                    <!--карта1-->
                    <div class="col">
                        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <a href="/coments_all">
                                    <?php //$_GET['paintsID'] = $paints['id']; ?>
                                    <form action="/coments_all"  method="post">
                                        <button type="submit"  style="border:0px solid black; background-color: transparent;"><img src='<?php echo $GLOBALS['paint_way'].$paints['paint']."?paintsID=".urlencode($paints['id']) ?>' alt="Bootstrap" width="300" height="200" class="rounded-circle border border-white" style="margin-bottom: 10px;"></button>
                                        <input style="display: none" type="text" class="form-control" name="id_paint" id="id_paint" value="<?php echo $paints['id'] ?>">
                                    </form>       
                                </a>
                                    <ul class="d-flex list-unstyled mt-auto">
                                    <li class="me-auto">
                                        <img src='<?php echo $GLOBALS['avatar_way_html'].$paints['avatar'] ?>' alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                                    </li>
                                    <li class="d-flex align-items-center me-3">
                                        <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                                        <small>Автор: <?php echo $paints['username']; ?></small>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <?php 
                                            if (array_key_exists('username', $_SESSION)){
                                        ?>
                                        <form action="/coments_add"  method="post">
                                            <input style="display: none" type="text" class="form-control" name="id_paint" id="id_paint" value="<?php echo $paints['id'] ?>">
                                            <input style="display: none" type="text" class="form-control" name="user_id_paint" id="user_id_paint" value="<?php echo $_SESSION["user_id"] ?>">
                                            <input style="display: none" type="text" class="form-control" name="email_paint" id="email_paint" value="<?php echo $_SESSION["email"] ?>">
                                            <input style="display: none" type="text" class="form-control" name="username_paint" id="username_paint" value="<?php echo $_SESSION["username"] ?>">
                                            <input style="display: none" type="text" class="form-control" name="avatar_paint" id="avatar_paint" value="<?php echo $_SESSION["avatar"] ?>">
                                            <input style="display: none" type="text" class="form-control" name="paintName" id="paintName" value="<?php echo $paints['paint'] ?>">
                                            <small><button type="submit"  class="btn btn-success me-2">Добавить коментарий</button> </small>
                                        </form>
                                        <form action="/paint_delite"  method="post">
                                            <input style="display: none" type="text" class="form-control" name="username_del_now" id="username_del_now" value="<?php echo $_SESSION["username"] ?>">
                                            <input style="display: none" type="text" class="form-control" name="username_paint_del" id="username_paint_del" value="<?php echo $paints['username'] ?>">
                                            <input style="display: none" type="text" class="form-control" name="id_paint_del" id="id_paint_del" value="<?php echo $paints['id'] ?>">
                                            <small><button type="submit" style="height: 63px;"  class="btn btn-danger me-2">Удалить</button> </small>
                                        </form>
                                        <?php
                                            }else{
                                            } 
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/карта1-->
                    <?php } ?>    
                </div>
            </div>
        </main>
        <!--footer-->
        <?php 
            Page::part('footer');
        ?>
    </body>
</html>