--elenco degli eventi già svolti, in ordine alfabetico di provincia

SELECT * 
FROM eventi
WHERE eventi.data_inizio < CURDATE() OR (eventi.data_inizio = CURDATE() AND eventi.ora <  CURTIME())
ORDER BY provincia;

-- elenco dei membri che non hanno mai inserito un commento

SELECT * 
FROM utenti
WHERE id_utente NOT IN 
(SELECT id_utente FROM post)


SELECT *
FROM utenti
LEFT JOIN post ON utenti.id_utente = post.id_utente
WHERE id_evento IS NULL;

-- per ogni evento il voto medio ottenuto in ordine di categoria e titolo


SELECT *
FROM
(SELECT id_categoria, titolo, AVG(post.voto)
FROM eventi 
INNER JOIN post ON eventi.id_evento = post.id_evento
GROUP BY eventi.id_evento) AS t
INNER JOIN categorie ON categorie.id_categoria = t.id_categoria
ORDER BY nome_categoria, titolo;



-- per ogni evento il voto medio ottenuto in ordine di categoria e titolo -CORRETTA


SELECT eventi.titolo, AVG(post.voto), categorie.nome_categoria
FROM eventi e
INNER JOIN post p ON e.id_evento = p.id_evento
INNER JOIN categorie c ON e.id_categoria = c.id_categoria
GROUP BY e.titolo,  c.nome_categoria
ORDER BY c.nome_categoria, e.titolo;


-- i dati dell'utente che ha registrato il maggior numero di eventi


SELECT * 
FROM utenti
INNER JOIN 
(SELECT eventi.id_registrante, COUNT(eventi.id_registrante) AS contoEventi
FROM eventi 
GROUP BY eventi.id_registrante) AS eventiUtente
ON utenti.id_utente = eventiUtente.id_registrante
WHERE eventiUtente.contoEventi = (SELECT MAX(t.contoEventi) AS contoMassimo
FROM(SELECT eventi.id_registrante, COUNT(eventi.id_registrante) AS contoEventi
FROM eventi 
GROUP BY eventi.id_registrante) AS t)


--NEWSLETTER elenco eventiinserendo id_utente

SELECT titolo, città, luogo, provincia, data_inizio, ora
FROM eventi
INNER JOIN categorie ON eventi.id_categoria = categorie.id_categoria
INNER JOIN iscrizioni ON categorie.id_categoria = iscrizioni.id_categoria
WHERE eventi.data_inizio BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
AND id_utente = 1;






--descrizione evento

SELECT titolo, città, luogo, data_inizio, ora, provincia, nome_categoria, nickname, email FROM eventi AS e
INNER JOIN categorie AS c ON c.id_categoria = e.id_categoria
INNER JOIN utenti AS u ON e.id_registrante = u.id_utente
WHERE e.id_evento = ? 





______________________________________________________________________________________________________________________




SELECT titolo, città, luogo, data_inizio, ora, provincia, immagine
FROM eventi 
WHERE id_utente = ?