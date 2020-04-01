<?php
	if($title == '') {
		$title = 'Or&aacute;culo da Moda';
	}else{
		$title = 'Or&aacute;culo da Moda'.' // '.$title;
	}
	$description = '';
	//$bg = 'style="background: url(img/banco/background/bg_' . $pagAtiva . '.jpg) no-repeat center top;"';
	$bg = 'style="background: url(' . get_template_directory_uri() . '/img/banco/background/bg_.jpg) no-repeat center top;"';
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="content-language" content="pt-br" />
<meta http-equiv="pragma" content="no-cache" />

<title><?php echo $title; ?></title>

<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="title" content="<?php echo $title; ?>" />
<meta name="robots" content="ALL" />
<meta name="rating" content="General" />
<meta name="author" content="Ederton Designer" />
<meta name="language" content="pt-br" />

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.3.2.js"></script>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/grid.css">