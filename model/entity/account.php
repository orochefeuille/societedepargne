<?php
class Account {
    protected $id;
    protected $label;
    protected $iban;
    protected $date_creation;
    protected $balance;
    protected $customer_id;

    public function __construct(array $data = null)
    {
        if($data) {
            $this->hydrate($data);
        }
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

    public function setLabel(string $label) {
        $this->label = $label;
        return $this;
    }

    public function getLabel() :string {
        return $this->label;
    }

    public function setIban(string $iban) {
        $this->iban = $iban;
        return $this;
    }

    public function getIban() :string {
        return $this->iban;
    }

    public function setDate_creation(string $date_creation) {
        $this->date_creation = $date_creation;
        return $this;
    }

    public function getDate_creation() :string {
        return $this->date_creation;
    }

    public function setBalance(string $balance) {
        $this->balance = $balance;
        return $this;
    }

    public function getBalance() :string {
        return $this->balance;
    }

    public function setCustomer_id(string $customer_id) {
        $this->customer_id = $customer_id;
        return $this;
    }

    public function getCustomer_id() :string {
        return $this->customer_id;
    }
}