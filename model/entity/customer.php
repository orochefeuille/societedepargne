<?php

class Customer {
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $pass;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = "set" . ucFirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId() :int {
        return $this->id;
    }

    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function getFirstname() :string {
        return $this->firstname;
    }

    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function getLastname() :string {
        return $this->lastname;
    }

    public function setEmail(string $email) {
        $this->email = $email;
        return $this;
    }

    public function getEmail() :string {
        return $this->email;
    }

    public function setPass(string $pass) {
        $this->pass = $pass;
        return $this;
    }

    public function getPass() :string {
        return $this->pass;
    }
}
