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
<section id="primary" class="mt-24 wrapper" x-data="{show:1,active: false}">
	<nav class="w-full mx-auto flex justify-center rounded-md list-disc">
		<ul class=" flex flex-row items-center">
			<li class="bg-blue-300  py-4" x-init="$watch('show', (value) => {
				if (value == 1) {
					$el.classList.remove('bg-blue-300');
					$el.classList.add('bg-gray-400');
				} else {
					$el.classList.remove('bg-gray-400');
					$el.classList.add('bg-blue-300');
				}}
			); initWatch(); " x-data="{
				initWatch: function() {
            		Alpine.effect(
						() => {
                			$el.classList.remove('bg-blue-300');
					$el.classList.add('bg-gray-400');
            				}
						);
        			}}">
				<button @click="active = true; show = 1" class="flex flex-col justify-center items-center focus:bg-gray-400 hover:bg-blue-400">
					<span class="text-white px-4 hover:text-blue-300">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
						</svg>
					</span>
					<span class="text-white px-4 hover:text-blue-300">Características</span>
				</button>
			</li>
			<li class=" bg-blue-300  py-4" x-init="$watch('show', value => {
				if (value == 2) {
					$el.classList.remove('bg-blue-300');
					$el.classList.add('bg-gray-400');
				} else {
					$el.classList.remove('bg-gray-400');
					$el.classList.add('bg-blue-300');
				}})">
				<button @click="active = true; show = 2" class="flex flex-col justify-center items-center focus:bg-gray-400 hover:bg-blue-400">
					<span class="text-white px-4 hover:text-blue-300">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
						</svg>
					</span>
					<span class="text-white px-4 hover:text-blue-300">Pulso Eleventa</span>
				</button>
			</li>
			<li class=" bg-blue-300  py-4" x-init="$watch('show', value => {
				if (value == 3) {
					$el.classList.remove('bg-blue-300');
					$el.classList.add('bg-gray-400');
				} else {
					$el.classList.remove('bg-gray-400');
					$el.classList.add('bg-blue-300');
				}})">
				<button @click="active = true; show = 3" class="flex flex-col justify-center items-center focus:bg-gray-400 hover:bg-blue-400">
					<span class="text-white px-4 hover:text-blue-300">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
						</svg>
					</span>
					<span class="text-white px-4 hover:text-blue-300">Beneficios</span>
				</button>
			</li>

		</ul>
	</nav>

	<main id=" main" class="grid grid-cols-1 grid-flow-row mx-2" x-init="initImages();" x-data="
	{
		imagesLoaded: false,
		images: function () {
			const refs = document.querySelectorAll('[x-ref]');
			return Array.from(refs).filter(
				(item) => item.tagName.toLowerCase() === 'img'
			);
		},
	loadedCount: 0,
	initImages: function () {
		// Función para comprobar si todas las imágenes están cargadas
		// const images = document.querySelectorAll('img');
		// let imagesLoaded = false;
		let count = 0;

		// const refs = document.querySelectorAll('[x-ref]');
		let images = Array.from(document.querySelectorAll('[x-ref]')).filter(
			(item) => item.tagName.toLowerCase() === 'img'
			);
		const checkerImages = () => images.length === count;
		images.forEach((img) => {
			if (img.complete) {
				count++;
				console.log(count);
			}
			if (!checkerImages()) {
				img.addEventListener('load', () => {
					count++;
					this.checkAllImagesLoaded();
				});
			} else {
				this.imagesLoaded = true;
				// this.checkAllImagesLoaded();
				// console.log(checkerImages());
			}
		});
	},
	checkAllImagesLoaded: function () {
		return (this.imagesLoaded =
			this.images.length === this.loadedCount ? true : false);
	},
}
	">
		<div class="flex">
			<div class="w-full justify-center " x-transition:enter="transition ease-out duration-300" x-cloak x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-ref='slide1' x-show="show == 1">
				<div class="grid grid-cols-2 bg-white" x-show="imagesLoaded">
					<div class="flex flex-col items-center justify-center h-full gap-y-2">
						<h1 class="text-xl md:text-4xl lg:text-7xl font-semibold" x-intersect="$el.classList.add('scale')">Características</h1>
						<ul>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-xl md:text-3xl">Fácil de usar</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-xl md:text-3xl">Controla tu inventario</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2  ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-xl md:text-3xl">Gestión de clientes y proveedores</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-xl md:text-3xl">Facturación</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2  ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-xl md:text-3xl">Pago de servicios y recargas</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg></span>
									<p class="text-xl md:text-3xl">Reportes de tu negocio en tu celular con Pulso Eleventa</p>
								</div>
							</li>
						</ul>
					</div>
					<div x-data="{ showImg1: false }" x-intersect.full="showImg1 = true">
						<div x-show="showImg1">
							<img x-ref="img1" src="<?php bloginfo('template_url') ?>  '/assets/images/ventajas_eleventa.svg'; ?>" class="mt-6 md:mt-0 md:max-h-[36rem] md:col-span-6 md:ml-auto lg:col-span-7" x-intersect="() => {
				$el.classList.add('scale');
			};">
						</div>
					</div>
				</div>
			</div>
			<div class="w-full justify-center" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-cloak x-transition:leave-end="opacity-0 scale-90" x-ref='slide2' x-show="show == 2">
				<div class="grid grid-cols-2 bg-white" x-show="imagesLoaded">
					<div x-data="{ showImg3: false }" x-intersect.full="showImg3 = true">
						<div x-show="showImg3">
							<img x-ref="img2" src="<?php bloginfo('template_url') ?>  '/assets/images/pulso_eleventa.svg'; ?>" class="mt-6 md:mt-0 md:max-h-[36rem] md:col-span-6 md:ml-auto lg:col-span-7" x-intersect="() => {
				$el.classList.add('scale');
			};">
						</div>
					</div>
					<div class="flex flex-col items-center justify-center h-full gap-y-2">
						<h1 class="text-xl md:text-4xl lg:text-7xl font-semibold" x-intersect="$el.classList.add('scale')">Pulso Eleventa</h1>
						<h2 class="text-xl md:text-2xl font-semibold mt-4" x-intersect="$el.classList.add('scale')">Podrás ver tus ventas, reportes y ganancias al instante desde cualquier lugar. Disponible para Android y iOS</h2>
						<ul class="text-xl font-bold" x-intersect="$el.classList.add('scale','text-2xl')">
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Resumen del día</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Ventas en tiempo real</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Múltiples reportes</p>
								</div>
							</li>
						</ul>
					</div>

				</div>
			</div>
			<div class="w-full justify-center" x-ref='slide3' x-transition:enter="transition ease-out duration-300" x-cloak x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-show="show == 3">
				<div class="grid grid-cols-2 bg-white-300" x-show="imagesLoaded">
					<div class="flex flex-col items-center justify-center h-full gap-y-2">
						<h2 class="text-2xl lg:text-7xl font-semibold mt-4 px-2 py-2" x-intersect="$el.classList.add('scale')">Beneficios</h2>
						<h2 class="text-2xl lg:text-4xl font-semibold mt-4 bg-green-200 rounded px-2 py-2" x-intersect="$el.classList.add('scale')">No necesitas saber computación.</h2>
						<ul class="text-xl font-bold" x-intersect="$el.classList.add('scale','text-2xl')">
							<li>
								<div class="flex flex-row items-center space-x-2">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Ahorra muchísimo tiempo</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Administra tus productos</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Haz crecer tu negocio</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Cuentas claras</p>
								</div>
							</li>
							<li>
								<div class="flex flex-row items-center space-x-2 ">
									<span class="text-green-400"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
									</span>
									<p class="text-lg md:text-xl">Manejo de compras</p>
								</div>
							</li>
						</ul>
					</div>
					<div x-data="{ showImg3: false }" x-intersect.full="showImg3 = true">
						<div x-show="showImg3">
							<img x-ref="img3" src="<?php bloginfo('template_url') ?>  '/assets/images/eleventa_beneficios.svg'; ?>" class="mt-6 md:mt-0 md:max-h-[36rem] md:col-span-6 md:ml-auto lg:col-span-7" x-intersect="() => {
				$el.classList.add('scale');
			};">
						</div>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

</section><!-- #primary -->
</div>
<?php

get_footer();
