-- Création de la Base des Données
DROP DATABASE IF EXISTS clinique_rdv;

CREATE DATABASE clinique_rdv CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_unicode_ci;

USE clinique_rdv;

-- Création de la table "Patient"
CREATE TABLE
    patient (
        id_patient VARCHAR(7) NOT NULL,
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

CREATE TABLE
    medecin (
        id_medecin VARCHAR(7) NOT NULL,
        medecin_nom VARCHAR(100) NOT NULL,
        medecin_postnom VARCHAR(100) NOT NULL,
        medecin_prenom VARCHAR(100) NOT NULL,
        medecin_specialite VARCHAR(100) NOT NULL,
        PRIMARY KEY (id_medecin)
    ) ENGINE = InnoDB;

CREATE TABLE
    salle (
        id_salle VARCHAR(6) NOT NULL,
        salle_nom VARCHAR(100) NOT NULL,
        salle_equipement VARCHAR(100),
        PRIMARY KEY (id_salle),
        UNIQUE (salle_nom)
    ) ENGINE = InnoDB;

CREATE TABLE
    tranche_horaire (
        id_tranche INT NOT NULL AUTO_INCREMENT,
        tranche_libelle VARCHAR(20) NOT NULL,
        tranche_minutes INT NOT NULL,
        PRIMARY KEY (id_tranche),
        CHECK (tranche_minutes IN (30, 45, 60, 90, 120))
    ) ENGINE = InnoDB;