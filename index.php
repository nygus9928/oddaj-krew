<?php
    include("inc/header.php");
    include("inc/nav.php");


    $page = isset($_GET['page']) ? trim(strtolower($_GET['page']))       : "home";

    $allowedPages = array(
        'home'     	=> 'page/home.php',
        'error'     	=> 'page/err.php',
        'zarejestruj'    	=> 'page/reg.php',
        'krwiodawstwo'    => 'page/krw.php',
        'zaloguj'     	=> 'page/login.php',
        'opinie'    	=> 'page/opinion.php',
        'nagrody'    => 'page/reward.php',
        'dodaj_opinie'     	=> 'page/add_o.php',
        'zmien_dane'    	=> 'page/change_d.php',
        'odbierz_nagrode'    => 'page/take_r.php',
    );

    include(isset($allowedPages[$page]) ? $allowedPages[$page] : $allowedPages["error"] );
    include("inc/sidebar.php");
    include("inc/footer.php");
?>
