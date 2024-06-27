use empresa;


DROP TABLE IF EXISTS LINIA_COMANDA;
DROP TABLE IF EXISTS PRODUCTES;
DROP TABLE IF EXISTS COMANDA;
DROP TABLE IF EXISTS CLIENTS;
DROP TABLE IF EXISTS OFICINES;
DROP TABLE IF EXISTS EMPLEATS;



-- CLIENTS

CREATE TABLE CLIENTS (
	numclie int(4),
	nom varchar(40) NOT NULL,
	limitcredit decimal(10,2), 
	PRIMARY KEY (numclie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- EMPLEATS

CREATE TABLE EMPLEATS (
	numemp int(3),
	nom varchar(40) NOT NULL ,
	edat int(3),
	oficina int(2),
	titol varchar(20),
	contracte date,
	cap int(3),
	salari decimal(10,2),
	vendes decimal(10,2),
	PRIMARY KEY  (numemp) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- OFICINES

CREATE TABLE OFICINES (
	oficina int(2),
	ciutat varchar(40),
	regio varchar(20),
	dir int(3),
	objectiu decimal(10,2),
	vendes decimal(10,2),
	PRIMARY KEY  (oficina) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- COMANDA

CREATE TABLE COMANDA (
	numcomanda int(6),
	data date NOT NULL,
	clie int(4) NOT NULL,
	rep_ven int(3) NOT NULL,
	import_total decimal(10,2),
	PRIMARY KEY  (numcomanda)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- LINIA_COMANDA

CREATE TABLE LINIA_COMANDA (	
	numcomanda int(6),
        lin_com	int(2),
	codfab varchar(10) NOT NULL, 
	codprod varchar(15) NOT NULL ,
	quant int(3) NOT NULL,
	import decimal(10,2) NOT NULL,
	PRIMARY KEY  (numcomanda,lin_com) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- PRODUCTES

CREATE TABLE PRODUCTES (
	codfab varchar(10), 
	codprod varchar(15),
	descr varchar (20),
	preu decimal(10,2),
        existencies int(4),
	PRIMARY KEY  (codfab,codprod)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

