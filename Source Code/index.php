<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_GET['create'])) {
    $members->create();
} else if (isset($_GET['add'])) {
    $members->add($_POST);
} else if (!empty($_GET['update'])) {
    $members->update($_GET['update']);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $members->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $members->edit($id, $_POST);
} else {
    $members->index();
}
?>
