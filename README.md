# Livewire Admin Panel

## Requirements

To run the project, you must install <a href="https://getcomposer.org/">Composer</a> on your computer and meet the following conditions.

- Laravel >= 8.x
- PHP >= 7.4

## Download with zip file

- Download the zip file of the project to your computer with the green code button.
- Extract the file from the zip.

## Download with git


If git is not installed on your computer, install the appropriate one for your operating system from this <a href="https://git-scm.com/downloads">link</a>

- Open the terminal screen and paste the code below and run it.

  ```
  git clone https://github.com/hsdmr/livewire-admin.git
  ```
## Installation

- Rename the file named .env.example in the project file to .env .
- Save your database information in the appropriate place in the .env file.
- Enter the project file from the terminal and paste the following codes respectively.

  ```
  composer install
  php artisan key:generate
  php artisan storage:link
  php artisan migrate:fresh
  php artisan db:seed
  php artisan livewire:discover
  php artisan livewire:publish
  php artisan optimize
  php artisan serve
  ```

- You can access the project from 'localhost:8000' .

## Reminders

If folder permission errors occur while deploying the project to the server, you can try the following codes.

  ```
  php artisan vendor:publish --tag=livewire:config
  php artisan livewire:discover
  chmod -R gu+w storage
  chmod -R guo+w storage
  php artisan cache:clear
  ```

