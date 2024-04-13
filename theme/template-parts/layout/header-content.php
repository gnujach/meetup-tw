<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tailwind_opnlnk
 */

?>
<header id="masthead" x-data="{is_index:  location.pathname}">
	<div x-data="{ atTop: false, open:false }" class="mx-auto  z-10  mt-0 fixed inset-x-0  top-0   bg-white " :class="{ 'lg:bg-transparent': is_index !='/', 'lg:bg-gray-50': is_index =='/'}">
		<div class=" lg:flex lg:justify-between lg:items-center xs:border-b md:border-b-none py-2 " :class=" {'text-indigo-500 ' : !atTop, ' opacity-90 bg-gradient-to-r from-blue-200 to-blue-300 text-white' : atTop }" @scroll.window="atTop = (window.pageYOffset < 150) ? false: true">
			<div class="flex justify-between items-center ">
				<div class="ml-2">
					<?php if (has_custom_logo()) { ?>
						<?php the_custom_logo(); ?>
						<?php } else {

						$tailwind_opnlnk_description = get_bloginfo('description', 'display');
						if ($tailwind_opnlnk_description || is_customize_preview()) :
						?>
							<p><?php echo $tailwind_opnlnk_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								?></p>
					<?php endif;
					} ?>
				</div>
				<div class="lg:hidden">
					<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle" @click="open = ! open;">
						<svg viewBox="0 0 20 20" class="inline-block w-6 h-6 mr-2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x-show="!open">
							<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
								<g id="icon-shape">
									<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
								</g>
							</g>
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-4" x-show="open">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
						</svg>

					</a>
				</div>

			</div>
			<div class="flex justify-start  lg:mr-12 lg:w-1/3 items-center ">
				<nav id="site-navigation" aria-label="<?php esc_attr_e('Menu Principal', 'tailwind_opnlnk'); ?>">
					<?php

					wp_nav_menu(
						array(
							'theme_location'  => 'menu-1',
							'container_id'    => 'primary-menu-opl',
							'menu_id'        =>  'primary-menu-list',
							'container_class' => 'hidden bg-transparent mt-2 p-2 lg:mt-0 xs:text-black md:text-slate-50 lg:p-0 lg:block lg:bg-transparent font-semibold',
							'menu_class'      => 'lg:flex lg:-mx-4 ',
							'li_class_0'      => 'text-magenta lg:mx-4 lg:relative group lg:hover:-translate-y-1 lg:transition lg:ease-in-out lg:delay-150 lg:duration-300 lg:p-4 hover:from-blue-500 hover:to-blue-200',
							'li_class_1'      => 'hover:italic ',
							'submenu_class'   => 'z-10 hidden group-hover:block rounded lg:absolute lg:left-1/2 lg:rounded lg:w-48 lg:max-w-3xl lg:bg-gray lg:ring-1 lg:transform lg:-translate-x-1/2 lg:shadow-behind px-6 pt-2 lg:leading-loose lg:mt-4 lg: bg-blue-300',
							'fallback_cb'     => false,
						)
					);
					// }
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</div>

</header><!-- #masthead -->
