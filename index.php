<?php
get_header();
?>

<main id="primary" class="l-contents">

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>
			<header>
				<h1 class="screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
		endif;

		while (have_posts()) :
			the_post();
		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				if (is_singular()) :
					the_title('<h1>', '</h1>');
				else :
					the_title('<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;
				?>

				<div>
					<?php the_content(); ?>
				</div>

			</article>

	<?php
		endwhile;

		the_posts_navigation();

	else :

		echo '<p>投稿はありません。</p>';

	endif;
	?>

</main>

<?php
get_footer();
