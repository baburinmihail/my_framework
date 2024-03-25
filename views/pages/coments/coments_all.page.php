<?php
    use App\Services\Page;
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
        <main class="">
            
            <div class="container px-4 py-5" id="custom-cards">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Аватарка</th>
                                <th scope="col">автор</th>
                                <th scope="col">текст</th>
                                <th scope="col">дата создания</th>
                                <?php 
                                    if (array_key_exists('username', $_SESSION)){
                                ?>
                                <th scope="col"></th>
                                <?php
                                }else{
                                    } 
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($masiv as $coments){  ?>
                            <!--coment-->    
                            <tr>
                            <?php
                                $str = $coments['avatar_paint'];
                                $first_characters = mb_substr($str, 0, 4);
                                    if ( $first_characters === 'http'){
                                        ?>
                                            <td><img src='<?php echo $coments['avatar_paint'] ?>' alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white"></td>
                                        <?php 
                                    }else{
                                        ?>
                                            <td><img src='<?php echo $GLOBALS['avatar_way_html'].$coments['avatar_paint'] ?>' alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white"></td>
                                        <?php 
                                    }
                            ?>
                                
                                <td><?php echo $coments['username_paint'] ?>"</td>
                                <td><?php echo $coments['mycoments'] ?>"</td>
                                <td><?php echo $coments['time_user'] ?>"</td>
                                <?php 
                                    if (array_key_exists('username', $_SESSION)){
                                ?>
                                <td>
                                    <form action="/coments_delite"  method="post">
                                        <input style="display: none" type="text" class="form-control" name="paint_id" id="paint_id" value="<?php echo $coments['id_paint'] ?>">
                                        <input style="display: none" type="text" class="form-control" name="username_now" id="username_now" value="<?php echo $_SESSION['username'] ?>">
                                        <input style="display: none" type="text" class="form-control" name="username_past" id="username_past" value="<?php echo $coments['username_paint'] ?>">
                                        <input style="display: none" type="text" class="form-control" name="id" id="id" value="<?php echo $coments['id'] ?>">
                                        <button type="submit"  class="btn btn-danger me-2">удалить коментарий</button>
                                    </form>
                                </td>
                                <?php
                                }else{
                                    } 
                                ?>
                            </tr>
                            <!--/coment-->
                            <?php } ?>       
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!--footer-->
        <?php 
            Page::part('footer');
        ?>
    </body>
</html>