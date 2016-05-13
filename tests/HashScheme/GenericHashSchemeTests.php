<?php

abstract class GenericHashSchemeTests extends PHPUnit_Framework_TestCase {
    public function testVerifyPasswordReturnsTrueWhenPasswordIsValid () {
        $hashScheme = $this->getHashSchemeInstance();
        $password = 'testPassword';
        $hash = $hashScheme->generateHash($password);

        $this->assertTrue($hashScheme->verifyPassword($hash, $password));
    }

    public function testVerifyPasswordReturnsFalseWhenPasswordIsInvalid () {
        $hashScheme = $this->getHashSchemeInstance();
        $password = 'testPassword';
        $badPassword = 'wrongPassword';
        $hash = $hashScheme->generateHash($password);

        $this->assertFalse($hashScheme->verifyPassword($hash, $badPassword));
    }

    abstract function getHashSchemeInstance ();
}
