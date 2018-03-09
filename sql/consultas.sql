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

CREATE VIEW `voto_preferencial_certeza` AS
SELECT
  `voto_preferencial`.`diputado_id`,
  `voto_preferencial`.`dpto_id`,
  `voto_preferencial`.`dpto_nombre`,
  `voto_preferencial`.`partido_id`,
  `voto_preferencial`.`partido_nombre`,
  `voto_preferencial`.`diputado_nombre`,
  `voto_preferencial`.`marcas`,
  `actas_disponibles_diputado`.`actas_procesadas` AS `disponibles`,
  CASE WHEN `actas_procesadas_diputado`.`diputado` IS NULL THEN 0 ELSE `actas_procesadas_diputado`.`diputado` END
FROM `voto_preferencial` LEFT JOIN `actas_disponibles_diputado` ON
  `voto_preferencial`.`diputado_id` = `actas_disponibles_diputado`.`diputado`
  LEFT JOIN `actas_procesadas_diputado` ON 
  `voto_preferencial`.`diputado_id` = `actas_procesadas_diputado`.`diputado`

CREATE VIEW `voto_preferencial_certeza` AS
SELECT
  `voto_preferencial`.`diputado_id`,
  `voto_preferencial`.`dpto_id`,
  `voto_preferencial`.`dpto_nombre`,
  `voto_preferencial`.`partido_id`,
  `voto_preferencial`.`partido_nombre`,
  `voto_preferencial`.`diputado_nombre`,
  `voto_preferencial`.`marcas`,
  `actas_disponibles_diputado`.`actas_disponibles` AS `disponibles`,
  (CASE WHEN `actas_procesadas_diputado`.`actas_procesadas` IS NULL THEN 0 ELSE `actas_procesadas_diputado`.`actas_procesadas` END) AS `procesadas`
FROM `voto_preferencial` LEFT JOIN `actas_disponibles_diputado` ON
  `voto_preferencial`.`diputado_id` = `actas_disponibles_diputado`.`diputado`
  LEFT JOIN `actas_procesadas_diputado` ON 
  `voto_preferencial`.`diputado_id` = `actas_procesadas_diputado`.`diputado`

-- Actas procesadas para diputado.
CREATE VIEW `actas_procesadas_diputado` AS
SELECT
  `mejores_concurrentes`.`diputado`,
    COUNT(*) as `actas_procesadas`
FROM
  `mejores_concurrentes`
GROUP BY
  `mejores_concurrentes`.`diputado`

-- Actas procesadas para diputado.
CREATE VIEW `actas_disponibles_diputado` AS
SELECT
  `hash_table`.`diputado`,
    COUNT(*) as `actas_disponibles`
FROM
  `hash_table`
GROUP BY
  `hash_table`.`diputado`

-- Anonimizando origenes
UPDATE `digitaciones` SET `origin`=SHA1(CONCAT('OitdZei3Rm5EQ0MpifPm',`origin`)) WHERE 1

-- Limpieza de valores
UPDATE `hash_table` SET `hashvalue`=NULL,`valid_until`=NULL,`ilegible`=0 WHERE 1

-- Indice para acelerar consultas
ALTER TABLE `hash_table` ADD `random` BIGINT NULL AFTER `ilegible`, ADD INDEX `rnd_idx` (`random`);
-- Set Random IDX
UPDATE `hash_table` SET `random`=RAND()*4000000 WHERE 1