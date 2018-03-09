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

-- Mejor conjunto de concurrentes:
CREATE VIEW `mejores_concurrentes` AS
SELECT
  `concurrentes_validados`.*
FROM
  `concurrentes_validados` LEFT JOIN `ambiguos` ON
  `concurrentes_validados`.`acta_id`=`ambiguos`.`acta_id` AND
  `concurrentes_validados`.`diputado`=`ambiguos`.`diputado`
WHERE
  `ambiguos`.`diputado` IS NULL

-- Detalle de todos los diputados
CREATE VIEW `detalle_diputados` AS
SELECT
 `departamentos`.`id` as `dpto_id`,
 `departamentos`.`nombre` as `dpto_nombre`,
 `partidos`.`id` as `partido_id`,
 `partidos`.`nombre` as `partido_nombre`,
 `diputados`.`id` as `diputado_id`,
 `diputados`.`nombre` as `diputado_nombre`
FROM `diputados` INNER JOIN `departamentos` ON
  `diputados`.`departamento_id` = `departamentos`.`id`
    INNER JOIN `partidos` ON
    `diputados`.`partido_id` = `partidos`.`id`

-- Conteo de marcas
CREATE VIEW `voto_preferencial` AS
SELECT
  `detalle_diputados`.`diputado_id`,
  `detalle_diputados`.`dpto_id`,
  `detalle_diputados`.`dpto_nombre`,
  `detalle_diputados`.`partido_id`,
  `detalle_diputados`.`partido_nombre`,
  `detalle_diputados`.`diputado_nombre`,
    SUM(`mejores_concurrentes`.`digitado`) AS `marcas`
FROM
  `detalle_diputados` INNER JOIN `mejores_concurrentes` ON
    `detalle_diputados`.`diputado_id` = `mejores_concurrentes`.`diputado`
GROUP BY
  `detalle_diputados`.`diputado_id`,
  `detalle_diputados`.`dpto_id`,
  `detalle_diputados`.`dpto_nombre`,
  `detalle_diputados`.`partido_id`,
  `detalle_diputados`.`partido_nombre`
    
-- Anonimizando origenes
UPDATE `digitaciones` SET `origin`=SHA1(CONCAT('OitdZei3Rm5EQ0MpifPm',`origin`)) WHERE 1

-- Limpieza de valores
UPDATE `hash_table` SET `hashvalue`=NULL,`valid_until`=NULL,`ilegible`=0 WHERE 1

-- Indice para acelerar consultas
ALTER TABLE `hash_table` ADD `random` BIGINT NULL AFTER `ilegible`, ADD INDEX `rnd_idx` (`random`);
-- Set Random IDX
UPDATE `hash_table` SET `random`=RAND()*4000000 WHERE 1