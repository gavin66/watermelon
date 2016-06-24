'use strict';

module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',

    clean: {
      all:['dist'],
      html:['html/*.html'],
      css:['css/*.html'],
      js:['js/*.js'],
      img:['img/']
    },

    copy: {
      src:{
        files:[
          {expand: true, cwd: 'src', src: ['images/*.{png,jpg,jpeg,gif}'], dest: 'dist/html'}
        ]
      }
    },

    concat: {
      options: {
        separator:';',
        banner: '<%= banner %>',
        stripBanners: true
      },
      js: {
        src:['js/*.js'],
        dest: 'dist/<%= pkg.name %>.js'
      },
      css: {
        src:['css/*.css'],
        dest: 'dist/<%= pkg.name %>.css'
      },
      dist: {
        src: ['js/*.js'],
        dest: 'dist/<%= pkg.name %>.js'
      }

    },

    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        src: '<%= concat.dist.dest %>',
        dest: 'dist/<%= pkg.name %>.min.js'
      }
    },

    jshint: {
      options: {
        jshintrc: true
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      src: {
        src: ['js/**/*.js']
      }
    },

    sass: {
      dist: {
        options: {
          style: 'nested' // nested, compact, compressed, expanded.
        },
        files: {
          'tian.css': 'tian.scss'
        }
      },
      dev: {
        options:{
          sourcemap:'none',
          noCache:true,
          style:'expanded'
        },
        files:{
          '../../public/style/backend/index.css': 'scss/backend/index.scss',
          '../../public/style/auth/index.css': 'scss/auth/index.scss',
          '../../public/style/app.css': 'scss/app.scss',
          '../../public/style/frontend/article.css': 'scss/frontend/article.scss'

        }
      }
    },

    cssmin: {
      dist: {
        files: [{
          expand: true,
          cwd: 'release/css',
          src: ['css/*.css', '!*.min.css'],
          dest: 'css',
          ext: '.min.css'
        }]
      }
    },

    livereload: {
      options: {
        base: ''
      },
      files: ['../../public/**/*.css','../script/**/*.js']
    },

    watch: {
      gruntfile: {
        files: '<%= jshint.gruntfile.src %>',
        tasks: ['jshint:gruntfile']
      },
      src: {
        files: '<%= jshint.src.src %>',
        tasks: ['jshint:src']
      },
      sass: {
        files: ['scss/**/*.scss'],
        tasks: ['sass:dev']
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  //grunt.loadNpmTasks('grunt-livereload');


  grunt.registerTask('default', ['jshint', 'clean', 'concat', 'uglify']);

  //grunt.registerTask('live',['livereload','watch:sass']);
};
