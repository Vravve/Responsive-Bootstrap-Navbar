<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php 
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value. 
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'tinta' ); ?></a>

<div id="wrapper">
	<header>
		<nav id="header" class="m-3 navbar <?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; 
			elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container d-flex">
				<a class="navbar-brand p-2 flex-grow-1" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.
						
						if ( ! empty( $header_logo ) ) {  ?>
							<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					   <?php } else { 
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
					    } 
					?>
				</a>

				<button class="navbar-button p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'tinta' ); ?>">
					<span class="navbar-icon"><i class="fa-solid fa-bars"></i></span>
				</button>

				<button class="navbar-button p-2" type="button" data-bs-toggle="collapse" data-bs-target="#search" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Navbar Search', 'tinta' ); ?>">
					<span class="navbar-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
				</button>

				<div id="navbar" class="collapse navbar-collapse">
					<div class="d-flex justify-content-end align-items-end custom-menu py-2">
						<?php
							// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
								array(
									'menu_class'     => 'navbar-nav ms-auto mr-auto text-end',
									'container'      => '',
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
									'theme_location' => 'main-menu',
								)
							);
						?>
					</div>
				</div><!-- /.navbar-collapse -->

				<div id="search" class="collapse navbar-collapse">
					<?php get_search_form(); ?>
				</div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="container"<?php if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' style="padding-top: 100px;"'; 
		elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' style="padding-bottom: 100px;"'; endif; ?>>

