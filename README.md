# Workshop Introduction to Docker"
Preparation and instruction by Jan Pieter Kunst (Digital Humanities Cluster, Digital Infrastructure department)
May 16, 2024

This repository contains instructions and code to learn Docker.
Each folder is dedicated to a theme. This is the content in each folder:

- 00 --> what is Docker, how Docker works, and main commands
- 01 --> docker compose, which replaces all the set up given in the commands when using 'docker run ....'. It also allows to define and manage multi-container applications in a single YAML file. The file has to be named "docker-compose.yml". Run in folder 01:
  - `docker compose up`
  - this example downloads and runs the image of a the Apache HTTP Server ("httpd"), it should give "it works" on the local host (the port is given in the docker compose file)
- 02 --> build a docker file + use docker compose
- 03 --> an example setup that allows you to develop and test a web application locally with a customized Apache server configuration.
- 04 --> sets up a PHP-enabled Apache HTTP server container using the php:8.1-apache image. It serves PHP and HTML files from the ./html directory on the host.
- 05 --> using a database inside a docker container
- 06 --> shows how to use Docker with PHP applications that interact with MySQL databases using PDO (PHP Data Objects) interface
- 07 --> shows how to set up a multi-container environment with three services
- 08 --> example with a local and a live set up 