const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

var publicFontDirectory  = 'public/fonts',
	publicImageDirectory = 'public/images',
	directories          = {
		'resources/assets/plugins/bootstrap/fonts': publicFontDirectory,
	  	'resources/assets/plugins/font-awesome/fonts': publicFontDirectory,
        'resources/assets/plugins/materialize-css/fonts/': publicFontDirectory,
        'resources/assets/plugins/material-design-iconic-font/fonts': publicFontDirectory,
		'resources/assets/images': publicImageDirectory,
		'resources/assets/plugins/jquery-datatable/skin/bootstrap/images/sort_asc.png': publicImageDirectory,
		'resources/assets/plugins/jquery-datatable/skin/bootstrap/images/sort_asc_disabled.png': publicImageDirectory,
		'resources/assets/plugins/jquery-datatable/skin/bootstrap/images/sort_both.png': publicImageDirectory,
		'resources/assets/plugins/jquery-datatable/skin/bootstrap/images/sort_desc.png': publicImageDirectory,
		'resources/assets/plugins/jquery-datatable/skin/bootstrap/images/sort_desc_disabled.png': publicImageDirectory
	};

elixir((mix) => {
    mix.sass('style.scss')
		.webpack('admin.js')
        .scripts([
            'demo.js',
			'pages/ui/tooltips-popovers.js',
        ])
       	.scripts([
       		'jquery/jquery.min.js',
       		'bootstrap/js/bootstrap.min.js',
       		'bootstrap-select/js/bootstrap-select.js',
       		'ckeditor/ckeditor.js',
       		'jquery-slimscroll/jquery.slimscroll.js',
       		'jquery-datatables/jquery.dataTables.js',
       		'jquery-datatables/skin/bootstrap/dataTables.bootstrap.min.js',
       		'jquery-validation/jquery.validate.js',
       		'jquery-validation/additional-methods.js',
       		'jquery-validation/localization/messages_es.js',
       		'materialize-css/js/materialize.min.js',
			'multi-select/js/jquery.multi-select.js',
       		'node-waves/waves.js',
       		'raphael/raphael.min.js',
       		'morrisjs/morris.min.js',
       	], 'public/js/base-scripts.js', 'resources/assets/plugins')
       	.styles([
       		'bootstrap/css/bootstrap.min.css',
       		'node-waves/waves.min.css',
       		'animate-css/animate.min.css',
			'bootstrap-select/css/bootstrap-select.css',
			'multi-select/css/multi-select.css',
       		'morrisjs/morris.min.css',
            'ckeditor/content.css',
            'font-awesome/css/font-awesome.min.css',
            'material-design-iconic-font/css/material-design-iconic-font.min.css',
   		], 'public/css/base-styles.css', 'resources/assets/plugins');

	for (var directory in directories) {
  		mix.copy(directory, directories[directory]);
	}
});
