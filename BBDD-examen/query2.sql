/***Realizad sobre la base de datos “vuelos” las siguientes consultas:  ***/

/*1. Añadir un nuevo empleado con DNI 12345678R que se llama Joan Soler Pineda y
es Director general. */
INSERT INTO empleados (DNI, Nombre, Apellidos, CategoriaProfesional) 
VALUES ('12345678R', 'Joan', 'Soler Pineda', 'Director General');

/* 2. Añadir el nuevo empleado al vuelo con identificador 12 ocupando el puesto de
Piloto.*/
INSERT INTO tripulacion (IdVuelo, IdEmpleado, PuestoOcupado) 
VALUES (12, 101, 'Piloto');

/* 3. Listado de vuelos con origen en Pemuco o San Pedro con fecha de salida posterior
al 2017-12-01.*/
SELECT * 
FROM vuelo 
WHERE Origen = 'Pemuco' OR Origen = 'San Pedro' AND Fecha > '2017-12-01';

/*4. Listado de aviones cuya autonomía es más grande que 4.*/
SELECT *
FROM avion
WHERE AutonomiaVuelo > 4;

/*5. Lista el nombre , apellidos, dni y puesto ocupado de la tripulación del vuelo con id
99. */
SELECT e.Nombre, e.Apellidos, e.DNI, t.PuestoOcupado
FROM empleados e
JOIN tripulacion t ON t.IdEmplead = e.IdEmpleado
WHERE t.IdVuelo = 99;

/*6. Lista el nombre, el apellido y el asiento de los pasajeros cuyo nombre comienza por
H y viajaron en el vuelo con identificador 77.*/
SELECT pasajeros.Nombre, pasajeros.Apellidos, pasaje.Asiento
FROM pasajeros
JOIN pasaje ON pasaje.IdPasajero = pasajeros.IdPasajero
WHERE pasajeros.Nombre LIKE 'H%' AND pasaje.IdVuelo = 77;

/*7. Lista el nombre, apellidos y dni de los pasajeros de vuelos con origen Bellevue.
Mostrad el resultado ordenado por apellido de la Z→A.*/
SELECT pasajeros.Nombre, pasajeros.Apellidos, pasajeros.DNI
FROM pasajeros
JOIN pasaje ON pasaje.IdPasajero = pasajeros.IdPasajero
JOIN vuelo ON pasaje.IdVuelo=vuelo.IdVuelo
WHERE vuelo.Origen='Bellevue'
order by pasajeros.Apellidos DESC;

/*8. Listado de aviones con información sobre el número de vuelos que haya realizado
(deben aparecer incluso los aviones que no hayan realizado ningún vuelo ).*/
SELECT count(vuelo.IdVuelo) AS cantidadVuelos, avion.*
FROM avion
LEFT JOIN vuelo ON avion.IdAvion=vuelo.IdAvion
GROUP BY vuelo.IdAvion
ORDER BY avion.IdAvion;

/*9. Listar el nombre de los pasajeros y el nombre de los empleados que han compartido
vuelo en un avión del fabricante Airbus. Queremos que la columna nombre del
pasajero sea renombrada por Pasajero y la columna nombre del empleado por
Empleado, además deberá estar ordenado por el nombre del pasajero A→Z.*/

SELECT pasajeros.Nombre AS Pasajero, empleados.Nombre AS Empleado
FROM vuelo
JOIN tripulacion ON vuelo.IdVuelo=tripulacion.IdVuelo
JOIN empleados ON tripulacion.IdEmpleado= empleados.IdEmpleado
JOIN pasaje ON vuelo.IdVuelo=pasaje.IdVuelo
JOIN pasajeros ON pasaje.IdPasajero=pasajeros.IdPasajero
ORDER BY pasajeros.Nombre;


/*10. Lista de los aviones del fabricante Boeing para los cuales la capacidad supera la
capacidad del avión con matrícula 03020 del mismo fabricante.(subconsulta)*/
SELECT *
FROM avion a
WHERE a.Fabricante='Boeing' 
AND a.Capacidad > (SELECT a.Capacidad
FROM avion a
WHERE a.Matricula=03020);

/*11. Listado de aviones que no han realizado ningún vuelo. (subconsulta) */
SELECT *
FROM avion a
WHERE a.IdAvion NOT IN (
    SELECT v.IdAvion
    FROM vuelo v
);

/*12. Listado de empleados cuyo número de vuelos sea superior a 2. (subconsulta)*/
SELECT e.*
FROM empleados e
WHERE e.IdEmpleado IN (
    SELECT t.IdEmpleado
    FROM tripulacion t
    GROUP BY t.IdEmpleado
    HAVING COUNT(t.IdVuelo) > 2
);


/*13. Borrar los aviones que no tiene asignado ninguna tripulación.*/



/*14. Bajar un 10% la autonomía de los aviones que han realizado más de 2 vuelos */
UPDATE avion
SET autonomia = autonomia * 0.9
WHERE IdAvion IN (
    SELECT v.IdAvion
    FROM vuelo v
    GROUP BY v.IdAvion
    HAVING COUNT(v.IdAvion) > 2
);

