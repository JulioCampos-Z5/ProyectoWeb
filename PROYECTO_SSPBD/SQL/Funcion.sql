DELIMITER //

CREATE FUNCTION create_tienda_de_ropa_database()
RETURNS VARCHAR(255)
BEGIN
    DECLARE msg VARCHAR(255);
    
    -- Crear la base de datos si no existe
    CREATE DATABASE IF NOT EXISTS tienda_de_ropa;
    -- Usar la base de datos creada
    USE tienda_de_ropa;

    -- Tabla de categorías
    CREATE TABLE IF NOT EXISTS categorias (
      ID_CATEGORIAS bigint(20) NOT NULL AUTO_INCREMENT,
      NOMBRE varchar(50) NOT NULL,
      PRIMARY KEY (ID_CATEGORIAS)
    );

    -- Tabla de artículos
    CREATE TABLE IF NOT EXISTS articulos (
      ID_PRODUCTO bigint(20) NOT NULL AUTO_INCREMENT,
      NOMBRE varchar(50) NOT NULL,
      DESCRIPCION varchar(50) NOT NULL,
      PRECIO float NOT NULL,
      TALLA varchar(50) NOT NULL,
      COLOR varchar(50) NOT NULL,
      ID_CATEGORIA bigint(20) NOT NULL,
      ESTADO varchar(50) NOT NULL,
      PRIMARY KEY (ID_PRODUCTO),
      FOREIGN KEY (ID_CATEGORIA) REFERENCES categorias(ID_CATEGORIAS)
    );

    -- Tabla de clientes
    CREATE TABLE IF NOT EXISTS clientes (
      ID_CLIENTE bigint(20) NOT NULL AUTO_INCREMENT,
      NOMBRE varchar(50) NOT NULL,
      DIRECCION varchar(50) NOT NULL,
      TELEFONO int(10) unsigned NOT NULL,
      PRIMARY KEY (ID_CLIENTE)
    );

    -- Tabla de empleados
    CREATE TABLE IF NOT EXISTS empleados (
      ID_EMPLEADO bigint(20) NOT NULL AUTO_INCREMENT,
      NOMBRE varchar(50) NOT NULL,
      CARGO varchar(50) NOT NULL,
      TELEFONO int(10) unsigned NOT NULL,
      PRIMARY KEY (ID_EMPLEADO)
    );

    -- Tabla de método de pago
    CREATE TABLE IF NOT EXISTS metodo_de_pago (
      ID_METODOPAGO bigint(20) NOT NULL AUTO_INCREMENT,
      NOMBRE varchar(50) NOT NULL,
      PRIMARY KEY (ID_METODOPAGO)
    );

    -- Tabla de ventas
    CREATE TABLE IF NOT EXISTS ventas (
      ID_VENTAS bigint(20) NOT NULL AUTO_INCREMENT,
      ID_PRODUCTO bigint(20) NOT NULL,
      FECHA_DE_VENTA date NOT NULL,
      CANTIDAD_VENDIDAD int(11) NOT NULL,
      PRECIO_DE_VENTA float NOT NULL,
      ID_CLIENTE bigint(20) NOT NULL,
      ID_EMPLEADO bigint(20) NOT NULL,
      ID_METODOPAGO bigint(20) NOT NULL,
      PRIMARY KEY (ID_VENTAS),
      FOREIGN KEY (ID_PRODUCTO) REFERENCES articulos(ID_PRODUCTO),
      FOREIGN KEY (ID_CLIENTE) REFERENCES clientes(ID_CLIENTE),
      FOREIGN KEY (ID_EMPLEADO) REFERENCES empleados(ID_EMPLEADO),
      FOREIGN KEY (ID_METODOPAGO) REFERENCES metodo_de_pago(ID_METODOPAGO)
    );

    SET msg = 'Base de datos tienda_de_ropa creada exitosamente.';
    
    RETURN msg;
END //

DELIMITER ;

CALL create_tienda_de_ropa_database();