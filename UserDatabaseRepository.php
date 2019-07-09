<?php

class UserDatabaseRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getUser(int $userId)
    {
        // TODO implement

        return null;
    }

    /**
     * @inheritDoc
     */
    public function saveUser(string $name)
    {
        // TODO implement

        return 0;
    }

    /**
     * @inheritDoc
     */
    public function getUsers()
    {
        // TODO implement

        return [];
    }

    /**
     * @inheritDoc
     */
    public function isNameTake(string $name): bool
    {
        // TODO Implement
        return false;
    }
}