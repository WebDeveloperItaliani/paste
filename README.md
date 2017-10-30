# WDI Paste system

[![Build Status](https://travis-ci.org/WebDeveloperItaliani/paste.svg?branch=master)](https://travis-ci.org/WebDeveloperItaliani/paste)
[![Maintainability](https://api.codeclimate.com/v1/badges/76c1a5f96f2f4c1593f9/maintainability)](https://codeclimate.com/github/WebDeveloperItaliani/paste/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/76c1a5f96f2f4c1593f9/test_coverage)](https://codeclimate.com/github/WebDeveloperItaliani/paste/test_coverage)

wdi.community paste bin, sorry no 🍝

## Demo and Usage

A live demo is coming soon, but you can start using it on your development machine, simply follow *how to install* guidelines

## How to Install

We strongly suggest you do use [Docker](https://www.docker.com/) in order to try this project with 0 effort whatsoever, if you have docker installed you can build up the necessary containers by typing `docker-compose up -d`, once done you can access into the main container by typing `docker exec -it wdi_paste bash`. Next step is configure it.

## Configure Development Environment

Once the containers are up and you have access to `wdi_paste` container it will be like a normal laravel installation with extra steps:

- Copy `.env.example` file in `.env` file
- Type `composer install -o`
- Type `php artisan key:generate`
- Type `php artisan migrate:fresh --seed`
- If you wish to try in the browser install all the necessary npm dependencies with `npm install` and compile them with `npm run dev`

Done.

## Contributing

Please refer to the [Contributing](CONTRIBUTING) document
