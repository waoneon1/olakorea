<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Potaruru
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pota' ); ?></a>

	<header id="header">
		<div class="container">
			<div class="navbar-backdrop">
				<div class="navbar">
					<div class="navbar-left">
						<a class="navbar-toggle"><i class="fa fa-bars"></i></a>
						<a href="<?php echo get_home_url() ?>" class="logo">
							<img src="<?php echo get_template_directory_uri() ?>/src/img/logo.png" alt="Potaruru">
						</a>
						<nav class="nav">
							<?php
								wp_nav_menu( array(
									'theme_location'  	=> 'menu-1',
									'menu_id'         	=> 'primary-menu',
									'container'			=> false,
									'walker'      		=> new pota_walker_nav_menu()
								) );
							?>
						</nav>
					</div>
						<div class="nav navbar-right">
							<ul>
								<?php if (1==2): ?>
								<li class="hidden-xs-down"><a href="login.html">Login</a></li>
								<li class="hidden-xs-down"><a href="register.html">Register</a></li>
								<?php endif ?>
								<li><a data-toggle="search"><i class="fa fa-search"></i></a></li>
							</ul>
						</div>
				</div>
			</div>
			<div class="navbar-search">
				<div class="container">
					<form method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>" >
						<input type="text" class="form-control" placeholder="Search..." name="s">
						<i class="fa fa-times close"></i>
					</form>
				</div>
			</div>
		</div>
		<progress value="0"></progress>
	</header> <!-- #header -->

	<div id="content" class="site-content">
