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
    `freq`>=3

--System Reset
UPDATE `hash_table` SET `hashvalue`=NULL,`valid_until`=NULL,`completed`=0,`ilegible`=0 WHERE 1=1
