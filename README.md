# Diplodocus

Diplodocus is a simple framework for implementing MVC model and setting up simply.
You edit road and create a class for handle it and render the associated page.

## Setup
The main repos use Docker with Docker Compose for instantiate a simple webserver.
It's and Apache WebServer who listen on port 8080 and parse **PHP 7** (This can be change in the `Docker-Compose.yml`).
We got an Mysql server too. Password and data can be change in the `Docker-Compose.yml` file.
_For build the server:_
 > $> docker-compose up -d

_After build, you can start and stop the server :_
 > $> docker-compose start
 > $> docker-compose stop

_ProTip:_ Adding an alias in your bashrc or zshrc (or other) can be usefull. mine is: `alias dc="docker-compose"`

Don't forget to go to `localhost:9999` login and add a base with the right name (Default: `base`)


## Documentation
Generating the documentation is easy. You must have [Doxygen](http://doxygen.org/) installed.
After installing, enter this command:
> $> cd ./src ; doxygen .doxygen

Now you can see it at: [http://localhost:8080/doc](http://localhost:8080/doc)

## Library
We use somes libraries tha is usefull for some case, the list is here:

| Library | Link to github | Licence | Purpose |
| ------- | -------------- | ------- | ------- |
| html-validator | [https://github.com/zrrrzzt/html-validator](https://github.com/zrrrzzt/html-validator) | MIT | Check W3C valid html generated |
| node-sass | [https://github.com/sass/node-sass](https://github.com/sass/node-sass) | MIT | Compile scss to css |
| FontAwesome | [https://github.com/FortAwesome/Font-Awesome](https://github.com/FortAwesome/Font-Awesome) | Unlicensed | Add icon from font |
