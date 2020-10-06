-- tabla para los diferentes usuario --
CREATE TABLE tipo_user 
(
  tipo_userid INT NOT NULL,
  tipo VARCHAR(6) NOT NULL,
  PRIMARY KEY (tipo_userid)
);
-- tabla usuario --
CREATE TABLE usuarios
(
  usuario_id INT NOT NULL AUTO_INCREMENT,
  tipo_userid VARCHAR(10),
  user VARCHAR(6),
  pass VARCHAR(6),
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
  usuario_id VARCHAR(10),
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
  usuario_id VARCHAR(10),
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