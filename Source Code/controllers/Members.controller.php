<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Membership.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $membership;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->membership = new Membership(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->getMembers();

    $this->membership->open();
    $this->membership->getMembership();

    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $data2 = array();
    while($row = $this->membership->getResult()){
      array_push($data2, $row);
    }

    $this->members->close();
    $this->membership->close();

    $view = new MembersView();
    $view->render($data, $data2);
  }

  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id, $data){
    $this->members->open();
    $this->members->edit($id, $data);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }

  function create()
  {
    $this->membership->open();
    $this->membership->getMembership();

    $dataMembership = array();
    while($row = $this->membership->getResult()){
      array_push($dataMembership, $row);
    }

    $this->membership->close();

    $view = new MembersView();
    $view->createMember($dataMembership);
  }

  function update($id)
  {
    $this->members->open();
    $this->members->getMembers();

    $this->membership->open();
    $this->membership->getMembership();

    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $data2 = array();
    while($row = $this->membership->getResult()){
      array_push($data2, $row);
    }

    $this->members->close();
    $this->membership->close();

    $view = new MembersView();
    $view->editMember($id, $data, $data2);
  }

}