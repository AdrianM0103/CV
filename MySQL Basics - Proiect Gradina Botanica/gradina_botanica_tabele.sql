drop table if exists PARCELE;
create table PARCELE (
Id_parcela serial primary key,
Suprafata numeric(5) not null,
Inaltime_Medie numeric(4) not null,
Numar_loturi numeric(2) not null
);

drop table if exists LOTURI;
create table LOTURI(
Id_lot serial primary key,
Id_parcela integer,
Suprafata numeric(5) not null,
Numar_Plante numeric(3) not null,
Sera boolean default false,
Gazon boolean default true,
Tip_sol varchar(100) not null,
Temperatura_Medie numeric(3) not null,
Umiditate_Sol numeric(3) not null,
constraint fk_id_parcela
	foreign key (Id_parcela)
	references PARCELE(Id_parcela)
	on delete cascade
);

drop table if exists SPECII;
create table Specii(
Id_specie serial primary key,
Denumire varchar(50),
Denumire_Stiintifica varchar(50) not null unique,
Numar_Plante numeric(3),
Tip_radacina varchar(30) not null,
Tip_frunza varchar(30) not null,
Tip_fruct varchar(30) not null,
Metoda_Polenizare varchar(30) not null
);

drop table if exists PLANTE;
create table PLANTE(
Id_planta serial primary key,
Id_lot integer,
Id_specie integer,
Inaltime numeric(2) not null,
Adancime_radacini numeric(2) not null,
Data_plantarii date not null,
constraint fk_id_lot
	foreign key (Id_lot)
	references LOTURI(Id_lot)
	on delete cascade,
constraint fk_id_specie
	foreign key (Id_specie)
	references SPECII(Id_Specie)
	on delete cascade
);

drop table if exists TRATAMENTE;
create table TRATAMENTE(
Id_tratament serial primary key,
Tip_tratament varchar(50) not null,
Cantitate numeric(3) not null,
Agent_Chimic_Principal varchar(50) not null
);

drop table if exists TRATAMENTE_SPECII;
create table TRATAMENTE_SPECII(
Id_specie integer,
Id_tratament integer,
Intervalul numeric(3),
Data_inceput_tratament date,
constraint fk_Id_Specie 
	foreign key (Id_specie)
	references SPECII(Id_specie)
	on delete cascade,
constraint fk_Id_tratament
	foreign key(Id_tratament)
	references TRATAMENTE(Id_tratament)
	on delete cascade
);

drop table if exists INGRIJITORI;
create table INGRIJITORI(
Id_ingrijitor serial primary key,
Nume varchar(50) not null,
Superior integer,
Data_Nasterii date not null,
Gen varchar(10) not null,
Specializare varchar(50) not null
);

drop table if exists INGRIJITORI_LOTURI;
create table INGRIJITORI_LOTURI(
Id_lot integer,
Id_ingrijitor integer,
constraint fk_id_lot
	foreign key (Id_lot)
	references LOTURI(Id_lot)
	on delete cascade,
constraint fk_id_ingrijitor
	foreign key (Id_ingrijitor)
	references INGRIJITORI(Id_ingrijitor)
	on delete cascade
);

drop table if exists CHELTUIELI;
create table CHELTUIELI(
Id_cheltuiala serial primary key,
Tip_cheltuiala varchar(20) not null,
Suma numeric(10,2) not null
);

drop table if exists CHELTUIELI_LOTURI;
create table CHELTUIELI_LOTURI(
Id_lot integer,
Id_cheltuiala integer,
constraint fk_id_lot
	foreign key (Id_lot)
	references LOTURI(Id_lot)
	on delete cascade,
constraint fk_id_cheltuiala
	foreign key (Id_cheltuiala)
	references CHELTUIELI(Id_cheltuiala)
	on delete cascade
);

drop table if exists CHELTUIELI_INGRIJITORI;
create table CHELTUIELI_INGRIJITORI(
Id_ingrijitor integer,
Id_cheltuiala integer,
constraint fk_id_ingrijitor
	foreign key (Id_ingrijitor)
	references INGRIJITORI(Id_ingrijitor)
	on delete cascade,
constraint fk_id_cheltuiala
	foreign key (Id_cheltuiala)
	references CHELTUIELI(Id_cheltuiala)
	on delete cascade
);

drop table if exists CHELTUIELI_TRATAMENTE;
create table CHELTUIELI_TRATAMENTE(
Id_tratament integer,
Id_cheltuiala integer,
constraint fk_id_tratament
	foreign key (Id_tratament)
	references TRATAMENTE(Id_tratament)
	on delete cascade,
constraint fk_id_cheltuiala
	foreign key (Id_cheltuiala)
	references CHELTUIELI(Id_cheltuiala)
	on delete cascade
);