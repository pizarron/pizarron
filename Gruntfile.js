module.exports = function(grunt) {

  grunt.initConfig({
    // Cleans everything on public assets folder
    clean: {
      main: ['./public/assets/js', './public/assets/css', './public/assets/vendor'],
      css: ['./public/assets/css/main.css', './public/assets/css/vendors.css']
    },
    /**
     * All javascripts are concatenated in one main.js file
     * Vendor files must be added by hand to src array
     */
    concat: {
      options: {
        separator: ';'
      },
      js_frontend_vendor: {
        src: [
          './frontend/vendor/js/jquery.min.js',
          './frontend/vendor/js/bootstrap.min.js',
          './frontend/vendor/js/summernote.min.js',
          './frontend/vendor/js/jquery.autocomplete.min.js',
        ],
        dest: './public/assets/js/vendor.js'
      },
      // in case you want to concat everything
      // js_frontend_main: {
      //   src: [
      //     './frontend/js/**/*.js'
      //   ],
      //   dest: './public/assets/js/main.js'
      // }
    },
    /**
     * Compiles all stylesheets in different files in public/assets/css
     */
    compass: {
      options: {
        noLineComments: true,
        sassDir: './frontend/css',
        cssDir: './public/assets/css'
      },
      dist: {}
    },
    /**
     * Generates two stylesheet files:
     * The first one that concats all compiled
     * files by compass along with vendors (they must be added manually)
     * The second one that only have a vendor concatenation
     */
    cssmin: {
      add_banner: {
        options: {
          banner: '/* Pizarron */'
        },
        files: {
          './public/assets/css/main.css': [
            './public/assets/css/**/*.css'
          ],
          './public/assets/css/vendors.css': [
            './frontend/vendor/css/bootstrap.min.css',
            './frontend/vendor/css/font-awesome.min.css',
            './frontend/vendor/css/summernote.css'
          ]
        }
      }
    },
    /**
     * Uglifies or minifies file main.js so it can be lesser size
     */
    uglify: {
      options: {
        mangled: false
      },
      frontend: {
        files: {
          './public/assets/js/vendor.min.js': './public/assets/js/vendor.js',
          // './public/assets/js/main.min.js': './public/assets/js/main.js'
        }
      },
      // when we pretend to use single files
      others: {
        files: [{
          expand: true,
          cwd: './frontend/js',
          src: '**/*.js',
          dest: './public/assets/js',
          ext: '.min.js'
        }]
      }
    },
    /**
     * Watchs for changes in vendors (manually added)
     * and all js files in ./frontend/js
     * It also compiles and concatenates css files
     */
    watch: {
      javascript: {
        files: [
          './frontend/js/**/*.js'
        ],
        // as this is not a single page application, I prefer to only copy files
        // tasks: ['concat:js_frontend_vendor', 'concat:js_frontend_main' ,'uglify:frontend'],
        tasks: ['concat:js_frontend_vendor' ,'uglify:frontend', 'uglify:others'],
        options: {
          livereload: false
        }
      },
      compass: {
        files: [
          './frontend/css/**/*.{scss,sass}'
        ],
        tasks: ['compass', 'clean:css', 'cssmin']
      }
    },
    // copy all vendor styles and javascript to vendor folder in public
    copy: {
      main: {
        files: [
          {
            expand: true,
            cwd: './frontend/vendor',
            src: ['**'],
            dest: './public/assets/vendor/'
          }
        ]
      }
    }
  });


  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('build', [
    'clean:main',
    'compass',
    'cssmin',
    'concat',
    'uglify'
  ]);
  grunt.registerTask('default', ['build', 'copy:main', 'watch']);
};
