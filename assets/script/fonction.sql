create OR REPLACE FUNCTION get_classement(year integer, month integer)
RETURNS TABLE(
    idregime int,
    nbr_users int
)
AS $$
DECLARE 
f record;
BEGIN
    for f in (select distinct(r.id) idregime, count(t.idregime) nbr from regime r
                LEFT JOIN  achat_utilisateur t
                ON r.id = t.idregime
                WHERE t.dateachat BETWEEN DATE_TRUNC('MONTH', DATE(year || '-' || month || '-01')) 
                AND DATE_TRUNC('MONTH', DATE(year || '-' || month || '-01')) + INTERVAL '1 MONTH' - INTERVAL '1 DAY'
                GROUP BY r.id)
    loop
        idregime := f.idregime;
        nbr_users := f.nbr;
    return next;
    end loop;
END;
$$ LANGUAGE plpgsql;

select * from get_classement(2023,7);

create OR REPLACE FUNCTION nombre_utilisateurs_par_mois(year integer, month integer)
RETURNS TABLE(
    datedujour date,
    nbr_users int
)
AS $$
DECLARE 
r record;
BEGIN
    for r in (SELECT distinct(d.date_genere) datedujour, count(u.id) utilisateurs FROM get_all_dates_in_month(year, month) d
                LEFT JOIN utilisateur u 
                ON u.dateinscription = d.date_genere
                GROUP BY d.date_genere
                ORDER BY d.date_genere)
    loop
        datedujour := r.datedujour;
        nbr_users := r.utilisateurs;
        RETURN next;
    end loop;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION generate_date(date_debut Date, jour integer )
RETURNS table(
    date_genere date
) 
AS $$
BEGIN
    RETURN QUERY 
    SELECT generate_series(date_debut, (date_debut + (jour || ' days')::interval), '1 day')::date AS date_range;
END;
$$ LANGUAGE plpgsql;


select * from generate_date('2023-06-25'::date,10);


CREATE OR REPLACE FUNCTION get_all_dates_in_month(year integer, month integer)
RETURNS TABLE (date_genere date)
AS $$
BEGIN
    RETURN QUERY
    SELECT generate_series(
        DATE_TRUNC('MONTH', DATE(year || '-' || month || '-01')),
        DATE_TRUNC('MONTH', DATE(year || '-' || month || '-01')) + INTERVAL '1 MONTH - 1 DAY',
        '1 day'
    )::date AS date_range;
END;
$$ LANGUAGE plpgsql;

    SELECT * FROM get_all_dates_in_month(2023, 7); 
