<?php 
	ob_start();
	define('__APP__', TRUE);
	
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
print '
<!DOCTYPE html>
<html>
	<head>
		
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="some description">
        <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
				
        <meta name="author" content="alen@tvz.hr">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
		<title>Example page - HTML5</title>
	</head>
<body>
	<header>
		<div'; if ($menu > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
		<nav>';
			include("menu.php");
		print '</nav>
	</header>
	<main' . ((!empty($_COOKIE['news_title_1']) || !empty($_COOKIE['news_title_2']) || !empty($_COOKIE['news_title_3'])) ? ' class="cookie"' : '') .'>';
		
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	else if ($menu == 2) { include("news.php"); }
	else if ($menu == 3) { include("contact.php"); }
	else if ($menu == 4) { include("about-us.php"); }
	
	
	print '
	</main>';
	if (!empty($_COOKIE['news_title_1']) || !empty($_COOKIE['news_title_2']) || !empty($_COOKIE['news_title_3'])) {
		print '
		<aside><h2 style="text-align:center">ZADNJE PREGLEDANO</h2>';
		if (!empty($_COOKIE['news_title_1'])) { print '<p><a href="' . $_COOKIE['news_link_1'] . '">' . $_COOKIE['news_title_1'] . '</a></p>'; }
		if (!empty($_COOKIE['news_title_2'])) { print '<p><a href="' . $_COOKIE['news_link_2'] . '">' . $_COOKIE['news_title_2'] . '</a></p>'; }
		if (!empty($_COOKIE['news_title_3'])) { print '<p><a href="' . $_COOKIE['news_link_3'] . '">' . $_COOKIE['news_title_3'] . '</a></p>'; }
		print '
		</aside>';
	}
	print '
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Alen Šimec</p>
	</footer>
</body>
</html>';
?>
