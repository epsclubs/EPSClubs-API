restify = require('restify')
mongoose = require('mongoose')
restifyMongoose = require('restify-mongoose')
config = require('./config')
Schema = require('./schema')
db = mongoose.connect(config.creds.mongoose_auth)
models = {}

server = restify.createServer(
  name: 'EPSClubs-API'
  version: '0.2.0')

server.use restify.acceptParser(server.acceptable)
server.use restify.queryParser()
server.use restify.bodyParser(mapParams: true)

if 'development' == config.options.env
  morgan = require('morgan')
  server.use morgan('dev')
  console.log 'development'

models.Note = mongoose.model('notes', Schema.NoteSchema)
models.Menu = mongoose.model('menus', Schema.MenuSchema)
models.User = mongoose.model('users', Schema.UserSchema)

restifyMongoose(models.Note).serve '/notes', server
restifyMongoose(models.Menu).serve '/menus', server
restifyMongoose(models.User).serve '/users', server

server.get '/echo/:name', (req, res, next) ->
  res.send req.params
  next()

server.listen 8081, ->
  console.log '%s listening at %s', server.name, server.url
  return

# Tests: frisby, chai + mocha, supertest
# http://willi.am/blog/2014/07/28/test-your-api-with-supertest/
