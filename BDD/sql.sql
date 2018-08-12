#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: droit
#------------------------------------------------------------

CREATE TABLE droit(
        id    Int  Auto_increment  NOT NULL ,
        droit Varchar (11) NOT NULL
	,CONSTRAINT droit_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id          Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        prenom      Varchar (50) NOT NULL ,
        identifiant Varchar (50) NOT NULL ,
        motdepasse  Varchar (50) NOT NULL ,
        mail        Varchar (50) NOT NULL ,
        id_droit    Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)

	,CONSTRAINT user_droit_FK FOREIGN KEY (id_droit) REFERENCES droit(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: billet
#------------------------------------------------------------

CREATE TABLE billet(
        id               Int  Auto_increment  NOT NULL ,
        titre            Varchar (255) NOT NULL ,
        content          Longtext NOT NULL ,
        dateCreation     Datetime NOT NULL ,
        dateModification Datetime NOT NULL ,
        id_user          Int NOT NULL
	,CONSTRAINT billet_PK PRIMARY KEY (id)

	,CONSTRAINT billet_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
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
        id_billet       Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT comment_billet0_FK FOREIGN KEY (id_billet) REFERENCES billet(id)
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

