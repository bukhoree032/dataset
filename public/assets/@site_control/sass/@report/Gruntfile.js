const sass = require('node-sass');
module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            options: {livereload: true},
            scss: {
                files: ['./**/*.sass', './**/*.scss'],
                tasks: ['sass', 'postcss', 'concat', 'cssmin'],
                options: {
                    interrupt: true
                }
            },
        },
        sass: {
            dist: {
                options: {
                    implementation: sass,
                    outputStyle: 'expanded',
                    sourceMap: false
                },
                files: [{
                    expand: true,
                    cwd: './',
                    src: ['*.scss'],
                    dest: '../../css/@report/',
                    ext: '.css'
                }]
            }
        },
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd: '../../css/@report/',
                    src: [
                        'bundle.css',
                        '!*.min.css'
                    ],
                    dest: '../../css/@report/',
                    ext: '.min.css'
                }]
            }
        },
        concat: {
            options: {
                separator: '',
            },
            dist: {
                src: [
                    '../../assets/webfonts/THSarabun/THSarabun.css',
                    '../../css/@report/main.css',
                ],
                dest: '../../css/@report/bundle.css',
            },
        },
        postcss: {
            options: {
                map: false,
                processors: [
                    require('autoprefixer')
                ]
            },
            dist: {
                src: ['../../css/@report/*.css']
            }
        }
    });

    // Load the Grunt plugins.
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // Set task aliases
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['sass']);
};
