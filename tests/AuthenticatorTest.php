<?php

use AlecGunnar\SimpleAuth\Authenticator;
use AlecGunnar\SimpleAuth\HashScheme\BcryptHashScheme;
use AlecGunnar\SimpleAuth\AuthenticatableInterface;
use AlecGunnar\SimpleAuth\HashSchemeInterface;

class TestAuthenticatable implements AuthenticatableInterface {
    public function getPasswordHash () { }
}

class TestHashScheme implements HashSchemeInterface {
    public function verifyPassword (string $hash, string $password) { }
    public function generateHash (string $password) { }
}

class AuthenticatorTest extends PHPUnit_Framework_TestCase {
    public function testConstructorSetsHashScheme () {
        $hash = new BcryptHashScheme();
        $auth = new Authenticator($hash);

        $this->assertAttributeEquals($hash, 'hashScheme', $auth);
    }

    public function testAuthenticateReturnsTrueWhenPasswordIsValid () {
        $plainPassword  = 'plainPassword';
        $hashedPassword = 'hashedPassword';

        $hash = $this->getMockBuilder('TestHashScheme')->getMock();

        $hash->expects($this->once())
            ->method('verifyPassword')
            ->with($hashedPassword, $plainPassword)
            ->will($this->returnValue(true));

        $auth = new Authenticator($hash);

        $user = $this->getMockBuilder('TestAuthenticatable')->getMock();

        $user->expects($this->once())
            ->method('getPasswordHash')
            ->will($this->returnValue($hashedPassword));

        $this->assertTrue($auth->authenticate($user, $plainPassword));
    }

    public function testAuthenticateReturnsFalseWhenPasswordIsValid () {
        $plainPassword  = 'invalidPlainPassword';
        $hashedPassword = 'hashedPassword';

        $hash = $this->getMockBuilder('TestHashScheme')->getMock();

        $hash->expects($this->once())
            ->method('verifyPassword')
            ->with($hashedPassword, $plainPassword)
            ->will($this->returnValue(false));

        $auth = new Authenticator($hash);

        $user = $this->getMockBuilder('TestAuthenticatable')->getMock();

        $user->expects($this->once())
            ->method('getPasswordHash')
            ->will($this->returnValue($hashedPassword));

        $this->assertFalse($auth->authenticate($user, $plainPassword));
    }
}
