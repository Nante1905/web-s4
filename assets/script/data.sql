"5 utilisateurs"
"15 codes"
"5 regimes"
"5 activités sportives"

insert into objectif values 
    (default,'augmenter poids'),
    (default,'diminuer poids'),
    (default,'atteindre IMC idéal');

insert into genre values
    (default,'homme'),
    (default,'femme');

insert into utilisateur values
    (default,'Mirija Marc','mirija@gmail.com','6446a00491ede99375f7bf945405769a',1,65,179,'2023-07-01',true), --mirija
    (default,'Nantenaina','nante@gmail.com','38d5e6798644b2364b93426eba91e587',1,68,172,'2023-07-10',default), --nante
    (default,'Mialisoa','mialisoa@gmail.com','9f74e182af57b7e57d8b637ad3c01ac0',2,50,152,'2023-07-12',default), --mialisoa
    (default,'Mendrika','mendrika@gmail.com','49f977e5d8d72a268ab2534ef3435ff5',2,75,173,'2023-07-21',default), --mendrika
    (default,'Toky','toky@gmail.com','1a6cd6fde8f5bef78bd6fc398010e41b',1,55,168,'2023-07-23',default); --toky

insert into code values
    (default,'9876543210',1000,1),
    (default,'2468135790',1500,1),
    (default,'1357924680',1000,1),
    (default,'3692581470',1500,1),
    (default,'8024671359',6000,1),
    (default,'5748132960',3000,1),
    (default,'4201576839',1000,1),
    (default,'6397420581',7000,1),
    (default,'2519038476',2500,1),
    (default,'7182950364',7500,1),
    (default,'0834692157',3500,1),
    (default,'9328764015',4500,1),
    (default,'1976052834',6000,1),
    (default,'5068743291',5000,1),
    (default,'6489201573',20000,1);

insert into regime values
    (default,'Régime équilibré', 12000,20,21,'',1),
    (default,'Régime viande', 20000, 18,7,'',1),
    (default,'Régime sans gluten', 18000, 15,14,'', 2),
    (default,'Régime végétarien', 18500, 10,17,'',2),
    (default,'Régime méditerranéen', 23000, 21,11,'',2);

insert into sport values
    (default,'jogging',0.75,'',1),
    (default,'basket',1,'',1),
    (default,'musculation',0.25,'',2),
    (default,'squat',0.15,'',2),
    (default,'foot',0.5,'',1);

insert into plat values
    (default,'viande'),
    (default,'poisson'),
    (default,'volaille');

insert into regime_plat values
    (1,1,20),
    (1,2,60),
    (1,3,20),
    (2,1,45),
    (2,2,45),
    (2,3,10),
    (3,1,15),
    (3,2,35),
    (3,3,60),
    (4,1,30),
    (4,2,40),
    (4,3,30),
    (5,1,50),
    (5,2,5),
    (5,3,45);


insert into utilisateur_objectif values
    (1,2,'2023-07-11',12),
    (1,2,'2023-07-12',15);

insert into utilisateur_gold values
    (default,1,'2023-07-12');

insert into remise values 
    (default,15,'2023-07-10');

insert into achat_utilisateur values
    (default,2,2300,1,'2023-07-31',15),
    (default,1,2600,1,'2023-07-30',15);











select sum(valeur) montant from (select date_genere datedujour, COALESCE(valeur, 0) valeur from get_all_dates_in_month(2023,7) d left outer join (select sum(montant) valeur, dateachat::date from achat_utilisateur group by dateachat::date) t on d.date_genere=t.dateachat) somme








