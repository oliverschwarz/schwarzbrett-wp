'use strict';

module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    tag: {
      banner:   '/*\n' +
                'Theme name: <%= pkg.name %>\n' +
                'Theme URI: <%= pkg.repository.url %>\n' +
                'Author: <%= pkg.author %>\n' +
                'Version: <%= pkg.version %>\n' +
                'Description: <%= pkg.description %>\n' +
                '*/\n'
    },
    sass: {
      dev: {
        files: {
          'style.css' : 'scss/style.scss'
        },
        options: {
          style: 'compressed',
          banner: '<%= tag.banner %>'
        }
      }
    },
    watch: {
      sass: {
        files: ['scss/**/*.scss'],
        tasks: ['sass'],
        options: {
          spawn: false
        }
      }
    }
  });
  
  // Load plugins
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  
  // Register task
  grunt.registerTask('default',['watch']);
  
}