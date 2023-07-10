create or replace view v_regime_plat as(
    select r.id iregime ,p.id idplat, p.nom from regime_plat rp
    JOIN regime r ON r.id = rp.idregime
    JOIN plat p ON p.id = rp.idplat
);


create or replace view v_utilisateur_transaction_valide as(
    select tu.id ,tu.idcode,tu.valeur,tu.datetransaction,tu.statut,u.id idutilisateur,u.nom  from transaction_utilisateur tu 
    JOIN utilisateur u ON tu.idutilisateur= u.id
    where tu.statut=10
);

create or replace view v_montant_utilisateur as(
    select idutilisateur, sum(valeur) montant
    from v_utilisateur_transaction_valide 
    group by idutilisateur
);

-- SELECT d.date_genere, count(d.date_genere) FROM get_all_dates_in_month(2023, 7) d
-- LEFT JOIN utilisateur u 
-- ON u.dateinscription = d.date_genere
-- GROUP BY d.date_genere
-- ORDER by d.date_genere;

-- SELECT distinct(d.date_genere) datedujour, count(u.id) utilisateurs FROM get_all_dates_in_month(2023, 7) d
-- LEFT JOIN utilisateur u 
-- ON u.dateinscription = d.date_genere
-- GROUP BY d.date_genere
-- ORDER BY d.date_genere;

select distinct(r.id) idregime, count(t.idregime) nbr from regime r
LEFT JOIN  transaction_utilisateur t
ON r.id = t.idregime
WHERE t.datetransaction BETWEEN date_trunc('month', DATE '2023-07-01') 
AND date_trunc('month', DATE '2023-07-01') + INTERVAL '1 month' - INTERVAL '1 day'
GROUP BY r.id;

select r.id idregime, coalesce(c.nbr_users,0) nbr_users from regime r
LEFT JOIN get_classement(2023,7) c
ON r.id = c.idregime
ORDER BY nbr_users desc;