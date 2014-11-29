EPSClubs-API
============

EPSClubs-API is an Application Programming Interface written in PHP for the [Elgin Park Clubs project](https://github.com/epsclubs/Elgin-Park-Clubs).

Website: http://clubs.elginpk.com

###Models

A list of object models.

1. Club
2. Event
3. Shift
4. User

###Controllers

Controllers controlling the object models.

1. ClubController
2. EventController
3. ShiftController
4. UserController

###Data

Database tables

1. clubs
2. events
3. shifts
4. users
5. club_event
6. club_user
6. event_shift
6. shift_user

Data Relation Structure

|                |                |                |
| :------------: | :------------: | :------------  |
|      Club      |        ←       | User(Exec, Member)|
|       ↑        |        -       |         -      |
|      Event     |        -       |         -      |
|       ↑        |        -       |         -      |
|      Shift     |        ←       | User(Volunteer)|
