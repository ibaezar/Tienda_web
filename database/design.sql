/*Crear base de datos*/
CREATE DATABASE tienda_web;

/*Seleccionar la base de datos*/
USE tienda_web;

/*Crear tablas*/
CREATE TABLE usuarios(
    id          INT(255) AUTO_INCREMENT NOT NULL,
    nombre      VARCHAR(255) NOT NULL,
    apellidos   VARCHAR(255) NOT NULL,
    email       VARCHAR(255) NOT NULL,
    password    VARCHAR(255) NOT NULL,
    rol         VARCHAR(100),
    imagen      VARCHAR(255),
    fecha       DATE NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias(
    id          INT(255) AUTO_INCREMENT NOT NULL,
    nombre      VARCHAR(255) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE productos(
    id              INT(255) AUTO_INCREMENT NOT NULL,
    categoria_id    INT(255) NOT NULL,
    nombre          VARCHAR(255) NOT NULL,
    descripcion     TEXT NOT NULL,
    precio          INT(255) NOT NULL,
    stock           INT(255) NOT NULL,
    oferta          VARCHAR(2),
    imagen          VARCHAR(255),
    fecha           DATE NOT NULL,
    CONSTRAINT pk_productos PRIMARY KEY(id),
    CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos(
    id              INT(255) AUTO_INCREMENT NOT NULL,
    usuario_id      INT(255) NOT NULL,
    ciudad          VARCHAR(255) NOT NULL,
    comuna          VARCHAR(255) NOT NULL,
    direccion       VARCHAR(255) NOT NULL,
    depto           VARCHAR(255),
    observacion     MEDIUMTEXT,
    valor           INT(255) NOT NULL,
    estado          VARCHAR(255) NOT NULL,
    fecha           DATE NOT NULL,
    hora            TIME NOT NULL,
    CONSTRAINT pk_pedidos PRIMARY KEY(id),
    CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE linea_pedido(
    id              INT(255) AUTO_INCREMENT NOT NULL,
    pedido_id       INT(255) NOT NULL,
    producto_id     INT(255) NOT NULL,
    unidades        INT(255) NOT NULL,
    CONSTRAINT pk_linea_pedido PRIMARY KEY(id),
    CONSTRAINT fk_linea_pedido_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_linea_pedido_producto FOREIGN KEY(producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;