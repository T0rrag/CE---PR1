-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2025 at 09:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Magic: The Gathering'),
(2, 'Warhammer 40.000'),
(3, 'Dungeons & Dragons'),
(4, 'Juegos clásicos');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `email`, `direccion`, `telefono`) VALUES
(1, 'ÁNGEL JOSÉ', 'panchito19947@gmail.com', 'Velazquez 15', '637885031');

-- --------------------------------------------------------

--
-- Table structure for table `linea_pedido`
--

CREATE TABLE `linea_pedido` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linea_pedido`
--

INSERT INTO `linea_pedido` (`id`, `cantidad`, `pedido_id`, `producto_id`, `precio`) VALUES
(1, 1, 1, 10, 29.00),
(2, 1, 1, 8, 20.00),
(3, 1, 1, 1, 4.50);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cliente_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id`, `fecha`, `cliente_id`, `total`) VALUES
(1, '2025-11-26 01:02:36', 1, 53.50);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `categoriaID`) VALUES
(1, 'Booster Pack MTG', 'Sobre de 15 cartas aleatorias', 'https://www.mtgshop.nl/image/cache/catalog/tdm/mtgtdm_en_bstr_play_01_03-550x550h.webp', 4.50, 1),
(2, 'Commander Deck', 'Mazo preconstruido de Commander', 'https://cardgamebase.com/wp-content/uploads/Jeskai-Striker-Tarkir-Dragonstorm-Commander-Precons-682x1024.webp', 45.00, 1),
(3, 'Bundle Set', 'Caja especial con sobres y accesorios', 'https://en.destocktcg.fr/assets/uploads/products/tarkir-la-tempete-des-dragons-bundle-fr-magic-the-gathering-tdm-67c75503c004d.jpg', 69.99, 1),
(4, 'Start Collecting Space Marines', 'Caja de inicio Space Marines', 'https://cdn.shoplightspeed.com/shops/611772/files/8660934/citadel-start-collecting-space-marines.jpg', 95.00, 2),
(5, 'Fragmento de C\'Tan del Dragón del Vacío ', 'Máquina de guerra necrona', 'https://cdn01.bandua-wargames.com/61459-thickbox_default/fragmento-de-c-tan-del-dragon-de-vacio.jpg', 150.00, 2),
(6, 'Líctor tiránido', 'Unidad sigilosa tiránida', 'https://www.empiregames.es/wp-content/uploads/2025/06/5011921200382-2.jpg', 65.00, 2),
(7, 'Manual del Jugador', 'Libro básico de reglas D&D 5e', 'https://imgs.search.brave.com/TKaVV-1IlkH0VjQ-pyMykYvlE6qN_HEYcd_sfXVMwOw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9sYWVz/Y290aWxsYWp1ZWdv/cy5jb20vY2RuL3No/b3AvcHJvZHVjdHMv/ZWV3Y2RkMDFfMS5q/cGc_dj0xNTkzMDg0/MjA1JndpZHRoPTE0/NDU', 39.99, 3),
(8, 'Pantalla del Dungeon Master', 'Accesorio para dirigir partidas', 'https://imgs.search.brave.com/CUnM6Pq5p2PcDh8XhgaR2Lko-dneFMy5miPNWGaBWIc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODFCOG05Vy1lWEwu/anBn', 20.00, 3),
(9, 'Starter Set', 'Caja de inicio para nuevos jugadores de D&D', 'https://thealexandrian.net/images/20230919.jpg', 50.00, 3),
(10, 'Ajedrez de madera', 'Juego clásico de ajedrez', 'https://http2.mlstatic.com/D_NQ_NP_642922-MLA95843711727_102025-O.webp', 29.00, 4),
(11, 'Damas Deluxe', 'Tablero clásico de damas', 'https://imgs.search.brave.com/94wgIRzPYyFOBCm-Bq7vo9iYqSJqn0tG8wwIjD6euB8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NzFVLXRDaTJSVkwu/anBn', 19.99, 4),
(12, 'Backgammon Premium', 'Maletín de backgammon de alta calidad', 'https://m.media-amazon.com/images/I/81ptLRLW7FL._AC_SX522_.jpg', 34.50, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaID` (`categoriaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD CONSTRAINT `linea_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `linea_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoriaID`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
