CREATE USER 'db_guest'@'localhost' IDENTIFIED BY '1234';
CREATE USER 'db_user'@'localhost' IDENTIFIED BY '5678';

DROP USER 'db_user'@'localhost';
DROP USER 'db_guest'@'localhost';


GRANT ALL PRIVILEGES ON nome_database.* TO 'nome_utente'@'localhost' IDENTIFIED BY 'password';

GRANT SELECT ON eventilive.eventi TO 'db_guest'@'localhost';
GRANT SELECT ON eventilive.categorie TO 'db_guest'@'localhost';
GRANT SELECT ON eventilive.post TO 'db_guest'@'localhost';
GRANT SELECT ON eventilive.utenti TO 'db_guest'@'localhost';
GRANT INSERT ON eventilive.utenti TO 'db_guest'@'localhost';

GRANT SELECT ON eventilive.categorie TO 'db_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON eventilive.eventi TO 'db_user'@'localhost';
GRANT SELECT, INSERT, DELETE ON eventilive.iscrizioni TO 'db_user'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON eventilive.post TO 'db_user'@'localhost';
GRANT SELECT ON eventilive.utenti TO 'db_user'@'localhost';