# WDI Paste Contributing Guide

Hi! I’m really excited that you are interested in contributing to this project. Before submitting your contribution though, please make sure to take a moment and read through the following guidelines.

- [Code of Conduct](https://github.com/WebDeveloperItaliani/paste/blob/master/.github/CODE_OF_CONDUCT.md)
- [Issue Reporting Guidelines](#issue-reporting-guidelines)
- [How to install](#how-to-install)
- [Configure Development Environment](#configure-development-environment)

## Issue Reporting Guidelines

- Always use [Issue Template](https://github.com/WebDeveloperItaliani/paste/blob/master/.github/ISSUE_TEMPLATE.md) to create new issues.

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
