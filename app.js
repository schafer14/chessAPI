/**
 * Module dependencies.
 */
var express = require('express');
var http = require('http');

var app = express();

// all environments
app.configure(function() {
	//settings
	app.set('port', process.env.PORT || 3001);

	//middleware
	app.use(express.cookieParser());
	app.use(express.bodyParser());	
	app.use(express.methodOverride());
})

app.get('/', function(req, res) {
	res.send('Documentation for purplechess.us');
});

http.createServer(app).listen(app.get('port'), function(){
  	console.log('Express server listening on port ' + app.get('port'));
});
