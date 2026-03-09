-- Crear el esquema
DROP SCHEMA IF EXISTS `estanciaii`;
CREATE SCHEMA IF NOT EXISTS `estanciaii` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `estanciaii`;

-- Crear tablas en el orden correcto
CREATE TABLE IF NOT EXISTS `estanciaii`.`ProgramaEducativo` (
  `idProgramaEducativo` INT NOT NULL AUTO_INCREMENT,
  `NombreCarrera` VARCHAR(45) NOT NULL COMMENT 'Nombre del programa',
  `ClaveCarrera` VARCHAR(45) NOT NULL COMMENT 'Abreviatura carrera',
  PRIMARY KEY (`idProgramaEducativo`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `estanciaii`.`vigilante` (
  `matriculaV` VARCHAR(20) NOT NULL COMMENT 'Esta variable almacena la matrícula del vigilante',
  `nombreV` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena el nombre del vigilante',
  `apellidosV` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena el apellido del vigilante',
  `generoV` VARCHAR(15) NOT NULL COMMENT 'Esta variable almacena el género del vigilante',
  `fecha_nacV` DATE NOT NULL COMMENT 'Esta variable almacena la fecha de nacimiento del vigilante',
  `contraV` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena la contraseña del vigilante',
  `cargoV` VARCHAR(100) NOT NULL COMMENT 'Esta variable almacena el cargo del vigilante dentro de la institución',
  PRIMARY KEY (`matriculaV`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `estanciaii`.`Multa` (
  `idMulta` INT NOT NULL AUTO_INCREMENT,
  `TipoMulta` VARCHAR(45) NOT NULL COMMENT 'Aquí se almacena el tipo de multa',
  `HorasServicio` INT NOT NULL COMMENT 'Las horas de cada multa',
  PRIMARY KEY (`idMulta`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `estanciaii`.`alumno` (
  `matricula` VARCHAR(20) NOT NULL COMMENT 'Esta variable almacena la matrícula del usuario',
  `nombre` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena el nombre del usuario',
  `apellidos` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena los apellidos del usuario',
  `genero` VARCHAR(15) NOT NULL COMMENT 'Esta variable almacena el género del usuario',
  `fecha_nac` DATE NOT NULL COMMENT 'Esta variable almacena la fecha de nacimiento del usuario',
  `contra` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena la contraseña del usuario',
  `grado` INT(10) NOT NULL COMMENT 'Esta variable almacena el grado del usuario',
  `grupo` VARCHAR(1) NOT NULL COMMENT 'Esta variable almacena el grupo del usuario',
  `idProgramaEducativo` INT,
  PRIMARY KEY (`matricula`),
  CONSTRAINT `fk_alumno_ProgramaEducatico1`
    FOREIGN KEY (`idProgramaEducativo`)
    REFERENCES `estanciaii`.`ProgramaEducativo` (`idProgramaEducativo`)
    on update cascade on delete set null
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `estanciaii`.`Sancion` (
  `idM` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de la sanción',
  `matriculaAlumno` VARCHAR(20) COMMENT 'Matrícula del alumno sancionado',
  `matriculaVigilante` VARCHAR(20) COMMENT 'Matrícula del vigilante que impone la sanción',
  `fecha_multa` DATE NOT NULL COMMENT 'Fecha en que se impone la sanción',
  `descripcion` VARCHAR(255) NOT NULL COMMENT 'Descripción de la razón de la sanción',
  `pagada` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Estatus de pago: 0 = No pagada, 1 = Pagada',
  `avisado` TINYINT(1) DEFAULT 0 COMMENT 'Estatus de visto por el alumno',
  `Multa_idMulta` INT,
  PRIMARY KEY (`idM`),
  CONSTRAINT `multa_ibfk_1`
    FOREIGN KEY (`matriculaAlumno`)
    REFERENCES `estanciaii`.`alumno` (`matricula`)
    on update cascade on delete set null,
  CONSTRAINT `multa_ibfk_2`
    FOREIGN KEY (`matriculaVigilante`)
    REFERENCES `estanciaii`.`vigilante` (`matriculaV`)
    on update cascade on delete set null,
  CONSTRAINT `fk_Sancion_Multa1`
    FOREIGN KEY (`Multa_idMulta`)
    REFERENCES `estanciaii`.`Multa` (`idMulta`)
    on update cascade on delete set null
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `estanciaii`.`Avisos` (
  `idAvisos` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `Categoria` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(500) NOT NULL,
  `vigilante_matriculaV` VARCHAR(20),
  PRIMARY KEY (`idAvisos`),
  CONSTRAINT `fk_Avisos_vigilante1`
    FOREIGN KEY (`vigilante_matriculaV`)
    REFERENCES `estanciaii`.`vigilante` (`matriculaV`)
    ON UPDATE CASCADE
    ON DELETE SET NULL
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `estanciaii`.`administrador` (
  `matriculaA` VARCHAR(20) NOT NULL COMMENT 'Esta variable almacena la matrícula del administrador',
  `nombreA` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena el nombre del administrador',
  `apellidosA` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena el apellido del administrador',
  `fechaNac` DATE NOT NULL COMMENT 'Esta variable almacena la fecha de nacimiento del administrador',
  `generoA` VARCHAR(15) NOT NULL COMMENT 'Esta variable almacena la fecha de nacimiento del administrador',
  `contraA` VARCHAR(50) NOT NULL COMMENT 'Esta variable almacena la contraseña del administrador',
  PRIMARY KEY (`matriculaA`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


-- Registros para la tabla ProgramaEducativo
INSERT INTO ProgramaEducativo (NombreCarrera, ClaveCarrera) VALUES 
('Ingenieria Industrial', 'IND'),
('Ingenieria Quimica', 'IQ'),
('Licenciatura en Turismo', 'LT'),
('Licenciatura en Historia', 'LH'),
('Licenciatura en Filosofia', 'LF'),
('Ingenieria Ambiental', 'IA'),
('Licenciatura en Enfermeria', 'LE'),
('Licenciatura en Biologia', 'LB'),
('Ingenieria en Software', 'ISW'),
('Licenciatura en Matematicas', 'LM');

-- Registros para la tabla Vigilante
INSERT INTO vigilante (matriculaV, nombreV, apellidosV, generoV, fecha_nacV, contraV, cargoV) VALUES 
('VIG1234567', 'Juan', 'Perez', 'Hombre', '1985-05-15', '1', 'Profesor'),
('VIG2345678', 'Maria', 'Lopez', 'Mujer', '1990-06-20', 'contra2', 'Miembro de seguridad'),
('VIG3456789', 'Carlos', 'Martinez', 'Hombre', '1980-07-10', 'contra3', 'Profesor'),
('VIG4567890', 'Ana', 'Gonzalez', 'Mujer', '1995-08-25', 'contra4', 'Profesor'),
('VIG5678901', 'Pedro', 'Hernandez', 'Hombre', '1982-09-30', 'contra5', 'Miembro de Seguridad'),
('VIG6789012', 'Laura', 'Torres', 'Mujer', '1988-10-05', 'contra6', 'Profesor'),
('VIG7890123', 'Jorge', 'Jimenez', 'Hombre', '1992-11-15', 'contra7', 'Miembro de Seguridad'),
('VIG8901234', 'Sofia', 'Mendoza', 'Mujer', '1993-12-20', 'contra8', 'Profesor'),
('VIG9012345', 'Andres', 'Ramirez', 'Hombre', '1989-01-11', 'contra9', 'Administrador Administrativo'),
('VIG0123456', 'Patricia', 'Diaz', 'Mujer', '1991-02-18', 'contra10', 'Administrador Administrativo');
INSERT INTO vigilante (matriculaV, nombreV, apellidosV, generoV, fecha_nacV, contraV, cargoV) VALUES 
('VIG1122334', 'Alberto', 'Quintero', 'Hombre', '1986-07-15', 'contra11', 'Miembro de seguridad'),
('VIG2233445', 'Lucia', 'Morales', 'Mujer', '1991-04-25', 'contra12', 'Profesor'),
('VIG3344556', 'Oscar', 'Villalobos', 'Hombre', '1983-03-12', 'contra13', 'Miembro de seguridad'),
('VIG4455667', 'Veronica', 'Castro', 'Mujer', '1990-01-30', 'contra14', 'Profesor'),
('VIG5566778', 'Ricardo', 'Santos', 'Hombre', '1987-08-05', 'contra15', 'Administrador Administrativo');

-- Registros para la tabla Multa
INSERT INTO Multa (TipoMulta, HorasServicio) VALUES 
('Infraccion', 5),
('Retraso', 3),
('Falta de Asistencia', 10),
('Mal Comportamiento', 8),
('Uso Inadecuado de Instalaciones', 6),
('Desorden', 4),
('Irrespeto a Autoridad', 7),
('Falta a Normas', 2),
('No Entrega de Documentos', 1),
('Comportamiento Inapropiado', 9);
INSERT INTO Multa (TipoMulta, HorasServicio) VALUES 
('Plagio', 12),
('Falsificación', 20),
('Violencia', 15),
('Consumo de Alcohol', 25),
('Daños a Propiedad', 18);


-- Registros para la tabla Alumno
INSERT INTO alumno (matricula, nombre, apellidos, genero, fecha_nac, contra, grado, grupo, idProgramaEducativo) VALUES 
('ALUM123456', 'Luis', 'Ramirez', 'Hombre', '2000-01-01', '1', 2, 'A', 1),
('ALUM234567', 'Claudia', 'Martinez', 'Mujer', '1999-02-02', 'contra2', 3, 'B', 2),
('ALUM345678', 'Fernando', 'Gonzalez', 'Hombre', '1998-03-03', 'contra3', 4, 'C', 3),
('ALUM456789', 'Isabel', 'Lopez', 'Mujer', '2001-04-04', 'contra4', 1, 'D', 4),
('ALUM567890', 'Raul', 'Torres', 'Hombre', '2000-05-05', 'contra5', 2, 'A', 5),
('ALUM678901', 'Monica', 'Hernandez', 'Mujer', '1997-06-06', 'contra6', 3, 'B', 6),
('ALUM789012', 'David', 'Diaz', 'Hombre', '1998-07-07', 'contra7', 4, 'C', 7),
('ALUM890123', 'Patricia', 'Mendoza', 'Mujer', '1999-08-08', 'contra8', 1, 'D', 8),
('ALUM901234', 'Arturo', 'Ramirez', 'Hombre', '2000-09-09', 'contra9', 2, 'A', 9),
('ALUM012345', 'Laura', 'Jimenez', 'Mujer', '1998-10-10', 'contra10', 3, 'B', 10);
INSERT INTO alumno (matricula, nombre, apellidos, genero, fecha_nac, contra, grado, grupo, idProgramaEducativo) VALUES
('ALUM000001', 'Luis', 'Ramirez', 'Hombre', '2000-01-01', 'contra1', 2, 'A', 1),
('ALUM000002', 'Claudia', 'Martinez', 'Mujer', '1999-02-02', 'contra2', 3, 'B', 2),
('ALUM000003', 'Fernando', 'Gonzalez', 'Hombre', '1998-03-03', 'contra3', 4, 'C', 3),
('ALUM000004', 'Isabel', 'Lopez', 'Mujer', '2001-04-04', 'contra4', 1, 'D', 4),
('ALUM000005', 'Raul', 'Torres', 'Hombre', '2000-05-05', 'contra5', 2, 'A', 5),
('ALUM000006', 'Monica', 'Hernandez', 'Mujer', '1997-06-06', 'contra6', 3, 'B', 6),
('ALUM000007', 'David', 'Diaz', 'Hombre', '1998-07-07', 'contra7', 4, 'C', 7),
('ALUM000008', 'Patricia', 'Mendoza', 'Mujer', '1999-08-08', 'contra8', 1, 'D', 8),
('ALUM000009', 'Arturo', 'Ramirez', 'Hombre', '2000-09-09', 'contra9', 2, 'A', 9),
('ALUM000010', 'Laura', 'Jimenez', 'Mujer', '1998-10-10', 'contra10', 3, 'B', 10),
('ALUM000011', 'Javier', 'Lopez', 'Hombre', '2001-11-10', 'contra11', 3, 'C', 1),
('ALUM000012', 'Ana', 'Mendez', 'Mujer', '1998-03-15', 'contra12', 2, 'B', 2),
('ALUM000013', 'Jose', 'Martinez', 'Hombre', '2002-07-20', 'contra13', 1, 'D', 3),
('ALUM000014', 'Maria', 'Hernandez', 'Mujer', '1997-04-30', 'contra14', 4, 'A', 4),
('ALUM000015', 'Rafael', 'Dominguez', 'Hombre', '2003-02-14', 'contra15', 2, 'C', 5),
('ALUM000016', 'Carolina', 'Perez', 'Mujer', '1999-05-25', 'contra16', 3, 'D', 6),
('ALUM000017', 'Miguel', 'Ruiz', 'Hombre', '2001-08-10', 'contra17', 4, 'B', 7),
('ALUM000018', 'Andrea', 'Castro', 'Mujer', '1998-12-01', 'contra18', 1, 'A', 8),
('ALUM000019', 'Francisco', 'Garcia', 'Hombre', '1999-03-22', 'contra19', 3, 'C', 9),
('ALUM000020', 'Sofia', 'Ortiz', 'Mujer', '2000-06-15', 'contra20', 2, 'B', 10),
('ALUM000021', 'Guillermo', 'Morales', 'Hombre', '2001-09-18', 'contra21', 4, 'D', 1),
('ALUM000022', 'Angela', 'Navarro', 'Mujer', '1998-11-12', 'contra22', 2, 'C', 2),
('ALUM000023', 'Roberto', 'Quintero', 'Hombre', '2003-01-25', 'contra23', 3, 'B', 3),
('ALUM000024', 'Carmen', 'Torres', 'Mujer', '1999-07-07', 'contra24', 4, 'A', 4),
('ALUM000025', 'Juan', 'Diaz', 'Hombre', '1998-05-17', 'contra25', 1, 'C', 5),
('ALUM000026', 'Sandra', 'Jimenez', 'Mujer', '2001-10-22', 'contra26', 3, 'B', 6),
('ALUM000027', 'Eduardo', 'Lopez', 'Hombre', '1997-04-09', 'contra27', 4, 'D', 7),
('ALUM000028', 'Marcela', 'Ramirez', 'Mujer', '2000-03-13', 'contra28', 2, 'A', 8),
('ALUM000029', 'Oscar', 'Garcia', 'Hombre', '1999-01-02', 'contra29', 3, 'C', 9),
('ALUM000030', 'Valeria', 'Perez', 'Mujer', '2003-06-05', 'contra30', 1, 'B', 10),
('ALUM000031', 'Daniel', 'Sanchez', 'Hombre', '1998-08-23', 'contra31', 4, 'D', 1),
('ALUM000032', 'Liliana', 'Gonzalez', 'Mujer', '1997-11-10', 'contra32', 3, 'A', 2),
('ALUM000033', 'Victor', 'Hernandez', 'Hombre', '2000-12-25', 'contra33', 1, 'C', 3),
('ALUM000034', 'Clara', 'Diaz', 'Mujer', '1999-09-15', 'contra34', 4, 'B', 4),
('ALUM000035', 'Ernesto', 'Dominguez', 'Hombre', '2001-02-18', 'contra35', 2, 'D', 5),
('ALUM000036', 'Beatriz', 'Ortiz', 'Mujer', '1998-05-12', 'contra36', 3, 'C', 6),
('ALUM000037', 'Leonardo', 'Garcia', 'Hombre', '2000-03-30', 'contra37', 4, 'B', 7),
('ALUM000038', 'Susana', 'Lopez', 'Mujer', '1997-06-14', 'contra38', 1, 'A', 8),
('ALUM000039', 'Mauricio', 'Ramirez', 'Hombre', '1999-11-19', 'contra39', 3, 'C', 9),
('ALUM000040', 'Elena', 'Gonzalez', 'Mujer', '2002-09-07', 'contra40', 2, 'D', 10),
('ALUM000041', 'Ricardo', 'Jimenez', 'Hombre', '1998-10-20', 'contra41', 4, 'B', 1),
('ALUM000042', 'Rosa', 'Hernandez', 'Mujer', '2001-08-11', 'contra42', 3, 'C', 2),
('ALUM000043', 'Martin', 'Perez', 'Hombre', '1997-02-16', 'contra43', 2, 'A', 3),
('ALUM000044', 'Lorena', 'Diaz', 'Mujer', '2000-12-01', 'contra44', 4, 'D', 4),
('ALUM000045', 'Cristian', 'Gomez', 'Hombre', '2003-05-15', 'contra45', 1, 'C', 5),
('ALUM000046', 'Paola', 'Morales', 'Mujer', '1998-07-20', 'contra46', 3, 'B', 6),
('ALUM000047', 'Felipe', 'Garcia', 'Hombre', '1999-03-05', 'contra47', 2, 'A', 7),
('ALUM000048', 'Natalia', 'Navarro', 'Mujer', '2001-10-17', 'contra48', 4, 'C', 8),
('ALUM000049', 'Hugo', 'Santos', 'Hombre', '1997-09-09', 'contra49', 3, 'B', 9),
('ALUM000050', 'Adriana', 'Torres', 'Mujer', '2000-02-13', 'contra50', 1, 'A', 10),
('ALUM000051', 'Diego', 'Ruiz', 'Hombre', '1998-11-30', 'contra51', 2, 'C', 1),
('ALUM000052', 'Raquel', 'Castro', 'Mujer', '1999-01-12', 'contra52', 4, 'B', 2),
('ALUM000053', 'Francisco', 'Ortiz', 'Hombre', '2000-03-25', 'contra53', 3, 'D', 3),
('ALUM000054', 'Karina', 'Dominguez', 'Mujer', '1997-05-16', 'contra54', 1, 'C', 4),
('ALUM000055', 'Luis', 'Martinez', 'Hombre', '2001-06-10', 'contra55', 4, 'A', 5),
('ALUM000056', 'Sonia', 'Quintero', 'Mujer', '1998-08-08', 'contra56', 3, 'B', 6),
('ALUM000057', 'Victor', 'Gomez', 'Hombre', '1999-02-19', 'contra57', 2, 'C', 7),
('ALUM000058', 'Laura', 'Garcia', 'Mujer', '2000-07-14', 'contra58', 4, 'D', 8),
('ALUM000059', 'Oscar', 'Hernandez', 'Hombre', '1997-09-22', 'contra59', 1, 'A', 9),
('ALUM000060', 'Liliana', 'Ramirez', 'Mujer', '2003-03-17', 'contra60', 3, 'B', 10),
('ALUM000061', 'Felipe', 'Lopez', 'Hombre', '1998-11-11', 'contra61', 2, 'D', 1),
('ALUM000062', 'Valeria', 'Perez', 'Mujer', '1999-05-05', 'contra62', 4, 'C', 2),
('ALUM000063', 'Ernesto', 'Ortiz', 'Hombre', '2001-12-10', 'contra63', 3, 'B', 3),
('ALUM000064', 'Paola', 'Santos', 'Mujer', '2000-09-03', 'contra64', 1, 'D', 4),
('ALUM000065', 'Juan', 'Garcia', 'Hombre', '1997-08-14', 'contra65', 4, 'C', 5),
('ALUM000066', 'Ana', 'Diaz', 'Mujer', '2003-01-21', 'contra66', 3, 'A', 6),
('ALUM000067', 'David', 'Ramirez', 'Hombre', '1998-06-25', 'contra67', 2, 'B', 7),
('ALUM000068', 'Isabel', 'Lopez', 'Mujer', '1999-10-20', 'contra68', 4, 'D', 8),
('ALUM000069', 'Ricardo', 'Hernandez', 'Hombre', '2000-12-15', 'contra69', 3, 'C', 9),
('ALUM000070', 'Sofia', 'Perez', 'Mujer', '1997-02-05', 'contra70', 2, 'A', 10);


-- Registros para la tabla Sancion
INSERT INTO Sancion (matriculaAlumno, matriculaVigilante, fecha_multa, descripcion, pagada, Multa_idMulta) VALUES 
('ALUM123456', 'VIG1234567', '2024-10-01', 'Infraccion de normas', 0, 1),
('ALUM234567', 'VIG2345678', '2024-10-02', 'Retraso en entrega', 1, 2),
('ALUM345678', 'VIG3456789', '2024-10-03', 'Falta de asistencia', 0, 3),
('ALUM456789', 'VIG4567890', '2024-10-04', 'Mal comportamiento', 1, 4),
('ALUM567890', 'VIG5678901', '2024-10-05', 'Uso inadecuado de instalaciones', 0, 5),
('ALUM678901', 'VIG6789012', '2024-10-06', 'Desorden en clase', 0, 6),
('ALUM789012', 'VIG7890123', '2024-10-07', 'Irrespeto a autoridad', 1, 7),
('ALUM890123', 'VIG8901234', '2024-10-08', 'Falta a normas', 0, 8),
('ALUM901234', 'VIG9012345', '2024-10-09', 'No entrega de documentos', 0, 9),
('ALUM012345', 'VIG0123456', '2024-10-10', 'Comportamiento inapropiado', 1, 10);
INSERT INTO Sancion (matriculaAlumno, matriculaVigilante, fecha_multa, descripcion, pagada, Multa_idMulta) VALUES
('ALUM000001', 'VIG1234567', '2024-01-15', 'Falta a normas de conducta', 0, 1),
('ALUM000002', 'VIG2345678', '2024-01-15', 'Retraso en entrega de proyecto', 1, 2),
('ALUM000003', 'VIG3456789', '2024-01-15', 'Uso indebido de instalaciones', 0, 3),
('ALUM000004', 'VIG4567890', '2024-01-20', 'Mal comportamiento en clase', 1, 4),
('ALUM000005', 'VIG5678901', '2024-01-20', 'Falsificación de documentos', 0, 5),
('ALUM000006', 'VIG6789012', '2024-01-25', 'Consumo de sustancias prohibidas', 1, 6),
('ALUM000007', 'VIG7890123', '2024-01-25', 'Violencia en el campus', 0, 7),
('ALUM000008', 'VIG8901234', '2024-01-25', 'No entrega de documentos', 1, 8),
('ALUM000009', 'VIG9012345', '2024-01-30', 'Irrespeto a autoridad', 0, 9),
('ALUM000010', 'VIG0123456', '2024-01-30', 'Plagio en exámenes', 1, 10),
('ALUM000011', 'VIG1122334', '2024-01-30', 'Desorden en biblioteca', 0, 1),
('ALUM000012', 'VIG2233445', '2024-02-01', 'Falta de asistencia', 1, 2),
('ALUM000013', 'VIG3344556', '2024-02-01', 'Retraso en pago de cuotas', 0, 3),
('ALUM000014', 'VIG4455667', '2024-02-05', 'Uso indebido de equipo', 1, 4),
('ALUM000015', 'VIG5566778', '2024-02-05', 'Violación de normas de seguridad', 0, 5),
('ALUM000016', 'VIG1234567', '2024-02-10', 'Daño a propiedad del campus', 1, 6),
('ALUM000017', 'VIG2345678', '2024-02-10', 'Acoso escolar', 0, 7),
('ALUM000018', 'VIG3456789', '2024-02-15', 'Falta en normas de convivencia', 1, 8),
('ALUM000019', 'VIG4567890', '2024-02-15', 'Falsificación de permisos', 0, 9),
('ALUM000020', 'VIG5678901', '2024-02-20', 'Mal uso de recursos', 1, 10),
('ALUM000021', 'VIG6789012', '2024-02-20', 'Irrespeto a compañeros', 0, 1),
('ALUM000022', 'VIG7890123', '2024-02-25', 'Incumplimiento en entrega de tareas', 1, 2),
('ALUM000023', 'VIG8901234', '2024-02-25', 'Uso indebido de dispositivos electrónicos', 0, 3),
('ALUM000024', 'VIG9012345', '2024-02-28', 'Falta de respeto al profesor', 1, 4),
('ALUM000025', 'VIG0123456', '2024-02-28', 'Desobediencia en el aula', 0, 5),
('ALUM000026', 'VIG1122334', '2024-03-01', 'Irresponsabilidad en horarios', 1, 6),
('ALUM000027', 'VIG2233445', '2024-03-01', 'Uso indebido de las instalaciones deportivas', 0, 7),
('ALUM000028', 'VIG3344556', '2024-03-05', 'Violación de reglamento interno', 1, 8),
('ALUM000029', 'VIG4455667', '2024-03-05', 'Plagio de trabajos académicos', 0, 9),
('ALUM000030', 'VIG5566778', '2024-03-10', 'Uso inadecuado de uniformes', 1, 10),
('ALUM000031', 'VIG1234567', '2024-03-10', 'Retraso constante', 0, 1),
('ALUM000032', 'VIG2345678', '2024-03-15', 'Uso de lenguaje ofensivo', 1, 2),
('ALUM000033', 'VIG3456789', '2024-03-15', 'Incumplimiento en proyectos', 0, 3),
('ALUM000034', 'VIG4567890', '2024-03-20', 'Falta en prácticas académicas', 1, 4),
('ALUM000035', 'VIG5678901', '2024-03-20', 'Uso indebido de laboratorios', 0, 5),
('ALUM000036', 'VIG6789012', '2024-03-25', 'Incumplimiento en normas de puntualidad', 1, 6),
('ALUM000037', 'VIG7890123', '2024-03-25', 'Desobediencia durante simulacros', 0, 7),
('ALUM000038', 'VIG8901234', '2024-03-30', 'Falta de respeto al personal administrativo', 1, 8),
('ALUM000039', 'VIG9012345', '2024-03-30', 'Incumplimiento en actividades extracurriculares', 0, 9),
('ALUM000040', 'VIG0123456', '2024-04-01', 'Descuido en materiales asignados', 1, 10),
('ALUM000041', 'VIG1122334', '2024-04-01', 'Inadecuado uso de tecnologías', 0, 1),
('ALUM000042', 'VIG2233445', '2024-04-05', 'Consumo de sustancias durante actividades', 1, 2),
('ALUM000043', 'VIG3344556', '2024-04-05', 'Negligencia en actividades grupales', 0, 3),
('ALUM000044', 'VIG4455667', '2024-04-10', 'Violación en reglamento de biblioteca', 1, 4),
('ALUM000045', 'VIG5566778', '2024-04-10', 'Falta a la asistencia obligatoria', 0, 5),
('ALUM000046', 'VIG1234567', '2024-04-15', 'Desobediencia durante clases virtuales', 1, 6),
('ALUM000047', 'VIG2345678', '2024-04-15', 'Mal uso de becas escolares', 0, 7),
('ALUM000048', 'VIG3456789', '2024-04-20', 'Desobediencia a supervisores', 1, 8),
('ALUM000049', 'VIG4567890', '2024-04-20', 'Acoso hacia compañeros', 0, 9),
('ALUM000050', 'VIG5678901', '2024-04-25', 'Irrespeto hacia normas éticas', 1, 10),
('ALUM000051', 'VIG6789012', '2024-05-01', 'Desobediencia durante actividades académicas', 0, 1),
('ALUM000052', 'VIG7890123', '2024-05-01', 'Negligencia en cuidado de recursos', 1, 2),
('ALUM000053', 'VIG8901234', '2024-05-05', 'Participación en actividades sin autorización', 0, 3),
('ALUM000054', 'VIG9012345', '2024-05-05', 'Falsificación de reportes académicos', 1, 4),
('ALUM000055', 'VIG0123456', '2024-05-10', 'Irresponsabilidad en compromisos', 0, 5),
('ALUM000056', 'VIG1122334', '2024-05-10', 'Uso inadecuado de recursos escolares', 1, 6),
('ALUM000057', 'VIG2233445', '2024-05-15', 'Desobediencia en actividades de grupo', 0, 7),
('ALUM000058', 'VIG3344556', '2024-05-15', 'Acoso verbal a compañeros', 1, 8),
('ALUM000059', 'VIG4455667', '2024-05-20', 'Violación en reglamento ético', 0, 9),
('ALUM000060', 'VIG5566778', '2024-05-20', 'Retraso en cumplimiento de actividades', 1, 10),
('ALUM000061', 'VIG1234567', '2024-05-25', 'Uso indebido de equipo escolar', 0, 1),
('ALUM000062', 'VIG2345678', '2024-05-25', 'Retraso en pagos', 1, 2),
('ALUM000063', 'VIG3456789', '2024-05-30', 'Plagio en proyectos', 0, 3),
('ALUM000064', 'VIG4567890', '2024-05-30', 'Irrespeto hacia autoridades', 1, 4),
('ALUM000065', 'VIG5678901', '2024-06-01', 'Comportamiento inadecuado en actos escolares', 0, 5),
('ALUM000066', 'VIG6789012', '2024-06-01', 'Negligencia en actividades deportivas', 1, 6),
('ALUM000067', 'VIG7890123', '2024-06-05', 'Uso indebido de redes institucionales', 0, 7),
('ALUM000068', 'VIG8901234', '2024-06-05', 'Incumplimiento en normas de conducta', 1, 8),
('ALUM000069', 'VIG9012345', '2024-06-10', 'Falta a asistencia obligatoria', 0, 9),
('ALUM000070', 'VIG0123456', '2024-06-10', 'Desobediencia en reglas académicas', 1, 10);



-- Registros para la tabla Administrador
INSERT INTO administrador (matriculaA, nombreA, apellidosA, fechaNac, generoA, contraA) VALUES 
('MDEO220054', 'Ethan', 'Millan', '1983-03-15', 'Hombre', '1'),
('ADM2345678', 'Ana', 'Rivera', '1985-06-20', 'Mujer', 'contra2'),
('ADM3456789', 'Roberto', 'Sanchez', '1980-12-11', 'Hombre', 'contra3'),
('ADM4567890', 'Paola', 'Gutierrez', '1992-08-05', 'Mujer', 'contra4'),
('ADM5678901', 'Luis', 'Dominguez', '1988-10-10', 'Hombre', 'contra5');


-- Avisos

INSERT INTO Avisos (Titulo, Fecha, Categoria, Descripcion, vigilante_matriculaV) VALUES 
('Cierre de Biblioteca', '2024-01-10', 'Baja', 'La biblioteca cerrará por mantenimiento.', 'VIG1234567'),
('Actualización de Reglamento', '2024-02-05', 'Media', 'Se han actualizado las normas de convivencia.', 'VIG2233445'),
('Cambio de Horario', '2024-11-15', 'Alta', 'Se implementarán nuevos horarios para el semestre.', 'VIG5566778');

