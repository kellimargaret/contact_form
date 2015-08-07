<?php
class Contact
{
    private $name;
    private $phonenumber;
    private $address;

    function __construct($name, $phonenumber, $address)
    {
        $this->name = $name;
        $this->phonenumber = $phonenumber;
        $this->address = $address;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function setPhoneNumber($new_phonenumber)
    {
        $this->phonenumber = (string) $new_phonenumber;
    }

    function getPhoneNumber()
    {
        return $this->phonenumber;
    }

    function setAddress($new_address)
    {
        $this->address = (string) $new_address;
    }

    function getAddress()
    {
        return $this->address;
    }

    function save()
    {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_contacts'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_contacts'] = array();
    }
}
?>
