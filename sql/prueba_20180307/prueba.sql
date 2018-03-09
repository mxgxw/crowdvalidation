-- Seleccion de estimaciones concurrentes
CREATE VIEW `concurrentes_20180307222300` AS
SELECT
    `acta_id`,
    `diputado`,
    `digitado`,
    COUNT(*) AS `freq`
FROM
    `digitaciones_20180307222300`
GROUP BY
    `acta_id`,
    `diputado`,
    `digitado`
HAVING
`freq`>=3

-- Seleccion de estimaciones ambiguas
CREATE VIEW `ambiguos20180307222300` AS
SELECT
  `acta_id`,
  `diputado`,
  COUNT(*) as `duplicados`
FROM `concurrentes_20180307222300`
GROUP BY
  `acta_id`,
  `diputado`
HAVING
    `duplicados`>1

-- Calculo de marcas independientes
SELECT
  SUM(`digitado`)
FROM `concurrentes_20180307222300`
WHERE
  `acta_id` NOT IN (
  SELECT `acta_id` FROM `ambiguos20180307222300` 
  )
