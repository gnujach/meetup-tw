<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package meetup-tw
 */

get_header();

?>
<section id="primary" class="mt-24 wrapper" ">
	<main id=" main" class="grid grid-cols-1 grid-flow-row mx-2">
	<div class="grid grid-cols-2" x-data="{ showAnm1: false}">
		<div class="flex flex-col items-center justify-center h-full gap-y-2" x-show="showAnm1">
			<h1 class="text-4xl lg:text-7xl font-semibold" x-intersect="$el.classList.add('fadeInUp')">Title One</h1>
			<h2 class="text-2xl font-semibold mt-4" x-intersect="$el.classList.add('fadeInUp')">Lorem ipsum dolor sit amet consectetur.</h2>
			<p class="text-xl font-bold" x-intersect="$el.classList.add('fadeInUp','text-2xl')">Connect</p>
		</div>
		<div>
			<img src="<?php bloginfo('template_url') ?>  '/assets/images/analytics.svg'; ?>" class="mt-6 md:mt-0 md:max-h-[36rem] md:col-span-6 md:ml-auto lg:col-span-7" x-intersect.full="() => {
				const image = $el;
				if (!image.complete) {
					image.onload = () => { showAnm1 = true; $el.classList.add('scale');};
				}
			}
			">
		</div>
	</div>
	<div class="grid grid-cols-2 bg-fuchsia-300" x-data="{ showAnm2: false}">
		<div class="flex flex-col items-center justify-center h-full gap-y-2">
			<h1 x-show="showAnm2" class="text-4xl lg:text-7xl font-semibold" x-intersect="$el.classList.add('scale')">Title Two</h1>
			<h2 x-show="showAnm2" class="text-2xl font-semibold mt-4" x-intersect="$el.classList.add('scale')">Lorem ipsum dolor sit amet consectetur.</h2>
			<p x-show="showAnm2" class="text-xl font-bold" x-intersect="$el.classList.add('scale','text-2xl')">Connect</p>
		</div>
		<div>
			<img src="<?php bloginfo('template_url') ?>  '/assets/images/analytics.svg'; ?>" class="mt-6 md:mt-0 md:max-h-[36rem] md:col-span-6 md:ml-auto lg:col-span-7" x-intersect.full="() => {
				const image = $el;

				if (!image.complete) {
					image.onload = () => { showAnm2 = true; $el.classList.add('scale'); };
				}
			}
			">
		</div>
	</div>
	<div class="grid grid-cols-2 bg-green-300" x-data="{ showAnm3: false}">
		<div class="flex flex-col items-center justify-center h-full gap-y-2" x-show="showAnm3">
			<h1 x-show="showAnm3" class="text-4xl lg:text-7xl font-semibold" x-intersect="$el.classList.add('scale')">Title Tree</h1>
			<h2 x-show="showAnm3" class="text-2xl font-semibold mt-4" x-intersect="$el.classList.add('scale')">Lorem ipsum dolor sit amet consectetur.</h2>
			<p x-show="showAnm3" class="text-xl font-bold" x-intersect="$el.classList.add('scale','text-2xl')">Connect</p>
		</div>
		<div>
			<img src="<?php bloginfo('template_url') ?>  '/assets/images/analytics.svg'; ?>" class="mt-6 md:mt-0 md:max-h-[36rem] md:col-span-6 md:ml-auto lg:col-span-7" x-intersect.full="() => {
                const image = $el;
                if (!image.complete) {
					image.onload = () => {
						showAnm3 = true;
						$el.classList.add('scale');
					};
                }
				console.log(image.complete);
         }">
		</div>
	</div>
	</main><!-- #main -->
</section><!-- #primary -->
</div>
<?php

get_footer();
