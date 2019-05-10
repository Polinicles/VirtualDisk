# VirtualDisk

## Quick guide

### Requirements

* docker https://www.docker.com/
* docker-compose https://docs.docker.com/compose/

### Get started

Clone the project: 

```sh
$ git clone git@github.com:Polinicles/VirtualDisk.git
$ cd VirtualDisk
```

### Docker

Start the project

```sh
$ docker-compose up -d
```

Install dependencies

```sh
$ docker-compose exec php composer install
```

## Approach

Our approach will be creating a fake system and storing the disk in the PHP `$_SESSION` instead of using a physical disk or data stored in the database. 

### Architecture

We'll create a similar structure than Laravel / Symfony in order to keep our files organized following the **MVC** concept.

### Plugins used

The [phroute](https://github.com/mrjgreen/phroute) has been implemented to help with the routing and also the View class from __David Farrell__ to simulate the views (MVC).

### Creating the Fake Disk

There's a `src/Factory/FakeDisk.php` class used a disk factory to define the basic structure. Feel free to add or change any file and folder.

The disk is created once we start the session but could be created in the `GetDirectoryService.php` as one of the class attributes.

### Directory finder

Through every **GET** request we make to the server, the selected folder will be defined.

Then, this is found by a recursive algorithm created in the service `GetDirectoryService.php` that will look into every folder to find the one that matches with the chosen. 


## Testing

We can run and test our application by using a PHP server:

```
php -S localhost:8080 -t public
```

## Other 

The table could also be updated by **AJAX** calls instead of using just PHP. In that case, after every call to the server, the table would remove the current list and update it with the new one provided by the server.

Feel free to add / edit. Happy coding!
