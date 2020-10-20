-- tabla para los diferentes usuario --
CREATE TABLE tipo_user 
(
  tipo_userid INT NOT NULL,
  tipo VARCHAR(20) NOT NULL,
  PRIMARY KEY (tipo_userid)
);
-- tabla usuario --
CREATE TABLE usuarios
(
  usuario_id INT NOT NULL AUTO_INCREMENT,
  tipo_userid INT,
  user VARCHAR(15),
  pass VARCHAR(100),
  email VARCHAR(150),
  codigo_pass CHAR(8),
  fech_pass DATE,
  PRIMARY KEY (usuario_id),
  INDEX(tipo_userid),
  FOREIGN KEY (tipo_userid) REFERENCES tipo_user(tipo_userid)
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
CREATE TABLE categorias
(
  categoria_id INT NOT NULL,
  categoria VARCHAR(25),
  PRIMARY KEY (categoria_id)
);
-- servicios --
CREATE TABLE servicios
(
  servicios_id INT NOT NULL AUTO_INCREMENT,
  categoria_id INT,
  nom_servicio VARCHAR(75),
  des_servicio TEXT,
  det_servicio TEXT,
  PRIMARY KEY (servicios_id),
  INDEX(categoria_id),
  FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id)  
);

-- INSERT TABLE TIPO USUARIO --
INSERT INTO `tipo_user`(`tipo_userid`, `tipo`) VALUES (1,'administrador'), (2, 'abogado'), (3, 'cliente');

-- INSERT TABLE USUARIO --
INSERT INTO `usuarios`(`usuario_id`, `tipo_userid`, `user`, `pass`, `email`, `codigo_pass`, `fech_pass`) VALUES (1,3,'yona17','Jonatan17','h28631053@gmail.com','','');

-- INSERT TABLA CATEGORIA --
INSERT INTO `categorias`(`categoria_id`, `categoria`) VALUES (1, 'Poderes'), (2, 'Habla con tu abogado'), (3, 'Sociedades'), (4, 'Contratos');

-- INSERT TABLA SERVICIOS --
INSERT INTO `servicios`(`categoria_id`, `nom_servicio`, `des_servicio`) VALUES (1, 'Poder para compra de vehiculo', 'Sirve para comprar, vender, rentar, donar, hipotecar, etc. bienes inmuebles.','Para que el poder pueda ser elaborado por un notariado de Notaries Digital ser'),
(1, 'Poder para venta de vehiculo', 'Sirve para comprar, vender, rentar, donar, hipotecar, etc. bienes inmuebles.'),
(1, 'Poder general administrativo', 'Se otorga para que el apoderado administre bienes e intereses del poderdante, por ejemplo: cuentas bancarias o negocios.'),
(1, 'Poder general judicial', 'Sirve para que el apoderado represente al poderdante en toda clase de juicios y para efectuar cobros.'),
(2, 'Asesoria Civil', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Mercantil', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Familiar', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Migración', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Inquilino', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Laboral', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Contratos', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Transtio', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(2, 'Asesoria Tributario', 'Obtenen asesoria legal para tus asuntos personales o tus negocios.'),
(3, 'Sociedad Anonima de Capital', 'Notaries Digital te facilita el proceso para que usted pueda facilmente constituir una sociedad anonima.'),
(4, 'Contrado Compraventa Vehiculo', 'Notaries Digital pone a tu disposicion un mecanismo facil para que usted. pueda realizar la compraventa de un vehiculo.'),
(4, 'Contrado de Arendamiento para Habitacion', 'Notaries Digital pone a tu disposicion un mecanismo facil para que usted. pueda arrendar su casa o apartemento para fines de habitacion.'),
(4, 'Contrado de Arendamiento Comercial', 'Notaries Digital pone a tu disposicion un mecanismo facil para que usted. pueda arrendar su casa o local para fines comerciales.');

-- CONSULTA SERVICIOS --
SELECT servicios.nom_servicio, categorias.categoria, servicios.des_servicio FROM categorias INNER JOIN servicios on categorias.categoria_id=servicios.categoria_id