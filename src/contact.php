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
