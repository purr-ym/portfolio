<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	wp_body_open();
	// get_template_part('template-parts/page', 'check');
	?>

	<div id="page" class="l-site">

		<header class="l-header">
			<div class="l-header__inner">
				<?php if (is_front_page()) { ?>
					<h1 class="l-header-site-name"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php } else { ?>
					<p class=" l-header-site-name"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php } ?>
				<p class="l-header-repository"><a href="https://github.com/purr-ym/portfolio" target="_blank">https://github.com/purr-ym/portfolio <i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
			</div>

			<?php if (is_front_page()) { ?>
				<div class="l-header__bg"></div>
			<?php } ?>
		</header>

		<?php if (!is_front_page()) { ?>
			<div class="l-breadcrumbs" typeof="BreadcrumbList">
				<div class="l-wrapper">
					<ul>
						<li><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">HOME</a></li>
						<?php
						if (is_tag()) {
							echo '<li>' . single_term_title('', false) . '</li>';
						}
						?>
						<?php echo is_single() ? '<li>' . get_the_title() . '</li>' : ''; ?>
						<?php echo is_404() ? '<li>404</li>' : ''; ?>
					</ul>
				</div>
			</div>
		<?php } ?>