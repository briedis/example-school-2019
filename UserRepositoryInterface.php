<?php

interface UserRepositoryInterface
{
    /**
     * @param int $userId
     * @return UserModel|null
     */
    public function getUser(int $userId);

    /**
     * @param string $name
     * @return int User Id
     */
    public function saveUser(string $name);

    /**
     * Get list of all users
     *
     * @return UserModel[]
     */
    public function getUsers();

    /**
     * Check if username is taken
     *
     * @param string $name
     * @return bool
     */
    public function isNameTake(string $name): bool;
}