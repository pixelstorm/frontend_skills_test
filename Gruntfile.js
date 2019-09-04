module.exports = function ( grunt ) {

	// Load all Grunt tasks
	require( 'jit-grunt' )( grunt );

	const sass = require( 'node-sass' );

	grunt.initConfig( {

		pkg: grunt.file.readJSON( 'package.json' ),

		// Compile our sass.
		sass: {
			prod: {
				options: {
					implementation: sass,
					outputStyle: 'compressed'
				},
				files: {
					'css/clean-blog.css': 'less/clean-blog.scss',
				}
			}
		},

		// Watch for changes.
		watch: {
			options: {
				livereload: true,
			},
			scss: {
				files: [ 'less/**/*.scss' ],
				tasks: [ 'sass:prod' ]
			}
		},

		connect: {
			server: {
				options: {
					base: '.',
					livereload: true
				}
			}
		},

	} );

	// Prepare
	grunt.registerTask( '', [

	] );

	// Start the static server
	grunt.registerTask( 'server', [
		'connect',
		'watch'
	] );

};
