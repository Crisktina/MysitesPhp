-- Creació d'usuari
CREATE USER 'usuari'@'localhost' IDENTIFIED BY 'passwd';

-- Privilegis totals per l'usuari
GRANT ALL PRIVILEGES ON * . * TO 'usuari'@'localhost' IDENTIFIED BY 'passwd' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

