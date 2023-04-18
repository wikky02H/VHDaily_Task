<?php

namespace PersonAddress;
// require_once 'task/person.php';
class Address extends Person
{
    protected $street;
    protected $city;
    protected $state;

    public function __construct($name, $age, $street, $city, $state)
    {
        parent::__construct($name, $age);
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getAddress()
    {
        return $this->street . ', ' . $this->city . ', ' . $this->state;
    }
}
