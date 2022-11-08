<?php
get_header();
?>

<main id="primary" class="l-contents">

	<div class="p-archive">
		<div class="l-wrapper">
			<?php
			$post_type = get_post_type();
			$posts_per_page = 12;
			$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
			$obj = get_queried_object();
			if (is_category()) {
				$args = array(
					'post_type' => $post_type,
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					'category_name' => $obj->slug
				);
			} elseif (is_tag()) {
				$args = array(
					'post_type' => $post_type,
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					'tag_id' => $obj->term_id
				);
			} else {
				$args = array(
					'post_type' => $post_type,
					'posts_per_page' => $posts_per_page,
					'paged' => $paged
				);
			}
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) {
				echo '<ul class="p-archive-list">';
				while ($the_query->have_posts()) {
					$the_query->the_post();
			?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="c-post-thumbnail"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>
							<?php
							$category = get_the_terms($post->ID, 'category');
							echo '<p class="c-post-category">' . $category[0]->name . '</p>';
							?>
							<p class="c-post-title"><?php the_title(); ?></p>
						</a>
					</li>
			<?php
				}
				wp_reset_postdata();
				echo '</ul>';
				$big = 999999999;
				echo '<nav class="l-pagination">';
				echo paginate_links(array(
					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'type' => 'list',
					'prev_text'    => '<',
					'next_text'    => '>',
					'total' => $the_query->max_num_pages
				));
				echo '</nav>';
			} else {
				echo '<p>投稿はありません。</p>';
			}
			?>
		</div>
	</div>

</main>

<?php
get_footer();
