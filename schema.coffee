Schema = require('mongoose').Schema

exports.NoteSchema = new Schema(
  _id: String
  title:
    type: String
    required: true
  date:
    type: Date
    required: true
  tags: [ String ]
  content: type: String)

exports.MenuSchema = new Schema(
  _id:
    type: String
    index: unique: true
    lowercase: true
    required: true
  pages: [{
    href: String
    glyphicon: String
    title: String
  }]
)

exports.UserSchema = new Schema(
  _id:
    type: String
    index: unique: true
    lowercase: true
    required: true
  first_name:
    type: String
    required: true
    trim: true
  last_name:
    type: String
    required: true
    trim: true
  email_address:
    type: String
    required: true
    trim: true
  student_number:
    type: Number
    required: true
  class_of:
    type: Number
    min: 2015
    required: true
  clubs: [ {
    club_id:
      type: String
      required: true
    member_type:
      type: String
      enum: [ 'member, exec' ]
      required: true
  } ]
  shifts: [ {
    shift_id:
      type: String
      required: true
    hours_earned:
      type: Number
      default: 0
  } ]
  messages: [ MessageSchema ])

exports.ClubSchema = new Schema(
  _id:
    type: String
    index: unique: true
    required: true
  name:
    type: String
    required: true
    trim: true
  description:
    type: String
    trim: true
    default: 'Description goes here'
  members: [ {
    member_id:
      type: String
      required: true
    member_type:
      type: String
      enum: [ 'member, exec' ]
      required: true
  } ]
  events: [ String ])

exports.EventSchema = new Schema(
  _id:
    type: String
    index: unique: true
    required: true
  name:
    type: String
    required: true
    trim: true
  description:
    type: String
    trim: true
    default: 'Description goes here'
  location:
    type: String
    trim: true
  start_time:
    type: Date
    required: true
  end_time:
    type: Date
    required: true
  shifts: [ String ])

exports.ShiftSchema = new Schema(
  _id:
    type: String
    index: unique: true
    required: true
  name:
    type: String
    required: true
    trim: true
  description:
    type: String
    trim: true
    default: 'Description goes here'
  start_time:
    type: Date
    required: true
  end_time:
    type: Date
    required: true
  volunteers: [ String ])

MessageSchema = new Schema(
  from:
    type: String
    required: true
    trim: true
  to:
    type: String
    required: true
    trim: true
  message:
    type: String
    required: true
    trim: true)
