<?php
/**
 * Simple Authentication Library
 *
 * @author Alec Carpenter <alecgunnar@gmail.com>
 */

namespace AlecGunnar\SimpleAuth;

class Authenticator {
    /**
     * @var HashSchemeInterface
     */
    private $hashScheme;

    /**
     * @param HashSchemeInterface $hashScheme Provides the encrypt/decrypt functionality
     */
    public function __construct (HashSchemeInterface $scheme) {
        $this->hashScheme = $scheme;
    }

    /**
     * Attempt to authenticate with a password
     *
     * @param AuthenticatableInterface $entity What were are attempting to authenticate
     * @param string $password How we will authenticate the entity (assuming its correct)
     * @return boolean True if password matches, false otherwise
     */
    public function authenticate (AuthenticatableInterface $entity, string $password): bool {
        return $this->hashScheme->verifyPassword($entity->getPasswordHash(), $password);
    }
}
