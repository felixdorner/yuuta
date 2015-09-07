'use strict';

module.exports = function(grunt) {

    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint and livereload
        watch: {
            sass: {
                files: ['assets/scss/**/*.{scss,sass}'],
                tasks: ['sass']
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                    sourcemap: 'none'
                },
                files: {
                    'style.css': 'assets/scss/style.scss'
                }
            }
        },

        // browserSync
        browserSync: {
            dev: {
                bsFiles: {
                    src : ['style.css', 'assets/js/*.js']
                },
                options: {
                    proxy: "yuuta.dev",
                    watchTask: true,
                    notify: false
                }
            }
        },

        clean: {
          build: ["yuuta"],          
        },

        copy: {
          build: {
            expand: true, 
            src: [
                '**/*', 
                '!**/node_modules/**', 
                '!**/bower_components/**', 
                '!bower.json', 
                '!**/documentation/**', 
                '!**/.sass-cache/**', 
                '!**/.git/**', 
                '!.gitignore', 
                '!**/scss/**', 
                '!Gruntfile.js', 
                '!package.json',
                '!yuuta.zip'
            ], 
            dest: 'yuuta/'
          },
        },

    });

    // register task
    grunt.registerTask('default', ['sass']);
    grunt.registerTask('serve', ['sass', 'browserSync', 'watch']);
    grunt.registerTask('build', ['sass', 'clean:build', 'copy:build']);

};
