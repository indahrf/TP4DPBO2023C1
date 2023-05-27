<?php

class Membership extends DB
{
    function getMembership()
    {
        $query = "SELECT * FROM membership";
        return $this->execute($query);
    }

    function getMembershipById($id)
    {
        $query = "SELECT * FROM membership WHERE id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        $query = " INSERT INTO `membership`(`name`) VALUES ('$name')";

        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM membership WHERE id = '$id'";

        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $name = $data["name"];
        
        $query = "update membership set name='$name' where id='$id'";

        return $this->execute($query);
    }
}
