'use strict';
module.exports = function(grunt) {

	// load all grunt tasks matching the `grunt-*` pattern
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		// watch for changes and trigger compass, jshint, uglify and livereload
		watch: {
			compass: {
				files: ['sass/**/*.{scss,sass}'],
				tasks: ['sass', "autoprefixer"]
			},
			js: {
				files: '<%= jshint.all %>',
				// tasks: ['jshint', 'uglify']
				tasks: ['jshint']
			},
			livereload: {
				options: { livereload: true },
				files: ['css/*.css', 'js/*.js', '*.html', '*.php', 'images/**/*.{png,jpg,jpeg,gif,webp,svg}']
			}
		},

		// compass and scss
		compass: {
			dist: {
				options: {
					config: 'config.rb',
				}
			}
		},

		sass: {
			dev: {
				options: {
					style: 'expanded',
					sourcemap: true
				},
				files: {
					'css/main.css': 'sass/main.scss'
				}
			}
		},
		autoprefixer: {
			dev: {
				src: 'css/main.css',
				dest: 'css/main.css'
			}
		},
		csso: {
			prod: {
				src: 'css/main.css',
				dest: 'css/main.css'
			}
		},

		// javascript linting with jshint
		jshint: {
			options: {
				jshintrc: '.jshintrc',
				"force": true
			},
			all: [
				'Gruntfile.js',
				'js/**/*.js'
			]
		},

		// uglify to concat, minify, and make source maps
		// uglify: {
		// 	plugins: {
		// 		options: {
		// 			sourceMap: 'assets/js/plugins.js.map',
		// 			sourceMappingURL: 'plugins.js.map',
		// 			sourceMapPrefix: 2
		// 		},
		// 		files: {
		// 			'assets/js/plugins.min.js': [
		// 				'assets/js/source/plugins.js',
		// 				// 'assets/js/vendor/yourplugin/yourplugin.js',
		// 			]
		// 		}
		// 	},
		// 	main: {
		// 		options: {
		// 			sourceMap: 'assets/js/main.js.map',
		// 			sourceMappingURL: 'main.js.map',
		// 			sourceMapPrefix: 2
		// 		},
		// 		files: {
		// 			'assets/js/main.min.js': [
		// 				'assets/js/source/main.js'
		// 			]
		// 		}
		// 	}
		// },

		// image optimization
		imagemin: {
			dist: {
				options: {
					optimizationLevel: 7,
					progressive: true
				},
				files: [{
					expand: true,
					cwd: 'images/',
					src: '**/*',
					dest: 'images/'
				}]
			}
		},

		// deploy via rsync
		rsync: {
			options: {
				args: ["--verbose"],
				src: "./",
				exclude: ['.git*', 'node_modules', '.sass-cache', 'Gruntfile.js', 'package.json', '.DS_Store', 'README.md', 'config.rb', '.jshintrc'],
				recursive: true,
				syncDestIgnoreExcl: true
			},
			staging: {
				options: {
					dest: "/home/tringuyen/webapps/inspiredev/seo-wp/wp-content/themes/seo-vietnam",
					host: "deploy@web319.webfaction.com"
				}
			}
		}

	});

	grunt.registerTask('deploy', [
		'sass',
		'autoprefixer',
		'csso',
		'jshint',
		'rsync'
	]);

	// register task
	grunt.registerTask('default', [
		'sass',
		'autoprefixer',
		'jshint',
		'watch'
	]);

};