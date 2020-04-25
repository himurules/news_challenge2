
# Laravel Demo Twitter API
<p align="center">
A laravel based project which interacts with twitter api to search for tweets based on keywords. 
</p>
<p align="center">
    <a href="https://twitterapi.himanshukotnala.com" target="_blank">
        Click here to see a working prototype of the application
    </a>
</p>

## Dependencies

Following dependencies for the project 

- **[PHP ^7.2.5](https://www.php.net/releases/7_2_5.php)**
- **[Node.js and npm](https://www.npmjs.com/get-npm)**
- **[Composer](https://getcomposer.org/download/)**
- **[Twitter App](https://developer.twitter.com/en/apps)**

## Installation

Checkout the [repository](https://github.com/himurules/news_challenge2.git) in the desired root folder.

Run ***composer install*** to install required libraries.

Run ***npm install*** to install required javascript/css libraries.

Create .env file ***cp .env.example .env***

Generate the project key with the following command

***php artisan key:generate***

## Configurations

In the .env file in the root directory, specify the following

- Database Connection Configuration
    - DB_CONNECTION=mysql
    - DB_HOST=(db_host)
    - DB_PORT=3306
    - DB_DATABASE=(database name)
    - DB_USERNAME=(username)
    - DB_PASSWORD=(password)
    
- Twitter App Configuration
    - TWITTER_CONSUMER_KEY=your_consumer_key
    - TWITTER_CONSUMER_SECRET=your_consumer_secret
    - TWITTER_ACCESS_TOKEN=your_access_token
    - TWITTER_ACCESS_TOKEN_SECRET=your_access_token_secret
    - TWITTER_KEYWORDS="Kidspot OR @KidspotSocial OR #kidspot"
    
## Database Migration

Run the following command to set up database tables

***php artisan migrate*** 

## Generate JS/CSS files

Run the following command to generate the js/css files

***npm run dev***

## Project summary

The project has 2 modules

The first module in the homepage searches the tweets from the twitter API based on the query. The results are paginated with 100 records per page.This module does't require any database.
- Search could be AND or OR based depending on the delimiter eg. (this OR that would search for both words in tweets this as well as that) while (this , that) will search for tweets having both words this and that.
- This module uses the library  [thujohn/twitter](https://github.com/atymic/twitter) which is a wrapper for twitter API.

The second module is an interface to Twitter Streaming API **Path(/realtime)**. 
- It connects to and consume the Twitter stream via the Streaming API.
- This module used the library [fennb/phirehose](https://github.com/fennb/phirehose)
- It processed the tweets at real time and stores them in the database.
- Please execute the following command to establish the connect and monitor twitter stream for keywords(kidspot, #kidspot, @kidspotsocial)
- The keywords to monitor can be changed in the .env with variable TWITTER_KEYWORDS

***php artisan connect_to_streaming_api > /dev/null 2>&1 &***

Before running the project make sure the storage folder (/storage) have the read/write permission set for the webserver user

To run the project locally use the following command

***php artisan serve*** and browse to http://127.0.0.1:8000
