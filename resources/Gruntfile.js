'use strict';

module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
    '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
    '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
    '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author %>;' +
    ' Licensed <%= pkg.license %> */\n',


    clean: {
      all:['dist/*']
    },

    copy: {
      options:{
        expand: true,
        filter: 'isFile'
      },
      dist:{
        files:{
          'dist/<%= pkg.name %>-debug.css':['demo/<%= pkg.name %>.css']
          //'dist/<%= pkg.name %>-debug.css':['demo/<%= pkg.name %>.css'],
          //'dist/<%= pkg.name %>-debug.js':['demo/<%= pkg.name %>.js']
        }
      }
    },

    sass: {
      options:{
        sourcemap:'none',
        noCache:true,
        style:'expanded'
      },
      dev: {
        files:{
          '../public/style/app.css': 'scss/app.scss',
          '../public/style/auth/index.css': 'scss/auth/index.scss',
          '../public/style/backend/index.css': 'scss/backend/index.scss'
        }
      }
    },

    cssmin: {
      dist: {
        files: {
          'dist/<%= pkg.name %>.min.css': ['dist/<%= pkg.name %>-debug.css']
        }
      }
    },

    uglify: {
      options: {
        banner: '<%= banner %>',
        mangle:true,
        preserveComments:false
      },
      dist: {
        files: {
          'dist/<%= pkg.name %>.min.js': ['dist/<%= pkg.name %>-debug.js']
        }
      }
    },

    eslint:{
      target:'dist/tagger-debug.js'
    },

    watch: {
      sass: {
        files: 'scss/**/*.scss',
        //tasks: ['sass:dev','copy:dist']
        tasks: ['sass:dev']
      },
      livereload: {
        options:{
          livereload:true
        },
        //files: ['test/script/**','test/style/**','test/index.html'] // 当前测试
        files: [
                '/var/www/github/watermelon/public/vendor/editor.md-1.5.0/editormd-debug.js',
                '/var/www/github/watermelon/public/vendor/editor.md-1.5.0/examples/simple.html',
                '/var/www/github/watermelon/public/vendor/editor.md-1.5.0/plugins/image-dialog/image-choose-dialog.js'
              ] // 测试 markdown 编辑器
      }
    },

    connect: {
      server: {
        options: {
          protocol: 'http',
          hostname: '127.0.0.1',
          port: 9001,
          //base: 'test', // 当前测试
          base: '/var/www/github/watermelon/public/vendor/editor.md-1.5.0', // 测试 markdown 编辑器
          keepalive: true,
          livereload:true
        }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-eslint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-connect');

  // 'eslint',
  grunt.registerTask('default', ['clean','sass:dev','copy:dist','uglify:dist','cssmin:dist']);

  grunt.registerTask('liveTask1',['connect']);
  grunt.registerTask('liveTask2',['watch']);

};
