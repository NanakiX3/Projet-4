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

    public function getCountReportedByComment($id){
        $req = $this->connect->prepare("SELECT COUNT(id_comment) FROM report WHERE id_comment = ".$id);
        $req->execute();
        $nbReport = $req->fetch(); 
        return $nbReport;
    }

    public function addReport(){
        try{
            $req = $this->connect->prepare("INSERT INTO report (message, reporting_date, id_user, id_comment) VALUES (:message, NOW(), :id_user, :id_comment)");
            $req->bindParam(":message", $this->message, PDO::PARAM_STR);
            $req->bindParam(":id_user", $this->user, PDO::PARAM_INT);
            $req->bindParam(":id_comment", $this->comment, PDO::PARAM_INT);
            $req->execute();
            $message = "Votre signalement a bien été effectué !";
            return $message;
        }catch(PDOException $e){
            return "Votre signalement a échoué, en voici la raison : ".$e->getMessage();
        }
    }

    public function deleteReportsByIdComment($id_comment){
        try{
            $req = $this->connect->prepare("DELETE FROM report WHERE id_comment = ".$id_comment);
            $req->execute();
            $message = "Le commentaire a bien été validé !";
            return $message;
        }catch(PDOException $e){
            return "Le commentaire n'a pas pu être validé, en voici la raison : ".$e->getMessage();
        }
    }

    public function verifReport($id_comment, $id_user){
        $req = $this->connect->prepare("SELECT COUNT(id_comment) FROM report WHERE id_comment = ".$id_comment." AND id_user = ".$id_user);
        $req->execute();
        $nbReport = $req->fetch(); 
        return $nbReport;
    }

    public function getReportByIdComment($id_comment){
        $req = $this->connect->query("SELECT message, reporting_date, id_user, id_comment FROM report WHERE id_comment = ".$id_comment);
        $req->setFetchMode(PDO::FETCH_OBJ);    
        $listReport = array();
        while ($obj = $req->fetch()){ 
            $report = new Report();           
            $report->setMessage($obj->message);
            $report->setReportingDate($obj->reporting_date);
            $user = new User();
            $report->setUser($user->getUserById($obj->id_user));
            $comment = new Comment();
            $report->setComment($comment->getCommentById($obj->id_comment));
            $listReport[] = $report;
        }
        return $listReport;
    }

    public function getCountCommentsReported(){
        $req = $this->connect->prepare("SELECT DISTINCT COUNT(id_comment) FROM report");
        $req->execute();
        $nbComment = $req->fetch(); 
        return $nbComment;
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