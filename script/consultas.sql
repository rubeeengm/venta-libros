##CATEGORIAS
#CREATE
INSERT INTO CATEGORIAS (NOMBRE) VALUES ("MATEMATICAS");
#READ
SELECT U.ID, U.NOMBRE FROM CATEGORIAS AS U;
#UPDATE
UPDATE CATEGORIAS SET NOMBRE = "MATEMATICAS2" WHERE ID = 2;
#DELETE
DELETE FROM CATEGORIAS WHERE ID = 1;
#VERIFICAR EXISTENCIA DE ID CATEGORIA
SELECT COUNT(ID) FROM CATEGORIAS WHERE ID = 2;

##LIBROS
#CREATE
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA) VALUES ("CALCULO INTEGRAL", "GRANVILLE", 100, 34, 2);
#READ
SELECT L.ID, L.NOMBRE, L.AUTOR, L.PRECIO, L.EXISTENCIA, L.IDCATEGORIA, L.IMAGEN, C.NOMBRE AS CATEGORIA FROM LIBROS AS L
JOIN CATEGORIAS AS C ON L.IDCATEGORIA = C.ID;
#UPDATE
UPDATE LIBROS SET NOMBRE = "CALCULO INTEGRAL2", AUTOR = "GRANVILLE2", PRECIO = 101, EXISTENCIA = 35, IDCATEGORIA = 2 WHERE ID = 1;
#DELETE
DELETE FROM LIBROS WHERE ID = 1;
#VERIFICAR EXISTENCIA DE ID LIBRO
SELECT COUNT(ID) FROM LIBROS WHERE ID = 1;

##ROLES
#CREATE
INSERT INTO ROLES (NOMBRE) VALUES ('CLIENTE');
#READ
SELECT C.ID, C.NOMBRE FROM ROLES AS C;
#UPDATE
UPDATE ROLES SET NOMBRE = 'ADMINISTRADOR' WHERE ID = 1;
#DELETE
DELETE FROM ROLES WHERE ID = 1;
#VERIFICAR EXISTENCIA DE ID ROL
SELECT COUNT(ID) FROM ROLES WHERE ID = 1;

##USUARIOS
#CREATE
INSERT INTO USUARIOS (USUARIO, CONTRASENIA) VALUES ('rubeeengm1', '12345678')
#READ
SELECT U.ID, U.USUARIO, U.CONTRASENIA, U.ESTADO, ROL FROM USUARIOS AS U;
#UPDATE
UPDATE USUARIOS SET USUARIO = 'ruben', CONTRASENIA = '123', ESTADO = '1' WHERE ID = 1;
#DELETE
DELETE FROM USUARIOS WHERE ID = 1;
#VERIFICAR EXISTENCIA USUARIO
SELECT COUNT(ID) FROM USUARIOS WHERE ID = 1;
SELECT COUNT(ID) FROM USUARIOS WHERE USUARIO = 'rubeeengm';
#LOGIN
SELECT IF(COUNT(ID)>0,ID,0) FROM USUARIOS WHERE USUARIO = 'rubeeengm' AND CONTRASENIA = '12345678';

##CLIENTES
#CREATE
INSERT INTO CLIENTES (NOMBRE, APELLIDO, CORREOELECTRONICO, IDUSUARIO) VALUES ('RUBEN', 'GARCIA', 'ruben@mail.com', 3);
#READ
SELECT 
	C.ID, C.NOMBRE, C.APELLIDO, C.CORREOELECTRONICO, U.USUARIO, U.CONTRASENIA, U.ESTADO
FROM 
	CLIENTES AS C
JOIN
	USUARIOS AS U
ON
	C.IDUSUARIO = U.ID
;
#UPDATE
UPDATE CLIENTES SET NOMBRE = 'ruben', APELLIDO = 'MALAGA', CORREOELECTRONICO = 'malaga@mail.com', IDUSUARIO = 1 WHERE ID = 1;
#DELETE
DELETE FROM CLIENTES WHERE ID = 1;
#VERIFICAR EXISTENCIA CLIENTE
SELECT COUNT(ID) FROM CLIENTES WHERE ID = 1;

##ORDENESCABECERA
#CREATE
INSERT INTO ORDENESCABECERA (FECHA, IVA, TOTAL, IDCLIENTE) VALUES (NOW(), 16, 100, 1);
#READ
SELECT O.ID, O.FECHA, O.IVA, O.TOTAL, O.IDCLIENTE FROM ORDENESCABECERA AS O;
#UPDATE
#DELETE
DELETE FROM ORDENESCABECERA WHERE ID = 1;
#VERIFICAR EXISTENCIA ORDEN CABECERA
SELECT COUNT(ID) FROM ORDENESCABECERA WHERE ID = 2;

##ORDENESDETALLE
#CREATE
INSERT INTO ORDENESDETALLE (CANTIDAD, PRECIO, IMPORTE, IDORDENCABECERA, IDLIBRO) VALUES (1, 100, 100, 1, 1);
#READ
SELECT O.ID, O.CANTIDAD, O.PRECIO, O.IMPORTE, O.IDORDENCABECERA, O.IDLIBRO FROM ORDENESDETALLE AS O WHERE IDORDENCABECERA = 1;


INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('EL DIA QUE SE PERDIÓ LA CORDURA','EX',100,56,1,'libro1.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('DE EJECUTIVO A TROTAMUNDOS','EX',100,56,1,'libro2.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('EL CASO VALENTI','EX',100,56,1,'libro3.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('TRONO DE CRISTAL','EX',100,56,1,'libro4.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('ULTIMO INVIERNO','EX',100,56,1,'libro5.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('LA ULTIMA DAGA','EX',100,56,1,'libro6.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('LA GRAN BIBLIOTECA','EX',100,56,1,'libro7.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('THE ARRIVALS','EX',100,56,1,'libro8.jpg');
INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA, IMAGEN) VALUES ('ANIMALES FANTASTICOS','EX',100,56,1,'libro9.jpeg');