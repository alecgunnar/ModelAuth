<?php
/**
 * Simple Authentication Library
 *
 * @author Alec Carpenter <alecgunnar@gmail.com>
 */

namespace AlecGunnar\SimpleAuth\HashScheme;

use AlecGunnar\SimpleAuth\HashSchemeInterface;

class BcryptHashScheme implements HashSchemeInterface {
    /**
     * @inheritDoc
     */
    public function verifyPassword (string $hash, string $password) {
        return password_verify($password, $hash);
    }

    /**
     * @inheritDoc
     */
    public function generateHash (string $password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
