<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/bootstrap-responsive.css">
<link type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery.css" rel="stylesheet" />
<link type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery-ui-1.10.3.custom.css" rel="stylesheet" />
<link type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery2.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery2.ui.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-ui-1.10.3.custom.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span></a>
				<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo ''; } ?><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo ''; } ?>
				<div class="nav-collapse">
					<?php wp_nav_menu( 
						array( 
						
						'theme_location' => 'main-menu',
						'link_after' => '<li class="divider-vertical"></li>',
						'container'       => 'ul',
						'menu_class'      => 'nav',
						
						) 
						
						); 
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
	<br><br><br><br>