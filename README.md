## Intro


Note: Swagger documentation would be a good addition for production

## Requirements
Docker

## Installation
``````
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
``````    

from this directory
1. `./vendor/bin/sail up -d`
2. `cp .env.example .env`
3. `sail artisan key:generate`


## Usage
Interact with the api at http://localhost

| Operation             | Url             | Method | Parameter |
|-----------------------|-----------------|--------|-----------|
| Kanye Quotes          | /api/quotes     | GET    | url       |
| Shakespeare Quotes    | /api/quotes?s=1 | GET    | url       |

## Response Format
JSON

## Testing
