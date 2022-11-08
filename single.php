<?php
get_header();
?>

<main id="primary" class="l-contents">
	<?php
	while (have_posts()) {
		the_post();
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('p-single'); ?>>

			<div class="l-wrapper">
				<header class="p-single-header">
					<div class="c-post-thumbnail"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>

					<?php
					$category = get_the_terms($post->ID, 'category');
					echo '<p class="c-post-category">' . $category[0]->name . '</p>';
					?>

					<?php
					$tag = get_the_terms($post->ID, 'post_tag');
					if (count($tag) != 0) {
						echo '<ul class="c-post-tags">';
						foreach ($tag as $term) {
							$term_name = $term->name;
							$term_link = get_term_link($term, 'post_tag');
							echo '<li><a href="' . $term_link . '">' . $term_name . '</a></li>';
						}
						echo '</ul>';
					}
					?>

					<h1 class="c-post-title"><?php the_title(); ?></h1>

					<?php $siteUrl = get_field('site_info')['url']; ?>
					<p class="c-post-url"><a href="<?php echo $siteUrl; ?>" target="_blank" rel="noopener noreferrer"><?php echo $siteUrl; ?> <i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>
				</header>

				<div class="p-single-content">
					<div class="c-post-contents">
						<?php the_content(); ?>
					</div>

					<?php if (have_rows('site_info')) { ?>
						<dl class="c-post-info">
							<?php
							while (have_rows('site_info')) {
								the_row();

								$summary = get_sub_field('summary');
								if ($summary) {
							?>
									<div>
										<dt>概要</dt>
										<dd><?php echo $summary; ?></dd>
									</div>
								<?php
								}
								$release = get_sub_field('release');
								if ($release) {
								?>
									<div>
										<dt>公開日</dt>
										<dd><?php echo $release; ?></dd>
									</div>
								<?php } ?>
								<div>
									<dt>制作時期</dt>
									<dd><?php the_sub_field('period'); ?></dd>
								</div>
								<?php
								$time = get_sub_field('time');
								if ($time) {
								?>
									<div>
										<dt>制作時間</dt>
										<dd><?php echo $time; ?></dd>
									</div>
								<?php } ?>
								<div class="c-post-info__lang">
									<dt>使用ツール・言語</dt>
									<dd>
										<ul>
											<?php
											$lang = get_sub_field('lang');
											foreach ($lang as $v) {
												echo '<li>' . $v['label'] . '</li>';
											}
											?>
										</ul>
									</dd>
								</div>
							<?php } ?>
						</dl>
					<?php } ?>

					<ul class="c-post-date">
						<li>Post: <time datetime="<?php the_time('Y-m-d'); ?>"><?php echo get_the_time('Y.n.j'); ?></time></li>
						<?php
						if (get_the_modified_time('Ymd') > get_the_time('Ymd')) {
							echo '<li>Update: <time datetime="' . get_the_modified_time('Y-m-d') . '">' . get_the_modified_time('Y.n.j') . '</time></li>';
						}
						?>
					</ul>
				</div>

				<footer class="p-single-footer">
					<ul class="p-single-footer-navi">
						<?php if (get_previous_post()) { ?>
							<li class="prev"><?php previous_post_link('%link', 'PREV'); ?></li>
						<?php } ?>
						<li><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
						<?php if (get_next_post()) { ?>
							<li class="next"><?php next_post_link('%link', 'NEXT'); ?></li>
						<?php } ?>
					</ul>
				</footer>
			</div>

		</article>
	<?php } ?>
</main>

<?php
get_footer();
