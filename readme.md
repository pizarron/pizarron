Pizarron
========

## New technologies

Pizarron will be the recreation of whiteboard, as you may know, whiteboard was made using Microsoft's technologies.

For now, we pretend to create this software with open technologies, such as PHP with Laravel Framework, NodeJS with socket.io, and so on.

## Features

The main features we pretend to do are:

* Creation of organization and courses
* Live streaming of classes via our "pizarron", audio live streaming and chat
* Creation of "homework" or quizes
* Social networks integration

## Requirements

* NodeJS - npm
* Grunt, grunt-cli
* Sass

## Building frontend

For css and js stuff, Pizarron uses sass and nodejs for the asset's building process.

All this development must be done at frontend directory when compiled it will generate necessary files at public/assets directory


#### Install nodejs dependencies (once)
```
$ npm install
```
####

#### Watch changes and generate concatenated files with grunt
```
$ grunt
```
####

The first command will install nodejs dependencies.
The second command will basically compile all scss files with sass and concatenate them into main.css, all vendor files such as bootstrap.min.css must be added to 'cssmin' task in Gruntfile.js in the section './public/assets/css/vendors.css' so it will create two files: main.css and vendors.css the first one will contain only designer's stylesheets

All changes done to js files and scss files will create again those files as grunt is "watching" changes on these files
