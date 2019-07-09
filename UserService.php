<?php

class UserService
{
    /** @var UserRepositoryInterface */
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @return UserModel|bool|null
     */
    public function register(string $name)
    {
        if(!$name){
            return false;
        }

        if($this->repository->isNameTake($name)){
            return false;
        }

        $userId = $this->repository->saveUser($name);

        return $this->repository->getUser($userId);
    }
}