module.exports = function(grunt) {

  grunt.initConfig({
    // Cleans everything on public assets folder
    clean: {
      main: ['./public/assets'],
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
      js_frontend: {
        src: [
          './frontend/js/vendor/jquery.min.js',
          './frontend/js/vendor/bootstrap.min.js',
          './frontend/js/**/*.js'
        ],
        dest: './public/assets/js/main.js'
      }
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
            './frontend/css/bootstrap.min.css'
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
          './public/assets/js/main.js': './public/assets/js/main.js'
        }
      }
    },
    /**
     * Watchs for changes in vendors (manually added)
     * and all js files in ./frontend/js
     * It also compiles and concatenates css files
     */
    watch: {
      js_frontend: {
        files: [
          './frontend/js/**/*.js'
        ],
        tasks: ['concat:js_frontend', 'uglify:frontend'],
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
    }
  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('build', [
    'clean:main',
    'compass',
    'cssmin',
    'concat',
    'uglify'
  ]);
  grunt.registerTask('default', ['build', 'watch']);
};
