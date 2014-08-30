'use strict';

module.exports = function(grunt) {

	// Load NPM tasks to be used here
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.loadNpmTasks( 'grunt-checktextdomain' );

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Setting directory of the boilerplate to fetch files
		plugin_dir: { 
			main: 'woocommerce-extension-boilerplate-lite',
		},

		// Setting the assets folders
		dirs: {
			css: '<%= plugin_dir.main %>/assets/css',
			js: '<%= plugin_dir.main %>/assets/js',
			lang: '<%= plugin_dir.main %>/languages',
		},

		// Javascript linting with jshint.
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'<%= dirs.js %>/admin/*.js',
				'!<%= dirs.js %>/admin/*.min.js',
				'<%= dirs.js %>/frontend/*.js',
				'!<%= dirs.js %>/frontend/*.min.js'
			]
		},

		// Minify all .js files.
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
				preserveComments: 'some'
			},
			admin: {
				files: [{
					expand: true,
					cwd: '<%= dirs.js %>/admin/',
					src: [
						'*.js',
						'!*.min.js',
						'!Gruntfile.js',
					],
					dest: '<%= dirs.js %>/admin/',
					ext: '.min.js'
				}]
			},
			frontend: {
				files: [{
					expand: true,
					cwd: '<%= dirs.js %>/frontend/',
					src: [
						'*.js',
						'!*.min.js'
					],
					dest: '<%= dirs.js %>/frontend/',
					ext: '.min.js'
				}]
			},
		},

		// Minify all .css files.
		cssmin: {
			minify: {
				expand: true,
				cwd: '<%= dirs.css %>/',
				src: ['*.css', '!*.min.css'],
				dest: '<%= dirs.css %>/',
				ext: '.min.css'
			}
		},

		// Watch changes in the assets
		watch: {
			js: {
				files: [
					'<%= dirs.js %>/admin/*js',
					'<%= dirs.js %>/frontend/*js',
					'!<%= dirs.js %>/admin/*.min.js',
					'!<%= dirs.js %>/frontend/*.min.js'
				],
				tasks: ['uglify']
			},
			css: {
				files: [
					'<%= dirs.css %>/admin/*css',
					'<%= dirs.css %>/*css',
					'!<%= dirs.css %>/admin/*.min.css',
					'!<%= dirs.css %>/*.min.css'
				],
				tasks: ['cssmin']
			}
		},

		checktextdomain: {
			options:{
				text_domain: 'woocommerce-extension-boilerplate-lite',
				keywords: [
					'__:1,2d',
					'_e:1,2d',
					'_x:1,2c,3d',
					'esc_html__:1,2d',
					'esc_html_e:1,2d',
					'esc_html_x:1,2c,3d',
					'esc_attr__:1,2d',
					'esc_attr_e:1,2d',
					'esc_attr_x:1,2c,3d',
					'_ex:1,2c,3d',
					'_n:1,2,4d',
					'_nx:1,2,4c,5d',
					'_n_noop:1,2,3d',
					'_nx_noop:1,2,3c,4d'
				]
			},
			files: {
				src:  [
					'**/*.php', // Include all files
					'!node_modules/**' // Exclude node_modules/
				],
				expand: true
			}
		},

		// Copy the plugin into the build directory
		copy: {
			main: {
				src:  [
					'**',
					'!.*',
					'!.*/**',
					'!.git/**',
					'!Gruntfile.js',
					'!package.json',
					'!.gitignore',
					'!.gitmodules',
					'!.gitattributes',
					'!.editorconfig',
					'!**/Gruntfile.js',
					'!**/package.json',
					'!**/README.md',
					'!**/CHANGELOG.md',
					'!**/CONTRIBUTING.md',
					'!**/FAQ.md',
					'!**/composer.json',
					'!**/*~'
				],
				dest: 'build/<%= pkg.name %>/',
				expand: true,
				dot: true
			}
		},

		// Clean up build directory
		clean: {
			main: ['build/<%= pkg.name %>']
		},

		// Compress build directory into <name>.zip and <name>-<version>.zip
		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: './build/<%= pkg.name %>.zip'
				},
				expand: true,
				cwd: 'build/<%= pkg.name %>/',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}
		},

	});

	// Register Tasks
	grunt.registerTask( 'default', ['jshint', 'cssmin', 'uglify']);

	// Build task(s).
	grunt.registerTask( 'build', [ 'clean', 'copy', 'compress' ] );

};