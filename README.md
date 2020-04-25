
# Laravel Twitter API
<p align="center">
A laravel based project which interacts with twitter api to search for tweets based on keywords. 
</p>
<p align="center">
    <a href="https://twitterapi.himanshukotnala.com">
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

    
    
         
