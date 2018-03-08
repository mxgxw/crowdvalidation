-- Obtiene las digitaciones concurrentes para cada JR
-- Filtra las 
SELECT
    `acta_id`,
    `diputado`,
    `digitado`,
    COUNT(*) AS `freq`
FROM
    `digitaciones`
GROUP BY
    `acta_id`,
    `diputado`,
    `digitado`
HAVING
    `freq`>3
