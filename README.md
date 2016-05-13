# Simple Authentication

A simple library to provide only the most basic authentication capabilities to your application.

## Usage

Let us examine a sample scenario where we have a model called `User`, and we need to check a password against an object of this model.

```php
<?php

use AlecGunnar\SimpleAuth\AuthenticatableInterface;
use AlecGunnar\SimpleAuth\HashScheme\BcryptHashScheme;
use AlecGunnar\SimpleAuth\Authenticator;

class User implements AuthenticatableInterface {
    private $hash;    

    public function setPasswordHash ($passwdHash) {
        $this->hash = $passwdHash;
    }

    public function getPasswordHash () {
        return $hash;
    }
}

$password = 'superSecret123';

$hashScheme = new BcryptHashScheme();
$hashedPassword = $hashScheme->generateHash($password);

$user = new User();
$user->setPasswordHash($hashedPassword);

$auth = new Authenticator($hashScheme);

if ($auth->authenticate($user, $password)) {
    echo "It is a valid password!";
} else {
    echo "Not a valid password...";
}
```

What is important to notice here is, that the model implements the `AuthenticatableInterface`. This interface specifies the `getPasswordHash` method, which is used by the `authenticate` method of the `Authenticator` class to get the hash from the model. The `Authenticator` class takes as its only argument, an instance of the `HashSchemeInterface`. The the above example we used the `BcryptHashScheme` to demonstrate.
