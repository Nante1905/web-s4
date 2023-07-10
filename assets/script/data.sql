"5 utilisateurs"
"15 codes"
"5 regimes"
"5 activités sportives"

insert into objectif values 
    (default,'augmenter poids'),
    (default,'diminuer poids');

insert into genre values
    (default,'homme'),
    (default,'femme');

insert into utilisateur values
    (default,'Mirija Marc','mirija@gmail.com','6446a00491ede99375f7bf945405769a',1,65,179,'2023-07-01'), --mirija
    (default,'Nantenaina','nante@gmail.com','38d5e6798644b2364b93426eba91e587',1,68,172,'2023-07-10'), --nante
    (default,'Mialisoa','mialisoa@gmail.com','9f74e182af57b7e57d8b637ad3c01ac0',2,50,152,'2023-07-12'), --mialisoa
    (default,'Mendrika','mendrika@gmail.com','49f977e5d8d72a268ab2534ef3435ff5',2,75,173,'2023-07-21'), --mendrika
    (default,'Toky','toky@gmail.com','1a6cd6fde8f5bef78bd6fc398010e41b',1,55,168,'2023-07-23'); --toky

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
    (default,'fruits'),
    (default,'légumes'),
    (default,'viande rouge'),
    (default,'poulet'),
    (default,'riz');

insert into regime_plat values
    (2,3),
    (2,4);

insert into utilisateur_objectif values
    (1,2,'2023-07-11',12),
    (1,2,'2023-07-12',15);




















