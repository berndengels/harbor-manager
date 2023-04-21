const mix = require('laravel-mix');

const vueCustomsComponents = [
	'Sidebar',
//	'MyButton',
	'MyFormErrors',
];
mix.autoload({
		'jquery': ['jQuery', '$'],
	})
	.js('resources/js/app.js', 'public/js')
	.js('resources/js/app-admin.js', 'public/js').vue({
		options: {
			compilerOptions: {
				isCustomElement: (tag) => vueCustomsComponents.includes(tag),
			},
		},
	})
	.js('node_modules/leaflet', 'public/js')
	.js('node_modules/konva', 'public/js')
	.js('node_modules/leaflet-providers', 'public/js')
	.css('node_modules/leaflet/dist/leaflet.css', 'public/css')
	.sass('resources/sass/app-admin.scss', 'public/css')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/print.scss', 'public/css')
	.sass('resources/sass/pdf.scss', 'public/css')
	.copy('node_modules/tinymce', 'public/tinymce')
	.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
	.copy('node_modules/froala-editor', 'public/froala-editor')
	.webpackConfig(require('./webpack.config'))
	.vue({version: 3})
;