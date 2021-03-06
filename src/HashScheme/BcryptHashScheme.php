<?php
/**
 * Simple Authentication Library
 *
 * @author Alec Carpenter <alecgunnar@gmail.com>
 */

namespace AlecGunnar\ModelAuth\HashScheme;

use AlecGunnar\ModelAuth\HashSchemeInterface;

class BcryptHashScheme implements HashSchemeInterface {
    /**
     * @inheritDoc
     */
    public function verifyPassword (string $hash, string $password): bool {
        return password_verify($password, $hash);
    }

    /**
     * @inheritDoc
     */
    public function generateHash (string $password): string {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
