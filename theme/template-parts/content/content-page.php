<?php

/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package meetup-tw
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('relative	'); ?>">

	<header class="entry-header">
		<div class="grid grid-cols-1 grid-flow-row w-full justify-center items-center">
			<div class="w-full flex flex-col justify-end md:items-center md:justify-center p-2 shrink-0 snap-start bg-transparent h-32 md:h-80 content-box" role="option">
				<?php
				the_title('<h2 class="font-bold text-slate-500 space-x-4 xs:mx-2 xs:p-4 lg:p-none lg:mx-none text-lg md:text-4xl lg:text-5xl">', '</h2>');
				?>
			</div>
		</div>
	</header><!-- .entry-header -->
	<div class="flex max-h-screen justify-center ">
		<?php meetup_tw_post_thumbnail(); ?>
	</div>
	<div <?php meetup_tw_content_class('entry-content mt-4 mx-auto p-2 max-w-7xl'); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', 'meetup-tw'),
				'after'  => '</div>',
			)
		);
		?>
		<div x-data="{ shown: false }" x-intersect.enter="shown = true">
			<div x-show="shown" x-transition>
				<span class="scale-75 translate-x-4 skew-y-3 text-2xl bg-magenta ring-lime-100 rounded-md mx-4 my-4">I'm in the viewport!</span>
			</div>
		</div>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__('Edit <span class="sr-only">%s</span>', 'meetup-tw'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
