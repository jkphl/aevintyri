/* global module:false */
module.exports = function(grunt) {
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		
		sass					: {
			general				: {
				files			: [{
					expand		: true,
					cwd			: 'data/assets/sass/',
		 			src			: ['**/*.scss', '!00_Noconcat/**/*.scss'],
					dest		: 'public/css/',
					ext			: '.css'
				}],
				options: {
					sourcemap	: true,
					style		: 'compressed'
				}
			},
			noconcat			: {
				files			: [{
					expand		: true,
					cwd			: 'data/assets/sass/00_Noconcat',
		 			src			: ['**/*.scss'],
					dest		: 'public/css/',
					ext			: '.css'
				}],
				options: {
					sourcemap	: true,
					style		: 'nested'
				}
			}
		},
		
		favicons				: {
			options				: {
				html			: 'public/favicons/favicons.html',
				HTMLPrefix		: '/public/favicons/',
				precomposed		: false,
				firefox			: true,
				firefoxManifest : 'public/favicons/events.webapp',
				appleTouchBackgroundColor : '#222222'
			},
			icons				: {
				src				: 'data/assets/favicon/favicon.png',
				dest			: 'public/favicons'
		    }
		},
		
		iconizr : {
			dist : {
				src : ['data/assets/icons'],
				dest : ['public/css/'],
				options : {
					render		: {
						css		: false,
						scss	: '../assets/sass/00_Noconcat/icons'
					},
					spritedir	: 'icons',
					prefix		: 'icons',
					common		: 'icon',
					verbose		: 0,
					keep		: 0,
					dims		: 1,
					quantize	: 1,
					preview		: false
				}
			}
		},
		
		copy					: {
			favicon: {
				src				: 'public/favicons/favicon.ico',
				dest			: 'favicon.ico'
			}
		},
		
		replace					: {
			favicon: {
				src				: ['public/favicons/favicons.html'],
				overwrite		: true,
				replacements	: [{
					from		: /[\t\r\n]+/g,
					to			: ''
			    }, {
					from		: /<link rel="shortcut icon".*/g,
					to			: '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/><link rel="icon" href="favicon.ico" type="image/x-icon"/>'
			    }]
			}
			
		},
		
		autoprefixer			: {
			options				: {
				browsers		: ['last 3 versions', 'ie 8']
			},
			general				: {
				src				: ['public/css/events.css']
			},
			noconcat			: {
				expand			: true,
      			flatten			: true,
				src				: 'public/css/noconcat/*.css',
				dest			: 'public/css/'
			}
		},
		
		cssmin					: {
			general				: {
				files			: {
					'public/css/events.min.css' : ['public/css/events.css']
				}
			}
		},

		concat					: {
			general 			: {
				src				: ['public/css/*.css', '!public/css/icons-*.css'],
				dest			: 'public/css/events.css'
			},
			javascript			: {
				src				: ['data/assets/js/**/*.js', '!data/assets/js/01_exclude/**/*.js'],
				dest			: 'public/js/events.js'
			}
		},

		uglify 					: {
			javascript			: {
				expand			: true,
				cwd				: 'public/js/',
				src				: ['**/*.js', '!**/*.min.js'],
				dest			: 'public/js/',
				ext				: '.min.js'
			}
		},

		clean					: {
			general				: ['public/css/events.min.css'],
			javascript			: ['public/js/events.js', 'public/js/events.min.js'],
			favicon				: ['favicon.ico']
		},

		watch : {
			// Watch Sass resource changes
			sassGeneral : {
				files : 'data/assets/sass/**/*.scss',
				tasks : ['sass:general']
			},
			// Watch changing CSS resources
			cssGeneral : {
				files : ['public/css/*.css', '!public/css/*.min.css'],
				tasks : ['clean:general', 'concat:general', 'autoprefixer:general', 'cssmin:general'],
				options : {
					spawn : true
				}
			},
			
			// Watch & uglify changing JavaScript resources
			javascript : {
				files : ['data/assets/js/**/*.js', '!data/assets/js/01_exclude/**/*.js'],
				tasks : ['clean:javascript', 'concat:javascript', 'uglify'],
				options : {
					spawn : true
				}
			},

			// Watch SVG icon changes
			iconizr : {
				files : ['data/assets/icons/**/*.svg'],
				tasks : ['iconizr', 'css', 'sass'],
				options : {
					spawn : true
				}
			}
		}
	});

	// Default task.
	grunt.registerTask('default', ['iconizr', 'sass', 'css', 'js']);
	grunt.registerTask('css', ['clean:general', 'concat:general', 'autoprefixer', 'cssmin']);
	grunt.registerTask('js', ['concat:javascript', 'uglify']);
	grunt.registerTask('icons', ['iconizr']);
	grunt.registerTask('favicon', ['clean:favicon', 'favicons', 'copy:favicon', 'replace:favicon']);
	
};
