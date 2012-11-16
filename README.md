studioBooking
=============

A PHP/MySQL based studio(/room) booking system

Simple web based system for booking out a number of rooms to non-authenticated users.  
Originally built for [URN](http://urn1350.net "University Radio Nottingham") to allow presenters/producers to book radio studios  

---
**Index.php** is the landing page with HTML forms
**Ajax.php** is the backend database access script
Styles are stored in **Booking.css** with Javascript (based on JQuery) in **Booking.js**

---
If the system is to be run on a server without internet access then the jQuery library will need to be downloaded locally and rereferenced in index.php
Uses the PDO (PHP Data Object) so should be simple enough to port to other database systems.