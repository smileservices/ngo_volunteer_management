var concat = require('concat');
var filesCss = [
	'./node_modules/bootstrap/dist/css/bootstrap.min.css',
	'./node_modules/bootstrap-material-design/dist/css/bootstrap-material-design.min.css',
	'./node_modules/bootstrap-material-design/dist/css/ripples.min.css'
];

concat(filesCss, 'all.css', function (error) {
  // done
});