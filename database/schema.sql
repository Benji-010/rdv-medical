-- Création de la Base des Données
DROP DATABASE IF EXISTS clinique_rdv;

CREATE DATABASE clinique_rdv CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_unicode_ci;

USE clinique_rdv;

-- Création de la table "Patient"
CREATE TABLE
    patient (
        id_patient INT NOT NULL AUTO_INCREMENT,
        patient_nom VARCHAR(100) NOT NULL,
        patient_postnom VARCHAR(100) NOT NULL,
        patient_prenom VARCHAR(100) NOT NULL,
        patient_sexe VARCHAR(1) NOT NULL,
        patient_province VARCHAR(100),
        patient_ville VARCHAR(100),
        patient_commune VARCHAR(100),
        patient_telephone VARCHAR(15) NOT NULL,
        PRIMARY KEY (id_patient),
        UNIQUE (patient_telephone),
        CHECK (patient_sexe IN ('M', 'F'))
    ) ENGINE = InnoDB;

-- Création de la table "Medecin"
CREATE TABLE
    medecin (
        id_medecin INT NOT NULL AUTO_INCREMENT,
        medecin_nom VARCHAR(100) NOT NULL,
        medecin_postnom VARCHAR(100) NOT NULL,
        medecin_prenom VARCHAR(100) NOT NULL,
        medecin_specialite VARCHAR(100) NOT NULL,
        medecin_photo VARCHAR(255) NULL,
        PRIMARY KEY (id_medecin)
    ) ENGINE = InnoDB;

-- Création de la table "Salle"
CREATE TABLE
    salle (
        id_salle INT NOT NULL AUTO_INCREMENT,
        salle_nom VARCHAR(100) NOT NULL,
        salle_equipement VARCHAR(100),
        PRIMARY KEY (id_salle),
        UNIQUE (salle_nom)
    ) ENGINE = InnoDB;

-- Création de la table "Tranche Horaire"
CREATE TABLE
    tranche_horaire (
        id_tranche INT NOT NULL AUTO_INCREMENT,
        tranche_libelle VARCHAR(20) NOT NULL,
        tranche_minutes INT NOT NULL,
        PRIMARY KEY (id_tranche),
        CHECK (tranche_minutes IN (30, 45, 60, 90, 120))
    ) ENGINE = InnoDB;

-- Création de la table "Disponibilite Medecin"
CREATE TABLE
    disponibilite_medecin (
        id_disponibilite_medecin INT NOT NULL AUTO_INCREMENT,
        disponibilite_medecin_jour VARCHAR(10) NOT NULL,
        disponibilite_medecin_heure_debut TIME NOT NULL,
        disponibilite_medecin_heure_fin TIME NOT NULL,
        disponibilite_medecin_valide_du DATE NOT NULL,
        disponibilite_medecin_valide_au DATE NOT NULL,
        disponibilite_medecin_statut VARCHAR(20) NOT NULL,
        id_medecin INT NOT NULL,
        PRIMARY KEY (id_disponibilite_medecin),
        FOREIGN KEY (id_medecin) REFERENCES medecin (id_medecin),
        CHECK (
            disponibilite_medecin_jour IN (
                'Lundi',
                'Mardi',
                'Mercredi',
                'Jeudi',
                'Vendredi',
                'Samedi',
                'Dimanche'
            )
        ),
        CHECK (
            disponibilite_medecin_heure_fin > disponibilite_medecin_heure_debut
        ),
        CHECK (
            disponibilite_medecin_valide_au >= disponibilite_medecin_valide_du
        ),
        CHECK (
            disponibilite_medecin_statut IN ('Actif', 'Inactif')
        )
    ) ENGINE = InnoDB;

-- Création de la table "Indisponibilite Medecin"
CREATE TABLE
    indisponibilite_medecin (
        id_indisponibilite_medecin INT NOT NULL AUTO_INCREMENT,
        indisponibilite_medecin_date_debut DATE NOT NULL,
        indisponibilite_medecin_date_fin DATE NOT NULL,
        indisponibilite_medecin_heure_debut TIME NOT NULL,
        indisponibilite_medecin_heure_fin TIME NOT NULL,
        indisponibilite_medecin_motif VARCHAR(100) NOT NULL,
        indisponibilite_medecin_statut VARCHAR(20) NOT NULL,
        id_medecin INT NOT NULL,
        PRIMARY KEY (id_indisponibilite_medecin),
        FOREIGN KEY (id_medecin) REFERENCES medecin (id_medecin),
        CHECK (
            indisponibilite_medecin_date_fin >= indisponibilite_medecin_date_debut
        ),
        CHECK (
            indisponibilite_medecin_statut IN ('Planifiée', 'Validée', 'Annulée')
        )
    ) ENGINE = InnoDB;

