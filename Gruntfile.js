'use strict';

module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    // Setting up the wordpress tag
    tag: {
      banner:   '/*\n' +
                'Theme name: <%= pkg.name %>\n' +
                'Theme URI: <%= pkg.repository.url %>\n' +
                'Author: <%= pkg.author %>\n' +
                'Version: <%= pkg.version %>\n' +
                'Description: <%= pkg.description %>\n' +
                '*/\n'
    },
    
    // Build sass
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
    
    // Watch for changes *then* build sass
    watch: {
      sass: {
        files: ['scss/**/*.scss'],
        tasks: ['sass'],
        options: {
          spawn: false
        }
      }
    },
    
    // clean
    clean: {
      dist: {
        src: ["<%= pkg.dest %>"]
      },
      options: {
        "no-write": true,
        "force": true
      }
    },

    // rsync files
    rsync: {
      options: {
        args: ["--verbose"],
        exclude: [".git*","*.scss","node_modules", ".sass-cache", "scss", "Gruntfile.js", "package.json", "README.md", "dist"],
        recursive: true
      },
      dist: {
        options: {
          src: "./",
          dest: "<%= pkg.dest %>"
        }
      }
    }

  });
  
  // Load plugins
  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
  
    // Register task
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('deploy', ['clean', 'rsync']);
  
}