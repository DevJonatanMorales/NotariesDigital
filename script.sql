-- tabla para los diferentes usuario --
CREATE TABLE tipo_user 
(
  tipo_userid INT NOT NULL,
  tipo VARCHAR(20) NOT NULL,
  PRIMARY KEY (tipo_userid)
);
-- INSERT TABLE TIPO USUARIO --
INSERT INTO `tipo_user`(`tipo_userid`, `tipo`) VALUES (1,'administrador'), (2, 'abogado'), (3, 'cliente');
--estado usuario--
CREATE TABLE estado_user
(
  estado_id INT,
  estado VARCHAR(100),
  PRIMARY KEY (estado_id)
);
-- INSERT TABLE TIPO ESTADO USER --
INSERT INTO `estado_user` (`estado_id`, `estado`) VALUES ('1','activo'),('2','inactivo');
--consultas--
SELECT usuarios.foto, usuarios.user, abogados.nombres, estado_user.estado FROM usuarios INNER JOIN abogados ON usuarios.usuario_id=abogados.usuario_id INNER JOIN estado_user ON usuarios.estado_id=estado_user.estado_id;

SELECT usuarios.foto, usuarios.user, clientes.nombres, estado_user.estado FROM usuarios INNER JOIN clientes ON usuarios.usuario_id=clientes.usuario_id INNER JOIN estado_user ON usuarios.estado_id=estado_user.estado_id;
-- tabla usuario --
CREATE TABLE usuarios
(
  usuario_id INT NOT NULL AUTO_INCREMENT,
  tipo_userid INT,
  estado_id INT,
  foto VARCHAR(150),
  user VARCHAR(15),
  pass VARCHAR(100),
  email VARCHAR(150),
  codigo_pass CHAR(8),
  fech_pass DATE,
  PRIMARY KEY (usuario_id),
  INDEX(tipo_userid),
  FOREIGN KEY (tipo_userid) REFERENCES tipo_user(tipo_userid),
  FOREIGN KEY (estado_id) REFERENCES estado_user(estado_id)
);
-- cliente --
CREATE TABLE clientes
(
  cliente_id INT NOT NULL,
  usuario_id INT,
  nombres VARCHAR(60),
  apellidos VARCHAR(60),
  genero VARCHAR(10),
  fech_naci DATE,
  telefono INT(10),
  direccion TEXT(200),
  PRIMARY KEY (cliente_id),
  UNIQUE(usuario_id),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);
-- abogados --
CREATE TABLE abogados
(
  abogado_id INT NOT NULL,
  usuario_id INT,
  nombres VARCHAR(60),
  apellidos VARCHAR(60),
  genero VARCHAR(10),
  fech_naci DATE,
  telefono INT(10),
  direccion TEXT(200),
  PRIMARY KEY (abogado_id),
  UNIQUE(usuario_id),
  FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);
-- categoria de servicios --
CREATE TABLE areas
(
  areas_id INT NOT NULL AUTO_INCREMENT,
  areas VARCHAR(25),
  PRIMARY KEY (areas_id)
);
-- INSERT TABLA AREAS --
INSERT INTO `areas`(`areas_id`, `areas`) VALUES (1, 'Derecho de familia'), (2, 'Derecho civil y mercantil'), (3, 'Derecho notarial'), (4, 'Importación y tramitación de vehículos');
-- ESTADO SERVICIO --
CREATE TABLE estado_servicio
(
  estado_servicio INT NOT NULL AUTO_INCREMENT,
  estado VARCHAR(20),
  PRIMARY KEY (estado_servicio)
);
-- Query --
INSERT INTO `estado_servicio` (`estado_sercivio`, `estado`) VALUES ('1', 'activo'), ('2', 'inactivo');
-- servicios --
CREATE TABLE servicios
(
  servicios_id INT NOT NULL AUTO_INCREMENT,
  areas_id INT,
  estado_servicio INT,
  nom_servicio VARCHAR(75),
  des_servicio TEXT,
  det_servicio TEXT,
  INDEX(estado_servicio),
  FOREIGN KEY (estado_servicio) REFERENCES estado_servicio(estado_servicio),
  PRIMARY KEY (servicios_id)
);
-- INSERT TABLA SERVICIOS --
INSERT INTO `servicios`(`areas_id`, `nom_servicio`) VALUES ('1','Divorcios'), ('1','Cuota amimenticia'),('1','Cuidado personal'),('1','Regimen de visitas'),('1','Subsidiario de nacimiento'),('1','Subsidiario de defunción'),('1','Declaración Judicial de Unión no matrimonial');

INSERT INTO `servicios`(`areas_id`, `nom_servicio`) VALUES ('2','Procesos comunes'), ('2','Procesos ejecutivos'),('2','Aceptación de herencia');

INSERT INTO `servicios`(`areas_id`, `nom_servicio`) VALUES ('3','Matrimonios'), ('3','Declaraciones juradas'),('3','Compraventas de vehículos'),('3','Escrituración de inmuebles'),('3','Autorizaciones para salir del país y sacar pasaporte');

INSERT INTO `servicios`(`areas_id`, `nom_servicio`) VALUES ('4','Traspasos'), ('4','Solicitud de placas'),('4','Citas para expreticia');
-- tramites --
CREATE TABLE tramites 
(
  cliente_id INT,
  abogado_id INT,
  servicio_id INT,
  INDEX(cliente_id),
  FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id),
  INDEX(abogado_id),
  FOREIGN KEY (abogado_id) REFERENCES abogados(abogado_id),
  INDEX(servicio_id),
  FOREIGN KEY (servicio_id) REFERENCES servicios(servicios_id)
);
-- CONSULTA SERVICIOS --
SELECT servicios.nom_servicio, areas.areas, servicios.des_servicio FROM `areas` INNER JOIN `servicios` on areas.areas_id=servicios.areas_id;

-- HISTORIAL --
SELECT abogados.nombres, servicios.nom_servicio, servicios.des_servicio FROM `abogados` INNER JOIN `tramites` ON abogados.abogado_id=tramites.abogado_id INNER JOIN `servicios` ON tramites.servicio_id=servicios.servicios_id WHERE tramites.cliente_id = '20';