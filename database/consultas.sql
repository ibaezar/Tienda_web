/*Cargar Usuarios*/
insert into usuarios VALUES(null, 'Izhar', 'Baeza', 'ibaezar@outlook.com', '123456', 'admin', null, CURDATE());

/*Cargar Categorias*/
insert into categorias VALUES(null, 'Celulares y smartphones');
insert into categorias VALUES(null, 'Accesorios');
insert into categorias VALUES(null, 'Servicio técnico');

/*Cargar Marcas*/
insert into marcas VALUES(null, 'Apple', null, null);
insert into marcas VALUES(null, 'Claro', null, null);
insert into marcas VALUES(null, 'Entel', null, null);
insert into marcas VALUES(null, 'Huawei', null, null);
insert into marcas VALUES(null, 'Lenovo', null, null);
insert into marcas VALUES(null, 'Lg', null, null);
insert into marcas VALUES(null, 'Motorola', null, null);
insert into marcas VALUES(null, 'Movistar', null, null);
insert into marcas VALUES(null, 'Nokia', null, null);
insert into marcas VALUES(null, 'Samsung', null, null);
insert into marcas VALUES(null, 'Virgin Mobile', null, null);
insert into marcas VALUES(null, 'Wom', null, null);
insert into marcas VALUES(null, 'Xiaomi', null, null);

/*Corregir datos de marcas*/
update marcas set nombre = 'Huawei' where id = 4;
update marcas set nombre = 'Lenovo' where id = 5;
update marcas set nombre = 'Lg' where id = 6;
update marcas set nombre = 'Motorola' where id = 7;
update marcas set nombre = 'Movistar' where id = 8;
update marcas set nombre = 'Nokia' where id = 9;
update marcas set nombre = 'Samsung' where id = 10;
update marcas set nombre = 'Virgin Mobile' where id = 11;
update marcas set nombre = 'Wom' where id = 12;
update marcas set nombre = 'Xiaomi' where id = 13;

/*Alterar tabla productos*/
ALTER TABLE productos ADD marca_id INT(255) NOT NULL AFTER categoria_id
ALTER TABLE productos ADD CONSTRAINT fk_producto_marca FOREIGN KEY(marca_id) REFERENCES marcas(id);

/*Obtener detalle de pedidos por usuario para la vista "Mis pedidos" */
SELECT u.id AS 'Id Usuario', lp.pedido_id AS 'Id de pedido', 
    pr.id AS 'Id del producto', 
    pr.nombre AS 'Nombre Producto', 
    pr.precio AS 'Precio',
    lp.unidades AS 'Cantidad',
    pe.valor AS 'Total pagado'
    FROM linea_pedido lp
    INNER JOIN pedidos pe ON lp.pedido_id = pe.id
    INNER JOIN usuarios u ON pe.usuario_id = u.id
    INNER JOIN productos pr ON lp.producto_id = pr.id
    WHERE u.id = 2
    ORDER BY lp.id DESC;
