
## Requirements
Docker

## Installation
``git clone git@github.com:flarpy/avrillo-app.git``

``cd avrillo-app``

``````
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
``````    

from this directory
1. `cp .env.example .env`
2. `./vendor/bin/sail up -d`
3. `sail artisan key:generate`


## Usage
Interact with the api at http://localhost

All requests must include a header named API_TOKEN containing a valid api token. A hard coded token "KANYE_API_TOKEN" is included in the .env file for ease of setup & usage.

| Operation            | Url                 | Method |
|----------------------|---------------------|--------|
| Kanye Quotes         | /api/quotes         | GET    |
| Kanye Quotes Refresh | /api/quotes/refresh | GET    |
| Shakespeare Quotes   | /api/quotes?s=1     | GET    |

## Response Format
JSON

## Testing
``sail artisan test``

## Notes
The Shakespeare option is added just to show value of the QuoteManager class

Guzzle client exceptions cause an abort, might be better handled with api specific error messages

The endpoint for refresh does exactly the same as the quotes endpoint so is actually redundant, just added as the exercise asked for it. 
If not showing duplicates when refreshing (not implemented) then this would make sense.

API tokens would normally be generated per user, probably with limited time duration. A hard coded token "KANYE_API_TOKEN" is included in the .env file for ease of setup & usage.

Swagger documentation for the api would be a good addition
