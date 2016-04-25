# Stunning Octo Invention

![Screenshot of project](/screenshot.png?raw=true "What it should look like!")

[![Build Status](https://travis-ci.org/dtisgodsson/stunning-octo-invention.svg?branch=master)](https://travis-ci.org/dtisgodsson/stunning-octo-invention)

## Installation Guide

This project ships with a `Vagrantfile`, which, in conjunction with Vagrant & VirtualBox, allows Developers to launch a configured VirtualMachine.

With Vagrant & VirtualBox downloaded and installed, navigate to the root of the project and run;

`vagrant up`

This might take some time, but when it's done, all dependencies should be installed and the project should be ready to run. Simply navigate to the following URL to see the project:

`http://192.168.33.19`

## Running Tests

To run the unit tests, SSH into the vagrant box via the root of the project:

`vagrant ssh`

Then navigate to the vagrant folder once inside the Virtual Machine:

`cd /vagrant`

Then run:

`vendor/bin/phpunit`

## Technology Used

### Vagrant

A bash provisioned, Vagrant box for easily setting up the project. To use the Vagrant box, navigate to the root of the project and run:

`vagrant up`

This will launch a Virtual Machine, running Ubuntu and containing the following:

* LAMP Stack
* Composer
* NodeJS & NPM

### Composer

PHP package manager to provide access to the following third party libraries:

* PHP DI for dependency injection
* phpUnit for unit testing
* Mockery for mocking objects
* Twig as a templating engine

### phpUnit

phpUnit is used for Unit Testing in this project.

#### Mockery

Mockery is used in conjunction with phpUnit to create Mock objects to focus on testing one class in isolation.

### Travis CI

Travis CI was used as a Continious Integration platform, alerting me if any commits broke my build and providing confidence when dealing with merge requests.

### Gulp

Task runner providing the following functionality:

* Coffeescript Linting
* Compiling Coffeescript to Javascript with Sourcemaps
* Compiling SASS to CSS
* CSS minification & concatenation
* JS uglifying & concatentation
* Live Reload

### Bower

Front-end package manager, provides:

* jQuery
* Materialize
* Angular JS & Angular Route
* Notie

#### Bower Installer

Extract only the required files from `bower_components` - leaving fluff like tests, documentation etc. behind.
