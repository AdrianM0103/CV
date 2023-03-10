------------------ Grupare si filtrare

	--1.Care este suma cheltuita pentru a plati ingrijitorii care au grija de parcel '1002'?
select sum(suma) from cheltuieli
natural join cheltuieli_ingrijitori
natural join ingrijitori
natural join ingrijitori_loturi
natural join loturi
where loturi.id_parcela=1002
	
	--2.Care este numarul de ingrijitori care au grija de lotul 10022?
select count(id_ingrijitor) from ingrijitori_loturi
where id_lot=10022
	
	--3.Care sunt tratamentele care au fost incepute in perioada 2000-2002?
select id_tratament from tratamente_specii
where extract(year from (data_incepere)) between 2000 AND 2002;

-------------------- Subinterogari in Having/From 
	--1.Care este tratamentul/sunt tratamentele care s-a realizat in cele mai multe luni?
select id_tratament, tratamente.tip_tratament, count(extract(month from(data_incepere))) as nr_luni from tratamente_specii
natural join tratamente
group by id_tratament,tratamente.tip_tratament
having count(extract(month from(data_incepere))) = 
(select count(extract(month from(data_incepere))) from tratamente_specii
natural join tratamente
group by id_tratament,tratamente.tip_tratament 
 order by 1 desc 
 limit 1)
 
	--2.Care este parcela cu cei mai multi ingrijitori?
select id_parcela, count(id_ingrijitor) as nr_ingrijitori from ingrijitori
natural join ingrijitori_loturi
natural join loturi
group by id_parcela
having count(id_ingrijitor) = (select count(id_ingrijitor) from ingrijitori
natural join ingrijitori_loturi
natural join loturi
group by id_parcela
order by 1 desc limit 1)
	
	--3.Care este specia/sunt speciile care se intalnesc pe cele mai multe loturi?
select id_specie,denumire,count(id_lot) as nr_loturi from specii
natural join plante
group by id_specie,denumire
having count(id_lot) = (select count(id_lot) from specii
natural join plante
group by id_specie,denumire
order by 1 desc limit 1)
	
-----------Expresii tabela si "tabele pivot"
	--1.Pentru fiecare specie, aratati primele 3 parcele, pe care numarul acestora este cel mai mare.
	select * from plante
	insert into plante values(564, 10022,704,2,2,'1990-10-10');
	insert into plante values(562, 10022,708,2,2,'1990-10-10');
	insert into plante values(563, 10042,708,2,2,'1990-10-10');
	insert into plante values(561, 10022,708,2,2,'1990-10-10');
	
	
	
WITH
	speciile as (select s.denumire, l.id_parcela,count(pl.id_planta) as nr_plante,
			   rank() over(partition by s.id_specie order by count(pl.id_planta) desc) as poz 
			   from specii s
			  inner join plante pl on  s.id_specie = pl.id_specie
			  inner join loturi l on l.id_lot = pl.id_lot
			   group by s.id_specie,l.id_parcela)
(SELECT distinct(s.denumire) AS Specie,
       COALESCE(cast((select pa.id_parcela from speciile s1 
				 natural join parcele pa
				 where s1.denumire = s.denumire offset 0 limit 1) as varchar(4)),'') AS Parcela1,
       COALESCE(cast((select pa.id_parcela from speciile s1 
				 natural join parcele pa
				 where s1.denumire = s.denumire offset 1 limit 1) as varchar(4)),'') AS Parcela2,
       COALESCE(cast((select pa.id_parcela from speciile s1 
				 natural join parcele pa 
				 where s1.denumire = s.denumire offset 2 limit 1) as varchar(4)),'') AS Parcela3,
	   SUM(spec.nr_plante) as Total_plante
FROM specii s
		LEFT JOIN speciile spec ON s.denumire = spec.denumire
	   group by distinct(s.denumire)
	   order by 5 desc)

	--2.Pentru fiecare tratament, aratati primele 3 specii, pe care s-a aplicat acesta de cele mai multe ori.
	insert into tratamente_specii values (707,606,21,'10/10/2022');
	insert into tratamente_specii values (707,603,21,'10/10/2022');
	insert into tratamente_specii values (702,607,21,'10/10/2022');
	insert into tratamente_specii values (708,607,21,'10/10/2022');
	
	
WITH
	tratamentele as (select t.id_tratament, s.denumire,count(s.id_specie) as nr_specii,
			   rank() over(partition by t.id_tratament order by count(s.id_specie) desc) as poz 
			   from tratamente t
			  inner join tratamente_specii ts on  ts.id_tratament = t.id_tratament
			  inner join specii s on s.id_specie = ts.id_specie
			   group by t.id_tratament,s.denumire)
(SELECT distinct(t.id_tratament) AS Tratament,
       COALESCE((select s.denumire from tratamentele t1
				 natural join specii s
				 where t1.id_tratament = t.id_tratament offset 0 limit 1),'') AS Tratamentul1,
       COALESCE((select s.denumire from tratamentele t1
				 natural join specii s
				 where t1.id_tratament = t.id_tratament offset 1 limit 1),'') AS Tratamentul2,
       COALESCE((select s.denumire from tratamentele t1
				 natural join specii s
				 where t1.id_tratament = t.id_tratament offset 2 limit 1),'') AS Tratamentul3,
	   SUM(tr.nr_specii) as Total_plante
FROM tratamente t
		LEFT JOIN tratamentele tr ON t.id_tratament = tr.id_tratament
	   group by distinct(t.id_tratament)
	   order by 5 desc)
	   
	--3.Pentru fiecare parcela, aratati primii 7 ingrijitori, in ordine alfabetica.
