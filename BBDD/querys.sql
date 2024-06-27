/****1. Obtenir els codis dels productes que tenen existències iguals a zero o que apareguin 
en comandes de l’any 90 ****/

SELECT c.numcomanda, c.data, lc.codprod, p.*
FROM linia_comanda lc
JOIN comanda c ON c.numcomanda = lc.numcomanda
RIGHT JOIN productes p ON lc.codprod = p.codprod
WHERE p.existencies = 0 OR c.data LIKE '1990%'
GROUP BY p.codprod;

/****2. Obtenir una llista dels empleats amb les dades de la seva oficina (ciutat, regió). 
Volem que si un empleat no està assignat a cap oficina apareguin les dades 
de la seva oficina a nuls.****/

SELECT e.*, o.ciutat, o.regio
FROM empleats e
LEFT JOIN oficines o ON o.oficina=e.oficina;

/****3. Obtenir una llista dels empleats amb les dades de la seva oficina. Volem que si una 
oficina no està assignada a cap empleat apareguin les dades de l’empleat a nuls****/

SELECT e.nom, e.oficina, o.ciutat, o.regio, o.oficina
FROM empleats e
RIGHT JOIN oficines o ON o.oficina=e.oficina;

/****4. Llistar les comandes mostrant el seu número, import, nom del client, i el límit de crèdit 
del client corresponent (totes les comandes tenen client i representant)****/
SELECT c.numcomanda, c.import_total, c.rep_ven, cli.nom, cli.limitcredit
FROM comanda c
JOIN clients cli ON cli.numclie = c.clie;

/****5. Llistar les dades de cadascun dels empleats, la ciutat i regió on treballa****/
SELECT empleats.*, oficines.regio, oficines.ciutat
FROM empleats
JOIN oficines ON empleats.oficina = oficines.oficina;

/****6. Llistar les oficines amb objectiu superior a 600000 € indicant per a cadascuna d’elles 
el nom del director.****/
SELECT o.objectiu, e.nom, e.numemp, o.dir, o.oficina
FROM oficines o
JOIN empleats e ON e.numemp = o.dir
WHERE o.objectiu > 600000;

/****7. Llistar les comandes superiors a 25000 €, incloent el nom de l’empleat que va prendre 
la comanda i el nom del client que ho va sol·licitar (no han d’aparèixer els representants 
que no tenen comandes ni els clients que no tenen comandes)****/

SELECT c.*, e.nom, cli.nom
FROM comanda c
JOIN empleats e ON e.numemp=c.rep_ven
JOIN clients cli ON cli.numclie=c.clie
WHERE c.import_total > 25000;

/****8. Trobar els empleats que van realitzar la seva primera comanda el mateix dia en què 
van ser contractats (si hi ha algun empleat que no ha realitzat cap comanda no ha de 
sortir)****/

/****9. Llistar els empleats amb un salari superior a la del seu cap; per a cada empleat treure 
les seves dades i el número, nom i salari del seu cap (si hi ha algun empleat que no 
tingui cap no ha de sortir).****/

/****10.Llistar els codis dels empleats que tenen una línia de comanda superior a 10000€ o 
que tinguin un salari inferior a 10000€****/