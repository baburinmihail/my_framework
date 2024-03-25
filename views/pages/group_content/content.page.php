<?php
    use App\Services\Page; 
    //echo $masiv;
    switch ($masiv) {
        case 'no_con':
            Page::part('no_con');
            break;
        case 'yandex_con':
            Page::part('yandex_con');
            break;
        case 'user_con':
            Page::part('user_con');
            break;
    }
?> 
