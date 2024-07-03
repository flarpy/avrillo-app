## Intro


Note: Swagger documentation would be a good addition for production

## Installation
from this directory
1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`

### Run
1. `php artisan serve`


## Usage
Interact with the api at http://localhost

| Operation             | Url             | Method | Parameter |
|-----------------------|-----------------|--------|-----------|
| Kanye Quotes          | /api/quotes     | GET    | url       |
| Shakespeare Quotes    | /api/quotes?s=1 | GET    | url       |

## Response Format
JSON

## Testing
