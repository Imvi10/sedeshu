-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2018 a las 21:57:05
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sedeshu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `managerId` int(11) DEFAULT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `managerId`, `name`) VALUES
(1, NULL, 'John'),
(2, 1, 'Mike');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `claveObra` varchar(16) COLLATE utf8_bin NOT NULL,
  `geometria` varchar(64) COLLATE utf8_bin NOT NULL,
  `tipoGeometria` varchar(16) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`claveObra`, `geometria`, `tipoGeometria`) VALUES
('17/01/150002854', '[20.46696293634302,-101.48394227027893]', 'point'),
('17/01/150002855', '[20.443510839583908,-101.55950546264648]', 'point'),
('17/01/130003134', '[20.650467348584456,-101.51700250804424]', 'point'),
('17/01/130003135', '[20.443783215572093,-101.541046500206]', 'point'),
('17/01/130003136', '[20.44376656515068,-101.54105421155691]', 'point'),
('17/01/130003137', '[20.453734189995163,-101.52047228068113]', 'point'),
('17/01/130003138', '[20.4510504810604,-101.5209299325943]', 'point'),
('17/01/130003139', '[20.45008699832614,-101.51475079357624]', 'point'),
('17/01/130003140', '[20.456131362442772,-101.51057828217745]', 'point'),
('17/01/130003144', '[20.450238416619293,-101.53796263039112]', 'point'),
('17/01/130003149', '[20.442849532552195,-101.52636609971518]', 'point'),
('17/01/130003153', '[20.483366217333216,-101.47506952285767]', 'point'),
('17/01/130003154', '[20.454438172836394,-101.4635682106018]', 'point'),
('17/01/130003156', '[20.42898342101906,-101.49710655212402]', 'point'),
('17/01/130003157', '[20.491687799542035,-101.4415955543518]', 'point'),
('17/01/130003158', '[20.48220035574463,-101.42966508865356]', 'point'),
('17/01/130003159', '[20.49681318700736,-101.45262479782104]', 'point'),
('17/01/130003160', '[20.639169981048425,-101.55141592025757]', 'point'),
('17/01/130003162', '[20.43921810513509,-101.5766716003418]', 'point'),
('17/01/130003163', '[20.470802586983833,-101.44919157028198]', 'point'),
('17/01/130003164', '[20.46489229954003,-101.46247386932373]', 'point'),
('17/01/130003165', '[20.46010761448225,-101.58072710037231]', 'point'),
('17/01/130003166', '[20.682276685664363,-101.62325620651245]', 'point'),
('17/01/130003167', '[20.682638031571745,-101.57604932785034]', 'point'),
('17/01/130003169', '[20.527521721037598,-101.5969705581665]', 'point'),
('17/01/130003170', '[20.50350608200224,-101.57368898391724]', 'point'),
('17/01/150001097', '[20.439590079842517,-101.57003045082092]', 'point'),
('17/01/150001097', '[20.439348799053775,-101.57012701034546]', 'point'),
('17/01/150001097', '[20.439650399980543,-101.56986951828003]', 'point'),
('17/01/150001097', '[20.43922815851741,-101.57003045082092]', 'point'),
('17/01/150001097', '[20.441600738355636,-101.56686544418335]', 'point'),
('17/01/150001097', '[20.44182190918658,-101.5665328502655]	', 'point'),
('17/01/150001097', '[20.444822763782472,-101.5698105096817]', 'point'),
('17/01/150001097', '[20.444425669134016,-101.56978905200958]', 'point'),
('17/01/150001097', '[20.444883081867168,-101.56944572925568]', 'point'),
('17/01/150001097', '[20.444435722175747,-101.56946182250977]', 'point'),
('17/01/150001097', '[20.444777525203413,-101.56904339790344]', 'point'),
('17/01/150001097', '[20.444455828257247,-101.56903266906738]', 'point'),
('17/01/150001104', '[20.581307089460005,-101.53008699417114]', 'point'),
('17/01/150001105', '[20.56442711270744,-101.59219086170197]', 'point'),
('17/01/150001109', '[20.551151842360383,-101.5304571390152]', 'point'),
('17/01/150001111', '[20.502832785970686,-101.52003407478333]', 'point'),
('17/01/150001115', '[20.524025117545804,-101.52684688568115]', 'point'),
('17/01/150001117', '[20.52609997954329,-101.59695446491241]', 'point'),
('17/01/150001119', '[20.326996569338537,-101.61529541015625]', 'point'),
('17/01/150001120', '[20.356929288987477,-101.58926725387573]', 'point'),
('17/01/150001123', '[20.74456601862139,-101.61065518856049]', 'point'),
('17/01/150001126', '[20.554286175927658,-101.52550041675568]', 'point'),
('17/01/150001129', '[20.49846633915518,-101.5174001455307]	', 'point'),
('17/01/150001132', '[20.63933062490431,-101.5512228012085]	', 'point'),
('17/01/150002854', '[20.46696293634302,-101.48394227027893]', 'point'),
('17/01/150002855', '[20.443510839583908,-101.55950546264648]', 'point'),
('17/01/170001099', '[20.32765051356488,-101.61713540554047]', 'point'),
('17/01/170001103', '[20.455538905270966,-101.59667015075684]', 'point'),
('17/01/170001925', '[20.4441542367587,-101.53970003128052]	', 'point'),
('17/01/390000438', '[20.444704640798058,-101.53631776571274]', 'point'),
('17/01/390002510', '[20.44466521409022,-101.53638210148529]', 'point'),
('17/01/390005739', '[20.444707154053983,-101.53623461723328]', 'point'),
('17/01/390005743', '[20.444697101030002,-101.5362936258316]', 'point'),
('17/01/390005744', '[20.444692074517754,-101.53630703687668]', 'point'),
('17/01/390006006', '[20.44286743971595,-101.54076218605042]', 'point'),
('17/01/400004909', '[20.649084401109437,-101.51686370372772]', 'point'),
('17/01/400004918', '[20.49262244179642,-101.47715091705322]', 'point'),
('17/01/400006119', '[20.562543631524562,-101.52127861976624]', 'point'),
('17/01/460000091', '[20.604823443680676,-101.57361388206488]', 'point'),
('17/01/460000093', '[20.32776621110166,-101.58152639865875]', 'point'),
('17/01/510000046', '[20.445456102491093,-101.39213562011719]', 'point'),
('17/01/510000047', '[20.68281368552153,-101.62363708019257]', 'point'),
('17/01/510000048', '[20.492346069680135,-101.40947878360748]', 'point'),
('17/01/510000049', '[20.748679604540598,-101.60539269447327]', 'point'),
('17/01/510000050', '[20.49256465494057,-101.4422258734703]', 'point'),
('17/01/510000427', '[20.407637188720194,-101.4103639125824]', 'point'),
('17/01/510000428', '[20.495798172902408,-101.40068650245667]', 'point'),
('17/01/510000429', '[20.57867050084697,-101.52802169322968]', 'point'),
('17/01/510001827', '[20.492918913149076,-101.44193887710571]', 'point'),
('17/01/670002664', '[20.459253190747987,-101.53147101402283]', 'point'),
('17/01/670002858', '[20.459981964231222,-101.53072535991669]', 'point'),
('17/01/670006803', '[20.450379467965618,-101.52896046638489]', 'point'),
('17/01/670006818', '[20.442123505261403,-101.53242588043213]', 'point'),
('17/01/670007486', '[20.44386709596951,-101.53766691684723]', 'point'),
('17/01/690007115', '[20.599705207455873,-101.54283268376162]', 'point'),
('17/01/690007282', '[20.424157400490028,-101.58789396286011]', 'point'),
('17/01/690007283', '[20.418516797152748,-101.59240007400513]', 'point'),
('17/01/690007312', '[20.44363650330625,-101.52894973754883]', 'point'),
('17/01/690007313', '[20.541246122072042,-101.54020428657532]', 'point'),
('17/01/690007314', '[20.394695285760438,-101.57408595085144]', 'point'),
('17/01/690007315', '[20.62640829282878,-101.55729532241821]', 'point'),
('17/01/690007316', '[20.470008530985545,-101.60937309265137]', 'point'),
('17/01/690007317', '[20.357713869747624,-101.58927798271179]', 'point'),
('17/01/690007318', '[20.460987163360794,-101.48203790187836]', 'point'),
('17/01/690007319', '[20.55237745480682,-101.57744407653809]', 'point'),
('17/01/690007320', '[20.43905725092882,-101.54722094535833]', 'point'),
('17/01/690007321', '[20.449643109399354,-101.3942277431488]', 'point'),
('17/01/710002038', '[20.45542832976631,-101.50790512561798]', 'point'),
('17/01/710002039', '[20.47036032845365,-101.61049425601959]', 'point'),
('17/01/800001098', '[20.557385285488582,-101.52178287506104]', 'point'),
('17/01/800001100', '[20.56447733855436,-101.51702463626862]', 'point'),
('17/01/800001101', '[20.563236755300938,-101.51784002780914]', 'point'),
('17/01/800001102', '[20.556631861070876,-101.52159512042999]', 'point'),
('17/01/800001106', '[20.558028204720316,-101.52039349079132]', 'point'),
('17/01/800001107', '[20.649684265533704,-101.51666522026062]', 'point'),
('17/01/800001110', '[20.59920455493294,-101.54742479324341]', 'point');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `id_Tipo_Usuario` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `correo`, `password`, `id_Tipo_Usuario`, `status`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 2, 1),
(2, 'user', '202cb962ac59075b964b07152d234b70', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;