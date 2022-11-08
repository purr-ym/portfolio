<?php
get_header();
?>

<main id="primary" class="l-contents">

	<?php
	while (have_posts()) :
		the_post();

		global $post;
		$slug = $post->post_name;
	?>

		<article id="post-<?php the_ID(); ?>" class="p-<?php echo $slug; ?>">

			<?php
			the_title('<h1>', '</h1>');
			the_content();
			?>

		</article>

	<?php
	endwhile;
	?>

</main>

<?php
get_footer();
