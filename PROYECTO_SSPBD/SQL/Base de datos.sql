-- Volcando estructura de base de datos para tienda_de_ropa
CREATE DATABASE IF NOT EXISTS `tienda_de_ropa` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `tienda_de_ropa`;

-- Volcando estructura para tabla tienda_de_ropa.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
    `ID_PRODUCTO` bigint(20) NOT NULL AUTO_INCREMENT,
    `NOMBRE` varchar(50) NOT NULL,
    `DESCRIPCCION` varchar(50) NOT NULL,
    `PRECIO` float NOT NULL,
    `TALLA` varchar(50) NOT NULL,
    `COLOR` varchar(50) NOT NULL,
    `ID_CATEGORIA` bigint(20) NOT NULL,
    `ESTADO` varchar(50) NOT NULL,
    PRIMARY KEY (`ID_PRODUCTO`),
    KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
    CONSTRAINT `ID_CATEGORIA` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categorias` (`ID_CATEGORIAS`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda_de_ropa.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
    `ID_CATEGORIAS` bigint(20) NOT NULL AUTO_INCREMENT,
    `NOMBRE` varchar(50) NOT NULL,
    PRIMARY KEY (`ID_CATEGORIAS`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda_de_ropa.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
    `ID_CLIENTE` bigint(20) NOT NULL AUTO_INCREMENT,
    `NOMBRE` varchar(50) NOT NULL,
    `DIRECCION` varchar(50) NOT NULL,
    `TELEFONO` int(10) unsigned NOT NULL,
    PRIMARY KEY (`ID_CLIENTE`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda_de_ropa.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
    `ID_EMPLEADO` bigint(20) NOT NULL AUTO_INCREMENT,
    `NOMBRE` varchar(50) NOT NULL,
    `CARGO` varchar(50) NOT NULL,
    `TELEFONO` int(10) unsigned NOT NULL,
    PRIMARY KEY (`ID_EMPLEADO`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda_de_ropa.metodo_de_pago
CREATE TABLE IF NOT EXISTS `metodo_de_pago` (
    `ID_METODOPAGO` bigint(20) NOT NULL AUTO_INCREMENT,
    `NOMBRE` varchar(50) NOT NULL,
    PRIMARY KEY (`ID_METODOPAGO`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda_de_ropa.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
    `ID_VENTAS` bigint(20) NOT NULL AUTO_INCREMENT,
    `ID_PRODUCTO` bigint(20) NOT NULL,
    `FECHA_DE_VENTA` date NOT NULL,
    `CANTIDAD_VENDIDAD` int(11) NOT NULL,
    `PRECIO_DE_VENTA` float NOT NULL,
    `ID_CLIENTE` bigint(20) NOT NULL,
    `ID_EMPLEADO` bigint(20) NOT NULL,
    `ID_METODOPAGO` bigint(20) NOT NULL,
    PRIMARY KEY (`ID_VENTAS`),
    KEY `ID_CLIENTE` (`ID_CLIENTE`),
    KEY `ID_METODOPAGO` (`ID_METODOPAGO`),
    KEY `ID_EMPLEADO` (`ID_EMPLEADO`),
    KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
    CONSTRAINT `ID_CLIENTE` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID_CLIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `ID_EMPLEADO` FOREIGN KEY (`ID_EMPLEADO`) REFERENCES `empleados` (`ID_EMPLEADO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `ID_METODOPAGO` FOREIGN KEY (`ID_METODOPAGO`) REFERENCES `metodo_de_pago` (`ID_METODOPAGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `ID_PRODUCTO` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `articulos` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;


DELIMITER / /

CREATE FUNCTION determinar_nota(cantidad INT) RETURNS VARCHAR(50)
BEGIN
    DECLARE nota VARCHAR(50);
    IF cantidad > 100 THEN
        SET nota = 'excelente venta';
    ELSE
        SET nota = 'buena venta';
    END IF;
    RETURN nota;
END //

DELIMITER;

CReaTE TRIGGER: 

DELIMITER / /

CREATE TRIGGER actualizar_nota_venta
AFTER INSERT ON ventas
FOR EACH ROW
BEGIN
    DECLARE nota VARCHAR(50);
    SET nota = determinar_nota(NEW.CANTIDAD_VENDIDAD);
    UPDATE ventas
    SET NOTA = nota
    WHERE ID_VENTAS = NEW.ID_VENTAS;
END //

DELIMITER;