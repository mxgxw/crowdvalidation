-- Obtiene las digitaciones concurrentes para cada JRV
CREATE VIEW `concurrentes` AS
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

-- Selecciona solo validaciones con más de 3 digitaciones concurrentes
CREATE VIEW `concurrentes_validados` AS
SELECT
    `acta_id`,
    `diputado`,
    `digitado`,
    `freq`
FROM 
    `concurrentes`
WHERE
    `freq`>=3

CREATE VIEW `ambiguos` AS
SELECT
  `acta_id`,
  `diputado`,
  COUNT(*) as `duplicados`
FROM `concurrentes_validados`
GROUP BY
  `acta_id`,
  `diputado`
HAVING
    `duplicados`>1

--System Reset
UPDATE `hash_table` SET `hashvalue`=NULL,`valid_until`=NULL,`completed`=0,`ilegible`=0 WHERE 1=1

--Consultas individuales concurrentes (validadas)
SELECT
  `concurrentes_validados`.*
FROM
  `concurrentes_validados` LEFT JOIN `ambiguos` ON
  `concurrentes_validados`.`acta_id`=`ambiguos`.`acta_id` AND
  `concurrentes_validados`.`diputado`=`ambiguos`.`diputado`
WHERE
  `ambiguos`.`diputado` IS NULL