USE clinique_rdv;

-- Durées de consultation autorisées
INSERT INTO
    tranche_horaire (tranche_libelle, tranche_minutes)
VALUES
    ('1/2 Heure', 30),
    ('3/4 Heure', 45),
    ('1 Heure', 60),
    ('1,5 Heure', 90),
    ('2 Heures', 120);