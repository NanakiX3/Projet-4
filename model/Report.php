<?php

class Report{
    private $connect;
    protected $comment;
    protected $user;
    protected $message;
    protected $reportingDate;

    public function __construct()
    {
        $db = BddConnect::getInstance();
        $this->connect = $db->getDbh();
    }


    public function getComment(){
        return $this->comment;
    }

    public function setComment($comment){    
        $this->comment = $comment;
        return $this;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
        return $this;
    }

    public function getReportingDate(){
        return $this->reportingDate;
    }

    public function setReportingDate($reportingDate){
        $this->reportingDate = $reportingDate;
        return $this;
    }

   
}