-- Création de la table "Disponibilite Salle"
CREATE TABLE
    disponibilite_salle (
        id_disponibilite_salle INT NOT NULL AUTO_INCREMENT,
        disponibilite_salle_jour VARCHAR(10) NOT NULL,
        disponibilite_salle_heure_debut TIME NOT NULL,
        disponibilite_salle_heure_fin TIME NOT NULL,
        disponibilite_salle_valide_du DATE NOT NULL,
        disponibilite_salle_valide_au DATE NOT NULL,
        disponibilite_salle_statut VARCHAR(20) NOT NULL,
        id_salle INT NOT NULL,
        PRIMARY KEY (id_disponibilite_salle),
        FOREIGN KEY (id_salle) REFERENCES salle (id_salle),
        CHECK (
            disponibilite_salle_jour IN (
                'Lundi',
                'Mardi',
                'Mercredi',
                'Jeudi',
                'Vendredi',
                'Samedi',
                'Dimanche'
            )
        ),
        CHECK (
            disponibilite_salle_heure_fin > disponibilite_salle_heure_debut
        ),
        CHECK (
            disponibilite_salle_valide_au >= disponibilite_salle_valide_du
        ),
        CHECK (
            disponibilite_salle_statut IN ('Ouverte', 'Fermée')
        )
    ) ENGINE = InnoDB;

-- Création de la table "Indisponibilite Salle"
CREATE TABLE
    indisponibilite_salle (
        id_indisponibilite_salle INT NOT NULL AUTO_INCREMENT,
        indisponibilite_salle_date_debut DATE NOT NULL,
        indisponibilite_salle_date_fin DATE NOT NULL,
        indisponibilite_salle_heure_debut TIME NOT NULL,
        indisponibilite_salle_heure_fin TIME NOT NULL,
        indisponibilite_salle_motif VARCHAR(100) NOT NULL,
        indisponibilite_salle_statut VARCHAR(20) NOT NULL,
        id_salle INT NOT NULL,
        PRIMARY KEY (id_indisponibilite_salle),
        FOREIGN KEY (id_salle) REFERENCES salle (id_salle),
        CHECK (
            indisponibilite_salle_date_fin >= indisponibilite_salle_date_debut
        ),
        CHECK (
            indisponibilite_salle_statut IN ('Planifiée', 'Validée', 'Annulée')
        )
    ) ENGINE = InnoDB;

-- Création de la table "Rendez-vous"
CREATE TABLE
    rendez_vous (
        id_rdv INT NOT NULL AUTO_INCREMENT,
        rdv_date DATE NOT NULL,
        rdv_heure_debut TIME NOT NULL,
        rdv_heure_fin TIME NOT NULL,
        rdv_statut VARCHAR(20) NOT NULL,
        id_patient INT NOT NULL,
        id_medecin INT NOT NULL,
        id_salle INT NOT NULL,
        id_tranche INT NOT NULL,
        PRIMARY KEY (id_rdv),
        FOREIGN KEY (id_patient) REFERENCES patient (id_patient),
        FOREIGN KEY (id_medecin) REFERENCES medecin (id_medecin),
        FOREIGN KEY (id_salle) REFERENCES salle (id_salle),
        FOREIGN KEY (id_tranche) REFERENCES tranche_horaire (id_tranche),
        CHECK (rdv_heure_fin > rdv_heure_debut),
        CHECK (
            rdv_statut IN (
                'En attente',
                'Confirmé',
                'Reporté',
                'Annulé',
                'Terminé'
            )
        ),
        INDEX idx_rdv_medecin (
            id_medecin,
            rdv_date,
            rdv_heure_debut,
            rdv_heure_fin
        ),
        INDEX idx_rdv_salle (
            id_salle,
            rdv_date,
            rdv_heure_debut,
            rdv_heure_fin
        )
    ) ENGINE = InnoDB;

-- Création de la table "Utilisateur"
CREATE TABLE
    utilisateur (
        id_utilisateur INT NOT NULL AUTO_INCREMENT,
        utilisateur_login VARCHAR(50) NOT NULL,
        utilisateur_mot_de_passe VARCHAR(255) NOT NULL,
        PRIMARY KEY (id_utilisateur),
        UNIQUE (utilisateur_login)
    ) ENGINE = InnoDB;