# PHP Slim (v4) framework starter template

### Composer CLI:

```bash
composer update
composer dump-autoload
```

### To run unit test:

```bash
./vendor/bin/phpunit --testdox
```

### Application structure:

1. Application root file is public/index.php

2. Controllers files location is app/controllers

3. Services files location is app/services

4. Some custom error exceptions are written to app/Exceptions folder.

5. Application common helper is located at app/Helpers/common.php

6. Validations are written to app/Request/Validator folder.

7. Routes are written to app/config/routes.php file.

8. Dependency injection are handled to app/config/dependencies.php file.

9. Errors handling are handled to app/config/error_handler.php file.

10. Unit tests are written at tests folder.

Sample endpoint: http://php-slim4-starter.test/api/v1/users

Method: POST

Payload:

```json
{
	"firstName": "Jhon",
	"lastName": "Doe",
	"email": "jhon@example.com"
}
```

Response:

```json
{
	"message": "User save successfully",
	"data": {
		"id": 1,
		"first_name": "Jhon",
		"last_name": "Doe",
		"email": "jhon@example.com"
	},
	"errors": "",
	"meta": []
}
```
