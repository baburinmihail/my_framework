<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/home" class="nav-link px-2 text-secondary">Home</a></li>
                </ul>
            <div class="text-end">
            <?php
            use App\Services\Router;
                //<button onclick="document.location='/profile'" type="button" class="btn btn-outline-light me-2">Profile</button>
                //проверка существования ключа в массиве Сессии 
                if (array_key_exists('username', $_SESSION)) {
                    if ($_SESSION['username']){   
                        ?>
                            <img src='<?php echo $GLOBALS['avatar_way_html'].$_SESSION['avatar'] ?>' alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            <form class="btn" action="/paint_form" method="post">
                                <button type="submit" class="btn btn-warning">Add paint</button>
                            </form>
                            <form class="btn" action="/exit" method="post">
                                <button type="submit" class="btn btn-danger">Exit</button>
                            </form>
                        <?php   
                    }else{
                        ?>
                            <img src="/assets/avatars/noAvatar.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        <?php
                    }
                }else{
                    ?>
                        <img src="/assets/avatars/noAvatar.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        <button onclick="document.location='/login'" type="button" class="btn btn-outline-light me-2">Login</button>
                        <button onclick="document.location='/register'" type="button" class="btn btn-warning">Sign-up</button>
                    <?php
                }
                ?> 
            </div>
        </div>
    </div>
</header>