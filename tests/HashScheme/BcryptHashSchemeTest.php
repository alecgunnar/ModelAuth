<?php

use AlecGunnar\SimpleAuth\HashScheme\BcryptHashScheme;

require_once __DIR__ . '/GenericHashSchemeTests.php';

class BcryptHashSchemeTest extends GenericHashSchemeTests {
    public function getHashSchemeInstance () {
        return new BcryptHashScheme();
    }
}
