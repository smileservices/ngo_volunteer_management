var concat = require('concat');
var filesJs = [
	'./node_modules/jquery/dist/jquery.js',
	'./node_modules/bootstrap/dist/js/bootstrap.js',
	'./node_modules/bootstrap-material-design/dist/js/material.js',
	'./node_modules/bootstrap-material-design/dist/js/ripples.js',
	'./node_modules/imagesloaded/imagesloaded.pkgd.js',
	'./node_modules/masonry-layout/dist/masonry.pkgd.js'
];

concat(filesJs, 'all.js', function (error) {
  console.log(error);
});