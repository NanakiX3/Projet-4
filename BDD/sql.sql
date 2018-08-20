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
        motdepasse  Varchar (50) NOT NULL ,
        mail        Varchar (50) NOT NULL ,
        id_role    Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)

	,CONSTRAINT user_role_FK FOREIGN KEY (id_role) REFERENCES role(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Post
#------------------------------------------------------------

CREATE TABLE Post(
        id               Int  Auto_increment  NOT NULL ,
        title            Varchar (255) NOT NULL ,
        content          Longtext NOT NULL ,
        created_at     Datetime NOT NULL ,
        update_at Datetime NOT NULL ,
        id_user          Int NOT NULL
	,CONSTRAINT Post_PK PRIMARY KEY (id)

	,CONSTRAINT Post_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id              Int  Auto_increment  NOT NULL ,
        content         Longtext NOT NULL ,
        dateCommentaire Datetime NOT NULL ,
        idReponse       Int NOT NULL ,
        id_user         Int NOT NULL ,
        id_Post       Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT comment_Post0_FK FOREIGN KEY (id_Post) REFERENCES Post(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: signaler
#------------------------------------------------------------

CREATE TABLE signaler(
        id_comment      Int NOT NULL ,
        id_user         Int NOT NULL ,
        message         Text NOT NULL ,
        dateSignalement Datetime NOT NULL
	,CONSTRAINT signaler_PK PRIMARY KEY (id,id_user)

	,CONSTRAINT signaler_comment_FK FOREIGN KEY (id) REFERENCES comment(id)
	,CONSTRAINT signaler_user0_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;

