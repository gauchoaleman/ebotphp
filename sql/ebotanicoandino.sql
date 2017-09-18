-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-09-2017 a las 20:04:49
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ebotanicoandino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budgets`
--

CREATE TABLE `budgets` (
  `idbudgets` int(11) NOT NULL,
  `users_idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `budgets`
--

INSERT INTO `budgets` (`idbudgets`, `users_idusers`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattree`
--

CREATE TABLE `cattree` (
  `idcattree` int(11) NOT NULL,
  `idparentcat` int(11) DEFAULT NULL,
  `description` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cattree`
--

INSERT INTO `cattree` (`idcattree`, `idparentcat`, `description`) VALUES
(1, 0, 'Gourmet'),
(2, 1, 'Tés'),
(3, 0, 'Jardinería'),
(4, 3, 'Semillas'),
(5, 4, 'Flores'),
(6, 4, 'Plantas'),
(7, 4, 'Huerta'),
(8, 4, 'Césped'),
(9, 0, 'Cosmética'),
(10, 9, 'Aceite esencial'),
(11, 9, 'Jabón vegetal'),
(12, 9, 'Mascarillas'),
(13, 9, 'Sales de baño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `idproducts` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `cattree_idcattree` int(11) NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`idproducts`, `description`, `cattree_idcattree`, `price`) VALUES
(1, 'Lupino rojo', 5, 80),
(2, 'Frutos rojos', 2, 150),
(3, 'Lluvia de oro', 5, 60),
(4, 'Lupino rojo', 5, 80),
(5, 'Frutos rojos', 2, 150),
(6, 'Lluvia de oro', 5, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productsbudget`
--

CREATE TABLE `productsbudget` (
  `idproductsbudget` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `budgets_idbudgets` int(11) NOT NULL,
  `products_idproducts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productsbudget`
--

INSERT INTO `productsbudget` (`idproductsbudget`, `qty`, `budgets_idbudgets`, `products_idproducts`) VALUES
(1, 2, 1, 1),
(2, 5, 1, 2),
(3, 7, 1, 3),
(4, 2, 2, 1),
(5, 4, 2, 3),
(6, 10, 2, 3),
(7, 4, 3, 1),
(8, 5, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productssale`
--

CREATE TABLE `productssale` (
  `idproductssale` int(11) NOT NULL,
  `sales_idsales` int(11) NOT NULL,
  `products_idproducts` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productssale`
--

INSERT INTO `productssale` (`idproductssale`, `sales_idsales`, `products_idproducts`, `qty`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 5),
(3, 1, 3, 7),
(4, 2, 1, 2),
(5, 2, 3, 4),
(6, 2, 2, 10),
(7, 3, 1, 4),
(8, 3, 2, 5),
(9, 3, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `idsales` int(11) NOT NULL,
  `users_idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`idsales`, `users_idusers`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idusers`, `email`, `name`, `surname`, `password`) VALUES
(1, 'pendorche@gmail.com', 'Paco', 'Paquito', 'pacote'),
(2, 'lucas@capacitas.com', 'Lucas', 'Passalacqua', 'lucaspass'),
(3, 'stefan@capacitas.com', 'Stefan', 'Ronacher', 'stefanpass');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`idbudgets`),
  ADD KEY `fk_budgets_users1_idx` (`users_idusers`);

--
-- Indices de la tabla `cattree`
--
ALTER TABLE `cattree`
  ADD PRIMARY KEY (`idcattree`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproducts`),
  ADD KEY `fk_products_cattree1_idx` (`cattree_idcattree`);

--
-- Indices de la tabla `productsbudget`
--
ALTER TABLE `productsbudget`
  ADD PRIMARY KEY (`idproductsbudget`),
  ADD KEY `fk_productsbudget_budgets1_idx` (`budgets_idbudgets`),
  ADD KEY `fk_productsbudget_products1_idx` (`products_idproducts`);

--
-- Indices de la tabla `productssale`
--
ALTER TABLE `productssale`
  ADD PRIMARY KEY (`idproductssale`),
  ADD KEY `fk_productssale_sales1_idx` (`sales_idsales`),
  ADD KEY `fk_productssale_products1_idx` (`products_idproducts`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`idsales`),
  ADD KEY `fk_sales_users_idx` (`users_idusers`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `budgets`
--
ALTER TABLE `budgets`
  MODIFY `idbudgets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cattree`
--
ALTER TABLE `cattree`
  MODIFY `idcattree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `idproducts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productsbudget`
--
ALTER TABLE `productsbudget`
  MODIFY `idproductsbudget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productssale`
--
ALTER TABLE `productssale`
  MODIFY `idproductssale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `idsales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `fk_budgets_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_cattree1` FOREIGN KEY (`cattree_idcattree`) REFERENCES `cattree` (`idcattree`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productsbudget`
--
ALTER TABLE `productsbudget`
  ADD CONSTRAINT `fk_productsbudget_budgets1` FOREIGN KEY (`budgets_idbudgets`) REFERENCES `budgets` (`idbudgets`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productsbudget_products1` FOREIGN KEY (`products_idproducts`) REFERENCES `products` (`idproducts`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productssale`
--
ALTER TABLE `productssale`
  ADD CONSTRAINT `fk_productssale_products1` FOREIGN KEY (`products_idproducts`) REFERENCES `products` (`idproducts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productssale_sales1` FOREIGN KEY (`sales_idsales`) REFERENCES `sales` (`idsales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_users` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
