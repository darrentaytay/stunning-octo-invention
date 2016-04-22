# Stunning Octo Invention

## Technology Used

### Vagrant

A bash provisioned, Vagrant box for easily setting up the project. To use the Vagrant box, navigate to the root of the project and run:

`vagrant up`

This will launch a Virtual Machine, running Ubuntu and containing the following:

* LAMP Stack
* Composer
* NodeJS & NPM

### Composer

PHP package manager to provide access to some third party libraries such as:

* PHP DI for dependency injection
* phpUnit for unit testing
* Mockery for mocking objects

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