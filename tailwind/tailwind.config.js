// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			colors: {
				magenta: '#ca4050',
				pink: '#e1a196',
			},
			fontFamily: {
				display: ['Inter', 'system-ui', 'sans-serif'],
				body: ['Inter', 'system-ui', 'sans-serif'],
			},
			// typography: (theme) => ({
			// 	DEFAULT: {
			// 		css: {
			// 			color: theme('colors.secondary'),

			// 			// ...
			// 		},
			// 	},
			// }),
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/container-queries'),
	],
	safelist: [
		'py-8',
		'text-3xl',
		'lg:text-4xl',
		'py-2.5',
		'border-yellow-200',
		'bg-yellow-300',
		'hover:bg-yellow-400',
		'bg-blue-300',
		'hover:bg-blue-400',
		'rounded-md',
		'p-2',
		'text-white',
		'min-h-screen',
		'flex-col',
		'overflow-hidden',
		'bg-gray-50',
		'py-6',
		'sm:py-12',
		'border-green-300',
		'bg-green-300',
		'focus:border-gray-100',
		'mx-auto',
		'hover:bg-green-400',
		'p-6',
		'm-2',
	],
};
