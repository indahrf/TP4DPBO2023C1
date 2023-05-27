<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Membership.controller.php");

$membership = new MembershipController();

if (isset($_GET['create'])) {
    $membership->create();
} else if (isset($_GET['add'])) {
    $membership->add($_POST);
} else if (!empty($_GET['update'])) {
    $membership->update($_GET['update']);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $membership->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $membership->edit($id, $_POST);
} else {
    $membership->index();
}
?>
