<?php
/**
 * Simple Authentication Library
 *
 * @author Alec Carpenter <alecgunnar@gmail.com>
 */

namespace AlecGunnar\ModelAuth;

interface AuthenticatableInterface {
    /**
     * Retreive the hash
     *
     * @return string
     */
    public function getPasswordHash (): string;
}
