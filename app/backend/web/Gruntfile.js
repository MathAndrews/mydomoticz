module.exports = function (grunt) {
  require('time-grunt')(grunt);
  require('load-grunt-tasks')(grunt);

  var sassPath = './scss'
  var cssPath = './css'
  var files = [{
    expand: true,
    cwd: sassPath,
    src: [
      'sections/*.scss',
      '*.scss'
    ],
    dest: cssPath,
    ext: '.css'

  }];

  // sass
  var config = {
    'browserSync': {
      default_options: {
        bsFiles: {
          src: [
            '*.php',
            '**/*.php',
            '../views/*.php',
            '../views/**/*.php',
            'js/*.js',
            'js/**/*.js',
            'images/*.*',
            'images/**/*.*',
            'css/*.css',
            'css/**/*.css',
          ]
        },
        options: {
          proxy: 'http://hpkweb-dev.neox24.ch/backend',
          port: 3002,
          open: false,
          watchTask: true
        }
      }
    },
    'sass': {
      options: {
        outputStyle: 'compressed', // nested, expanded, compact, compressed
        //outputStyle: 'nested',
        outFile: cssPath,
        sourceMap: false,
        includePaths: [
          './node_modules'
        ]
      },
      dist: {
        files: files
      },
      dev: {
        options: {
          sourceMap: true,
        },
        files: files
      },
    },
    'watch': {
      files: [
        './**/*.scss'
      ],
      tasks: ['sass:dev'],
    },
    'clean': {
      options: {
        force: true
      },
      css: [
        cssPath + '/*'
      ]
    }
  };


  // init config
  grunt.initConfig(config);

  // register tasks
  grunt.registerTask('default', ['clean:css', 'sass:dist']);
  grunt.registerTask('dev', ['clean:css', 'sass:dev', 'watch']);
  grunt.registerTask('sync', ['clean:css', 'sass:dist', 'sass:dev', 'browserSync', 'watch']);
}