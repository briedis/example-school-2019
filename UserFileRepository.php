<?php

class UserFileRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getUser(int $userId)
    {
        $users = $this->getUsers();

        foreach ($users as $user) {
            if ($user->id == $userId) {
                return $user;
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function saveUser(string $name)
    {
        $pathname = $this->getPathname();

        $users = $this->getUsers();

        $userId = count($users) + 1;

        $newUser = new UserModel;
        $newUser->id = $userId;
        $newUser->name = $name;

        $users[] = $newUser;

        $userArray = [];
        foreach ($users as $user) {
            $userArray[] = $user->toArray();
        }

        $json = json_encode($userArray, JSON_PRETTY_PRINT);
        file_put_contents($pathname, $json);

        return $userId;
    }

    /**
     * @inheritDoc
     */
    public function getUsers()
    {
        $users = [];

        $pathname = $this->getPathname();

        // Load existing users
        if (is_file($pathname)) {
            $json = file_get_contents($pathname);
            $rawUsers = json_decode($json, true);

            foreach ($rawUsers as $rawUser) {
                $user = new UserModel;
                $user->id = $rawUser['id'];
                $user->name = $rawUser['name'];
                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * @inheritDoc
     */
    private function getPathname()
    {
        return __DIR__ . '/users.json';
    }

    /**
     * @inheritDoc
     */
    public function isNameTake(string $name): bool
    {
        $users = $this->getUsers();

        foreach ($users as $user) {
            if ($user->name === $name) {
                return true;
            }
        }

        return false;
    }
}