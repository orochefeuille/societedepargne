<?php
class Operation {
    protected $id;
    protected $amount;
    protected $is_credit;
    protected $date_transaction;
    protected $comments;
    protected $account_id;

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

    public function setAmount(string $amount) {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount() :string {
        return $this->amount;
    }

    public function setIs_credit(string $is_credit) {
        $this->is_credit = $is_credit;
        return $this;
    }

    public function getIs_credit() :string {
        return $this->is_credit;
    }

    public function setDate_transaction(string $date_transaction) {
        $this->date_transaction = $date_transaction;
        return $this;
    }

    public function getDate_transaction() :string {
        return $this->date_transaction;
    }

    public function setComments(string $comments) {
        $this->comments = $comments;
        return $this;
    }

    public function getComments() :string {
        return $this->comments;
    }

    public function setAccount_id(string $account_id) {
        $this->account_id = $account_id;
        return $this;
    }

    public function getAccount_id() :string {
        return $this->account_id;
    }
}