/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';

window.Alpine = Alpine;
Alpine.plugin(intersect);

window.myData = function () {
	return {
		open: true,
		isOpen: () => (this.open = !this.open),
		x: 1,
		isDisabled: () => (this.open == true ? true : false),
	};
};
window.addEventListener('load', function () {
	let main_navigation = document.querySelector('#primary-menu-opl');
	document
		.querySelector('#primary-menu-toggle')
		.addEventListener('click', function (e) {
			e.preventDefault();
			main_navigation.classList.toggle('hidden');
		});
});

//Acceso API Laravel
const apiUrl = 'http://127.00.1:8000/api/sujetos'; // URL de la API de Laravel
const jetstreamToken = 'DrYDSiZXH78v8bWvDejpQ7RMjNrq619kQef1IlUA5db8363e'; //

window.Alpine.data('fetchData', () => ({
	registros: [],
	open: false,
	async getData() {
		data = [];
		loading = true;
		error = null;

		try {
			const response = await fetch(apiUrl, {
				headers: {
					Authorization: `Bearer ${jetstreamToken}`,
					Accept: 'application/json',
					'Content-Type': 'application/json',
				},
			});

			if (response.ok) {
				const json = await response.json();
				data = json.data;
				this.open = true;
			} else {
				error = `Error: ${response.status}`;
			}
		} catch (err) {
			error = `Error: ${err.message}`;
		} finally {
			loading = false;
		}
		this.registros = data;
	},
}));
Alpine.start();
