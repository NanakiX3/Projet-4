#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id    Int  Auto_increment  NOT NULL ,
        role Varchar (11) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id          Int  Auto_increment  NOT NULL ,
        lastName         Varchar (50) NOT NULL ,
        firstName      Varchar (50) NOT NULL ,
        identifiant Varchar (50) NOT NULL ,
        password  Varchar (50) NOT NULL ,
        mail        Varchar (50) NOT NULL ,
        id_role    Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)

	,CONSTRAINT user_role_FK FOREIGN KEY (id_role) REFERENCES role(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: post
#------------------------------------------------------------

CREATE TABLE post(
        id               Int  Auto_increment  NOT NULL ,
        title            Varchar (255) NOT NULL ,
        content          Longtext NOT NULL ,
        created_at     Datetime NOT NULL ,
        update_at Datetime NOT NULL ,
        id_user          Int NOT NULL
	,CONSTRAINT post_PK PRIMARY KEY (id)

	,CONSTRAINT post_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id              Int  Auto_increment  NOT NULL ,
        content         Longtext NOT NULL ,
        dateComment Datetime NOT NULL ,
        id_answer       Int NOT NULL ,
        id_user         Int NOT NULL ,
        id_post       Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT comment_post_FK FOREIGN KEY (id_post) REFERENCES post(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: report
#------------------------------------------------------------

CREATE TABLE report(
        id_comment      Int NOT NULL ,
        id_user         Int NOT NULL ,
        message         Text NOT NULL ,
        reportingDate Datetime NOT NULL
	,CONSTRAINT report_PK PRIMARY KEY (id,id_user)

	,CONSTRAINT report_comment_FK FOREIGN KEY (id) REFERENCES comment(id)
	,CONSTRAINT report_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;

