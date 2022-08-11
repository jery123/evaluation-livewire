## Introduction
This is a platform to manage user's tasks

## Table of Contents

1. [Requirements](#requirements)
2. [Installation](#installation)
3. [Usage](#usage)

## Requirements
Make sure your server meets the following requirements.

-   MySQL Server, Mariadb or PostgreSQL
-   Composer installed
-   PHP Version ^8.0
-   Node v18.4.0 / NPM 8.12.1


### Tech Stack

This application is built using (Laravel 9, Livewire, AlpineJs, bootstrap).


## Installation

Install composer with the help of the instructions given [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)
 

Install Node.js/NPM with the help of the instructions given [here](https://nodejs.org/en/download/package-manager/)
However it is good to use node version manager (nvm) in order to manage and choose the correct node version.


Linux/Unix `yum install npm` OR using MacOs `brew install node`

Clone this project by running the following command
``` bash  
$ git clone https://github.com/jery123/evaluation-livewire.git 
```

Navigate into the project's directory
``` bash  
$ cd evaluation-livewire/task-managment
```

Copy .env.example for .env and modify according to your credentials
```bash
cp .env.example .env
```

Run this command to install dependencies
```bash
composer install --prefer-dist
```
This command will install all dependencies needed by the task managment platform to run successfully!

Generate application key
```bash
 php artisan key:generate
```

Install npm dependencies  (Preference is using **Yarn**)
```bash
npm install or yarn install 
```

## Database Setup

Create a database and change the default database configurations(DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD) in the env file with your own configurations.

First, we need to migrate and populate the database with dummy data. Once the migration is complete, the credentials to connect to the default account will be displayed in the console.
```bash
php artisan migrate:fresh --seed
```

## Usage

Run yarn/npm in dev mode
`npm run dev` OR `yarn run dev`
