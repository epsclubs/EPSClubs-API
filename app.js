var restify = require('restify')
  , mongoose = require('mongoose')
  , restifyMongoose = require('restify-mongoose')
  , config = require('./config')
  , db = mongoose.connect(config.creds.mongoose_auth)
  , models = {};

var server = restify.createServer({
  name: 'EPSClubs-API',
  version: '0.2.0'
});

server.use(restify.acceptParser(server.acceptable));
server.use(restify.queryParser());
server.use(restify.bodyParser());

if ('development' == config.options.env) {
  var morgan = require('morgan');
  server.use(morgan('dev'));
}

var NoteSchema = new mongoose.Schema({
  title : { type : String, required : true },
  date : { type : Date, required : true },
  tags : [String],
  content : { type: String }
});

var UserSchema = new mongoose.Schema({
  _id : {type : String, index: { unique : true }, required : true},
  first_name : {type : String, required : true},
  last_name : {type : String, required : true},
  student_number : {type : Number, required : true},
});
var ClubSchema = new mongoose.Schema({});
var EventSchema = new mongoose.Schema({});
var ShiftSchema = new mongoose.Schema({});

models.Note = mongoose.model('notes', NoteSchema);

restifyMongoose(models.Note).serve('/notes', server);

server.get('/echo/:name', function (req, res, next) {
  res.send(req.params);
  return next();
});

server.listen(8080, function () {
  console.log('%s listening at %s', server.name, server.url);
});

// Tests: frisby, chai + mocha, supertest
// http://willi.am/blog/2014/07/28/test-your-api-with-supertest/