WITH
angajatii as (select p.id_parcela, i.nume
			   from parcele p
			  inner join loturi l on  l.id_parcela = p.id_parcela
			  inner join ingrijitori_loturi il on l.id_lot = il.id_lot
			  inner join ingrijitori i on i.id_ingrijitor = il.id_ingrijitor
			  order by 2)
(SELECT distinct(p.id_parcela) AS Parcela,
       COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 0 limit 1),'') AS Angajatul1,
       COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 1 limit 1),'') AS Angajatul2,
 	   COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 2 limit 1),'') AS Angajatul3,
		COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 3 limit 1),'') AS Angajatul4,
 		COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 4 limit 1),'') AS Angajatul5,
		COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 5 limit 1),'') AS Angajatul6,
 		COALESCE((select a.nume from angajatii a
				 where p.id_parcela = a.id_parcela offset 6 limit 1),'') AS Angajatul7
FROM parcele p
		LEFT JOIN angajatii ai ON p.id_parcela = ai.id_parcela
	   group by distinct(p.id_parcela)
	   order by 1)
	   
-------------Interogari recursive
	--1.Aratati nivelul ierarhic al fiecarui angajat.
insert into ingrijitori values (961,'Ingrijitor961',null,'1975-10-09', 'Masculin', 'Administrator')
update ingrijitori set superior = 961 where id_ingrijitor = 912;
update ingrijitori set superior = 961 where id_ingrijitor = 924;
update ingrijitori set superior = 961 where id_ingrijitor = 936;
update ingrijitori set superior = 961 where id_ingrijitor = 948;
update ingrijitori set superior = 961 where id_ingrijitor = 960;

WITH RECURSIVE ierarhie(id_ingrijitor, nume, specializare,
		superior, nivel) AS (
	SELECT id_ingrijitor, nume, specializare,
		superior, 0 AS nivel
	FROM ingrijitori
	WHERE superior IS NULL
UNION ALL
 	SELECT i.id_ingrijitor, i.nume, i.specializare,
		i.superior, nivel + 1
 	FROM ingrijitori i INNER JOIN ierarhie h
		ON i.superior = h.id_ingrijitor
)
SELECT *
FROM ierarhie
ORDER BY nivel

	--2.Extrageti toti sefii ingrijitorului 'Ingrijitor920'.
	
WITH RECURSIVE ierarhie_ingrijitor920(id_ingrijitor, nume, specializare,
		superior, nivel) AS (
	SELECT id_ingrijitor, nume, specializare,
		superior, 0 AS nivel
	FROM ingrijitori
	WHERE id_ingrijitor = 920
UNION ALL
 	SELECT i.id_ingrijitor, i.nume, i.specializare,
		i.superior, nivel + 1
 	FROM ingrijitori i INNER JOIN ierarhie_ingrijitor920 h
		ON i.id_ingrijitor = h.superior
)
SELECT *
FROM ierarhie_ingrijitor920
where id_ingrijitor != 920
ORDER BY nivel

	--3.Pentru fiecare specie, afisati intr-un singur string, parcelele pe care aceasta se afla.
	
WITH RECURSIVE parcele_specii (id_specie,denumire,id_parcela, nr_parcele, parcele) AS (
	SELECT distinct specii.id_specie,specii.denumire,loturi.id_parcela, 1, CAST ('1:' || loturi.id_parcela AS VARCHAR(1000))
	FROM specii
		INNER JOIN plante ON specii.id_specie = plante.id_specie
		INNER JOIN loturi ON loturi.id_lot = plante.id_lot
	WHERE (specii.id_specie, loturi.id_parcela) IN	(
		SELECT specii.id_specie, min(loturi.id_parcela)
		FROM specii
		INNER JOIN plante ON specii.id_specie = plante.id_specie
		INNER JOIN loturi ON loturi.id_lot = plante.id_lot
		group by specii.id_specie) 
UNION ALL
	SELECT distinct specii.id_specie, specii.denumire , loturi.id_parcela, parcele_specii.nr_parcele + 1,
		CAST ((parcele_specii.parcele || '; ' || (parcele_specii.nr_parcele + 1) || ':' || loturi.id_parcela) AS VARCHAR(1000))
	FROM specii
		INNER JOIN plante ON specii.id_specie = plante.id_specie
		INNER JOIN loturi ON loturi.id_lot = plante.id_lot
		INNER JOIN parcele_specii ON specii.id_specie = parcele_specii.id_specie 
		Where loturi.id_parcela =
			(SELECT MIN(loturi.id_parcela)
			 FROM loturi
			 INNER JOIN plante ON loturi.id_lot = plante.id_lot
			 inner join specii on specii.id_specie = plante.id_specie
			 WHERE specii.id_specie = parcele_specii.id_specie AND (loturi.id_parcela > parcele_specii.id_parcela)))
SELECT id_specie, denumire, nr_parcele, parcele
FROM parcele_specii
WHERE (id_specie, denumire, nr_parcele) IN
	(SELECT id_specie, denumire,Max(nr_parcele)
	FROM parcele_specii
	GROUP BY id_specie, denumire)
ORDER BY 3 desc
	