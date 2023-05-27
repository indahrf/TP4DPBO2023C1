<?php
include_once("conf.php");
include_once("models/Membership.class.php");
include_once("views/Membership.view.php");

class MembershipController {
  private $membership;

  function __construct(){
    $this->membership = new Membership(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->membership->open();
    $this->membership->getMembership();

    $data = array();
    while($row = $this->membership->getResult()){
      array_push($data, $row);
    }
    $this->membership->close();

    $view = new MembershipView();
    $view->render($data);
  }

  
  function add($data){
    $this->membership->open();
    $this->membership->add($data);
    $this->membership->close();
    
    header("location:membership.php");
  }

  function edit($id, $data){
    $this->membership->open();
    $this->membership->edit($id, $data);
    $this->membership->close();
    
    header("location:membership.php");
  }

  function delete($id){
    $this->membership->open();
    $this->membership->delete($id);
    $this->membership->close();
    
    header("location:membership.php");
  }

  function create()
  {
    $view = new MembershipView();
    $view->createMembership();
  }

  function update($id)
  {
    $this->membership->open();
    $this->membership->getMembership();

    $data = array();
    while($row = $this->membership->getResult()){
      array_push($data, $row);
    }

    $this->membership->close();

    $view = new MembershipView();
    $view->editMember($id, $data);
  }

}