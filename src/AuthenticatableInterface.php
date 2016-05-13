<?php
/**
 * Simple Authentication Library
 *
 * @author Alec Carpenter <alecgunnar@gmail.com>
 */

namespace AlecGunnar\SimpleAuth;

interface AuthenticatableInterface {
    /**
     * Retreive the hash
     *
     * @return string
     */
    public function getPasswordHash (): string;
}
