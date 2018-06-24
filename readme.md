# rF2 dashboard

This is a dashboard to show semi-realtime telemetry from rFactor 2

## Getting Started

If you want to set up the dashboard yourself, you can follow the instructions below to setup a local installation of the dashboard.

### Prerequisites

There aren't any prerequisites as for now. It uses harvested _fake_ data instead of a realtime API. Once the functionality is ready, you'll need to install [SimHub Dashboard](https://www.racedepartment.com/downloads/simhub-diy-sim-racing-dash.10252/) so that we can use their API.

### Installing

A step by step series of examples that tell you how to get a development env running

#### Setup project

Clone the project into your projects folder. I, for instance, will use `~/Projects`.

```
git clone git@github.com:PieterxJan/rf2-dashboard.git ~/Projects/rf2dashboard
```

Once the code is downloaded, run composer install.

```
cd ~/Projects/rf2dashboard && composer install
```

Copy the `.env.example` to `.env` and fill in the database credentials

```
cp .env.example .env
```

Generate the application key

```
php artisan key:generate
```

Run the migrate command to install the database structure

```
php artisan migrate
```

If you now run a local server, it should be accessible. Run the command and navigate to http://127.0.0.1:8000/.

```
php artisan serve
```

#### Pusher

Create a Pusher application and paste in the credentials in the .env file

```
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
```

Also make sure to change `BROADCAST_DRIVER` to *pusher*

```
BROADCAST_DRIVER=pusher
```

#### Passport

Now we need to install and enable Laravel Passport to be able to use the API

```
php artisan passport:install
```

Before we create a token, we need to register a new user to link it with. Therefore, navigate to */register* and create the user.

When we have created the user, we need to generate an API token. I'll use tinker for this.

```
php artisan tinker
```

Load the user and create a token.

```
App\User::find(1)->createToken('API');
```

This should do the trick. If you now push *Start fetching*, the data from the API should start projecting on the dashboard.



### Build it yourself

It's possible to alter the dashboard. If you take a look at `resources/views/dashboard.blade.php`, you'll see that there is a reusable Vue component `rf2`. This components has three props:

* **color**: You can pass the color the background of the tile should have. It is based on the colors array in the `tailwind.js` file.
* **position**: This is the `grid-area` property of the block. It's a CSS Grid property and it will be placed in a 5 by 5 grid.
* **property**: The property that will be shown in the block. You can find all the available options in one of the files in the `storage/app/fake` directory. Nested elements can be joined with dots (ie `NewData.BestLapOpponent.CarName`)

## Todo's

- [ ] Get rid of the _fake_ data API
- [ ] Read realtime data from the game, instead of using 3rd party

## Deployment

By using Pusher, this can be deployed on a live server, but it still needs a local setup as well to be able to fetch the data from the local API.

## Built With

* [SimHub Dashboard](https://www.racedepartment.com/downloads/simhub-diy-sim-racing-dash.10252/) - Needed as an api
* [Laravel](https://laravel.com/) - The framework used
* [Tailwind CSS](https://tailwindcss.com/) - The front end framework used
* [Vue.js](https://vuejs.org/) - The used javascript framework
* [Pusher](https://pusher.com/) - Realtime event broadcasting

## Authors

* **Pieter-Jan Claeysens** - [@PieterxJan](https://twitter.com/PieterxJan)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
