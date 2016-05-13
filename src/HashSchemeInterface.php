<?php
/**
 * Simple Authentication Library
 *
 * @author Alec Carpenter <alecgunnar@gmail.com>
 */

namespace AlecGunnar\SimpleAuth;

interface HashSchemeInterface {
    /**
     * Verify a supplied hash and password are a match
     *
     * @param string $hash
     * @param string $password
     * @return boolean
     */
    public function verifyPassword (string $hash, string $password): bool;

    /**
     * Generate a hash from a password
     *
     * @param string $password
     * @return string
     */
    public function generateHash (string $password): string;
}
