<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        $query = "SELECT * FROM members WHERE id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_membership = $data['id_membership'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`, `id_membership`) VALUES ('$name', '$email', '$phone', '$id_membership')";

        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];
        $id_membership = $data['id_membership'];
        
        $query = "update members set name='$name', email='$email', phone='$phone', id_membership='$id_membership' where id='$id'";

        return $this->execute($query);
    }
}
