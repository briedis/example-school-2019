<?php

class UserModel
{
    public $id;

    public $name;

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}