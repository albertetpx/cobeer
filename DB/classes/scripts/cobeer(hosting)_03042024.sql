-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2024 a las 19:17:24
-- Versión del servidor: 8.1.0
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21976399_cobeer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `texto` text,
  `fechaCreacion` datetime DEFAULT NULL,
  `idDepartamento` int UNSIGNED NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `indBaja` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `descripcion`, `autor`, `texto`, `fechaCreacion`, `idDepartamento`, `tags`, `indBaja`) VALUES
(30, 'Com publicar un article a la web de CoBeer', 'En aquest article aprendràs com publicar un article a la web de manera fàcil i segura.', 'Albert Guardiola', '<p>Si enguany participes en el <strong>projecte CooBeer,</strong> en aquest article aprendr&agrave;s com <strong>publicar un article</strong> a la web de manera f&agrave;cil i segura:</p>\r\n<ol>\r\n<li>Des de la p&agrave;gina principal del lloc, obre el men&uacute; de la part superior esquerra i clica a \"<em>CREAR ARTICLE</em>\".</li>\r\n<li>Se t\'obrir&agrave; el formulari de creaci&oacute; d\'article: has d\'introduir un t&iacute;tol, un autor, un departament i un resum de l\'article. Tamb&eacute; tens un editor de text que et permetr&agrave; confeccionar el cos de l\'article i dornar-li format. <span style=\"text-decoration: underline;\">Tamb&egrave; pots copiar el text des d\'algun altre lloc i acabar-li de donar format en l\'editor.</span></li>\r\n<li>Pots seleccionar fotografies per incloure juntament amb l\'article. Les has de seleccionar totes de cop; si tornes a seleccionar noves fotografies, les que has seleccionat anteriorment no s\'enviaran! <strong>Les fotografies han de ser d\'una mida inferior a 5 MB.</strong></li>\r\n<li>Pots afegir etiquetes (<em>tags</em>) al teu article perqu&egrave; sigui m&eacute;s f&agrave;cil cercar-lo m&eacute;s endavant, o perqu&egrave; quedi relacionat amb altres articles amb la mateixa tem&agrave;tica.</li>\r\n<li>Finalment, clica el bot&oacute; CREAR ARTICLE al final del formulari perqu&egrave; el teu article es publiqui. Si no has omplert tots els camps, el bot&oacute; no estar&agrave; habilitat.</li>\r\n<li>Ja est&agrave; publicat el teu article a la p&agrave;gina principal del projecte. Enhorabona per participar-hi!</li>\r\n</ol>\r\n<p style=\"text-align: left;\">&nbsp;</p>', '2024-03-24 09:36:00', 5, '#cobeer,#etpx', 1),
(31, 'Descobreix com fer cervesa artesana a casa', 'Fer cervesa artesana a casa: una guia bàsica per a principiants.', 'Marc Adorno', '<p>Fer la teva pr&ograve;pia cervesa artesana &eacute;s una activitat que ha guanyat popularitat en els &uacute;ltims anys. Si est&agrave;s interessat a provar a fer la teva pr&ograve;pia cervesa a casa, aqu&iacute; tens algunes recomanacions per comen&ccedil;ar.</p>\r\n<p>En primer lloc, &eacute;s important tenir en compte que fer cervesa artesana &eacute;s un proc&eacute;s que requereix paci&egrave;ncia, temps i dedicaci&oacute;. No &eacute;s una tasca que es pugui fer en una estona. Cal dedicar-hi un parell d\'hores al dia durant diverses setmanes, i estar disposat a seguir les instruccions amb cura per assegurar-te que la cervesa surti b&eacute;.</p>\r\n<p style=\"text-align: right;\"><em>Una de les opcions m&eacute;s senzilles per als principiants &eacute;s comen&ccedil;ar amb un kit de cervesa artesana. Aquests kits inclouen tot el necessari per fer una cervesa, incloent les instruccions. A m&eacute;s a m&eacute;s, solen ser m&eacute;s econ&ograve;mics que comprar tots els materials per separat. </em></p>\r\n<p>Per fer cervesa artesana, necessitar&agrave;s eines com ara un term&ograve;metre, una olla gran i una varietat de fusters. Tamb&eacute; haur&agrave;s de decidir quin tipus de cervesa vols fer, ja que cada varietat t&eacute; diferents ingredients i requeriments de temps i temperatura. Sigui quin sigui el tipus de cervesa que tri&iuml;s fer, &eacute;s important seguir les instruccions amb precisi&oacute;. No et saltis cap pas i assegura\'t de tenir tots els ingredients abans de comen&ccedil;ar. Si tens alguna pregunta o problema durant el proc&eacute;s, pots buscar ajuda en f&ograve;rums de cervesa artesana en l&iacute;nia o preguntar a altres persones que tamb&eacute; facin cervesa a casa.</p>\r\n<p>En resum, fer cervesa artesana a casa pot ser una activitat divertida i gratificant. Si ets un principiant, comen&ccedil;a amb un kit de cervesa artesana i segueix les instruccions amb cura. Amb pr&agrave;ctica i dedicaci&oacute;, podr&agrave;s arribar a crear les teves <strong>pr&ograve;pies varietats de cervesa artesana &uacute;niques i delicioses</strong>.</p>', '2024-03-24 09:38:00', 5, '#cobeer,#etpx', 0),
(33, 'La bullida del llúpol, sense misteris', 'El procés de bullida de la malta amb el llúpol és un pas crucial en la producció de cervesa.', 'Joan Llorens', '<p>El proc&eacute;s de bullida de la malta amb el ll&uacute;pol &eacute;s un pas crucial en la producci&oacute; de cervesa. Aquest proc&eacute;s implica la cocci&oacute; de la malta triturada en aigua, juntament amb el ll&uacute;pol, per obtenir una soluci&oacute; rica en sucres fermentables i aromes. A continuaci&oacute;, explorarem en detall aquest proc&eacute;s.</p>\r\n<p>&nbsp;</p>\r\n<p>En primer lloc, la malta triturada s\'afegir&agrave; a l\'aigua calenta per comen&ccedil;ar la fase d\'extracci&oacute;. Els enzims presents en la malta comen&ccedil;aran a descompondre els hidrats de carboni complexos en sucres fermentables. A mesura que la cocci&oacute; continu&iuml;, els sucres es dissoldran en l\'aigua, creant una soluci&oacute; dol&ccedil;a coneguda com a most. Despr&eacute;s d\'uns 30 minuts de cocci&oacute;, s\'afegir&agrave; el ll&uacute;pol. El ll&uacute;pol &eacute;s una planta amb una gran varietat de sabors i aromes, que s\'utilitza per equilibrar la dol&ccedil;or de la malta i proporcionar notes arom&agrave;tiques a la cervesa. El ll&uacute;pol tamb&eacute; t&eacute; propietats antibacterianes, la qual cosa ajuda a prevenir la contaminaci&oacute; de la cervesa. Durant la cocci&oacute;, el ll&uacute;pol es descompon en els seus components amargs i arom&agrave;tics, que s\'integren a la soluci&oacute; de most. Els productors de cervesa poden controlar la quantitat i el moment d\'afegir el ll&uacute;pol per ajustar el perfil de sabor i aroma de la cervesa.</p>\r\n<p>&nbsp;</p>\r\n<p>Despr&eacute;s de bullir la malta i el ll&uacute;pol durant aproximadament una hora, la soluci&oacute; resultada es refreda r&agrave;pidament per evitar la formaci&oacute; de sabors indesitjables. A continuaci&oacute;, es trasllada a un fermentador, on es cultivaran els llevats. Els llevats consumiran els sucres fermentables presents en la soluci&oacute; per produir alcohol i di&ograve;xid de carboni, deixant una cervesa carbonatada amb un perfil de sabor i aroma &uacute;nic. En resum, el proc&eacute;s de bullida de la malta amb el ll&uacute;pol &eacute;s una etapa crucial en la producci&oacute; de cervesa. A trav&eacute;s d\'aquest proc&eacute;s, s\'extreuen sucres fermentables i es creen sabors i aromes &uacute;nics.&nbsp;</p>\r\n<p>El ll&uacute;pol &eacute;s un <strong>ingredient clau en la cervesa</strong>, que ajuda a equilibrar la dol&ccedil;or de la malta i a proporcionar aromes agradables.</p>', '2024-03-25 19:41:00', 5, '#cobeer,#llúpol', 0),
(45, 'Cervesa sí, però amb cap!', 'Si els adolescents són ben informats i encoratjats a fer eleccions responsables, poden gaudir de la cervesa amb seguretat i sense riscos per a la seva', 'Albert Guardiola', '<p>El <strong>consum responsable de cerves</strong>a &eacute;s una q&uuml;esti&oacute; important i ha de ser considerat especialment quan es tracta d\'adolescents. &Eacute;s important que els adolescents comprenguin que l\'alcohol pot ser perjudicial per a la seva salut i que el consum excessiu pot tenir greus conseq&uuml;&egrave;ncies a curt i llarg termini. El primer pas cap a un consum responsable de cervesa &eacute;s educar als adolescents sobre els efectes de l\'alcohol en el cos i en la ment. Han de ser conscients que el consum d\'alcohol pot afectar la seva capacitat de prendre decisions i de conduir, i pot causar danys irreparables als &ograve;rgans interns. Els adolescents tamb&eacute; han de comprendre que el consum excessiu d\'alcohol pot afectar el seu desenvolupament f&iacute;sic i mental, i que pot afectar negativament el seu rendiment escolar i les seves relacions socials.</p>\r\n<p>Els pares i els educadors han de jugar un paper important en la promoci&oacute; d\'un consum responsable de cervesa entre els adolescents. Han de parlar obertament amb els seus fills o estudiants sobre els riscos del consum d\'alcohol i establir l&iacute;nies clares de comunicaci&oacute; perqu&egrave; els adolescents puguin parlar sobre qualsevol problema relacionat amb l\'alcohol. Els adolescents tamb&eacute; han de ser ensenyats a fer eleccions responsables quan es tracta de consumir alcohol. Han de ser encoratjats a beure amb moderaci&oacute; i a no conduir despr&eacute;s de beure. Tamb&eacute; han de ser conscients que el consum d\'alcohol pot ser una activitat social agradable, per&ograve; han de saber quan aturar-se i quan dir \"no\" si se\'ls ofereix m&eacute;s alcohol del que poden suportar. En resum, el consum responsable de cervesa entre adolescents &eacute;s una q&uuml;esti&oacute; important que requereix educaci&oacute;, suport i comunicaci&oacute; oberta. Si els adolescents s&oacute;n ben informats i encoratjats a fer eleccions responsables, poden <strong>gaudir de la cervesa amb seguretat</strong> i sense riscos per a la seva salut i benestar.</p>', '2024-03-24 09:10:00', 2, '#cobeer,#consum,#responsable', 0),
(64, 'La fermentació de la cervesa, molt fàcil!', 'La fermentació és una part important del procés de fer cervesa artesana. Si estàs interessat en com fer cervesa a casa, és important que entenguis els', 'Albert', '<p>La <strong>fermentaci&oacute;</strong> &eacute;s una part important del proc&eacute;s de fer cervesa artesana. Si est&agrave;s interessat en com fer cervesa a casa, &eacute;s important que entenguis els fonaments de la fermentaci&oacute;. Aqu&iacute; tens tot el que necessites saber. La fermentaci&oacute; &eacute;s el proc&eacute;s qu&iacute;mic en el qual els sucres del most s&oacute;n convertits en alcohol i gas carb&ograve;nic pel llevat. El llevat &eacute;s un microorganisme que consumeix els sucres presents en el most i produeix alcohol i gas carb&ograve;nic com a resultat. A mesura que el llevat consumeix els sucres, la densitat del most disminueix i la cervesa s\'acaba fermentant. Hi ha dues tipus de fermentaci&oacute; que es poden utilitzar per fer cervesa artesana: <em>la fermentaci&oacute; alta i la fermentaci&oacute; baixa</em>. La fermentaci&oacute; alta &eacute;s el proc&eacute;s en el qual el llevat es posa a fermentar a temperatures m&eacute;s altes, i produeix cerveses amb un sabor m&eacute;s <strong>dol&ccedil; i afruitat!</strong></p>\r\n<p>&nbsp;</p>\r\n<p>La fermentaci&oacute; baixa &eacute;s quan el llevat es posa a fermentar a temperatures m&eacute;s baixes, i produeix cerveses m&eacute;s lleugeres i amargues. El temps de fermentaci&oacute; tamb&eacute; &eacute;s important. Generalment, la fermentaci&oacute; prim&agrave;ria t&eacute; lloc durant una setmana a una temperatura constant. Despr&eacute;s, la cervesa es traspassa a un altre recipient per a la fermentaci&oacute; secund&agrave;ria, on es deixa reposar durant una o dues setmanes m&eacute;s. La fermentaci&oacute; secund&agrave;ria ajuda la cervesa a madurar i desenvolupar m&eacute;s sabor i aroma. Un altre factor important en la fermentaci&oacute; de la cervesa &eacute;s la quantitat de llevat que s\'utilitza. Utilitzar massa o massa poc llevat pot afectar negativament el proc&eacute;s de fermentaci&oacute;. &Eacute;s important seguir les recomanacions del fabricant per assegurar-te que est&agrave;s utilitzant la quantitat adequada de llevat.</p>\r\n<p>&nbsp;</p>\r\n<p>En resum, <span style=\"text-decoration: underline;\">la fermentaci&oacute; &eacute;s una part important del proc&eacute;s de fer cervesa artesana</span>. &Eacute;s important comprendre els fonaments del proc&eacute;s per assegurar-te que la teva cervesa surti b&eacute;. Segueix les recomanacions de temperatura, temps i quantitat de llevat per obtenir una cervesa artesana deliciosa i ben fermentada. Que tingueu bona fermentaci&oacute;!</p>\r\n<p>&nbsp;</p>', '2024-03-24 08:55:00', 5, '#fermentació', 0),
(141, 'La cervesa es pot submergir sota l\'aigua?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Olga', '<ul>\r\n<li>Dolorem de la pradera dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>\r\n</ul>\r\n<p style=\"text-align: center;\"><em><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></em></p>', '2024-03-24 09:08:00', 5, '#cervesa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `indBaja` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`, `descripcion`, `indBaja`) VALUES
(2, 'Dietètica', 'CFGS de Dietètica)', b'0'),
(3, 'Comerç Internacional', 'CFGS de Comerç Internacional', b'0'),
(4, 'CAI', 'CFGM de Cures Auxiliars', b'0'),
(5, 'DAW', 'CFGS de DAW', b'0'),
(6, 'Farmàcia', 'CFGM de Farmàcia i Parafamàcia', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `id` int UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `idArticulo` int UNSIGNED NOT NULL,
  `indBaja` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id`, `url`, `idArticulo`, `indBaja`) VALUES
(55, '/DB/local/media/64/ferm2.jpg', 64, b'0'),
(56, '/DB/local/media/141/sibonne-beach-hotel.jpg', 141, b'0'),
(57, '/DB/local/media/45/consumo.jpg', 45, b'0'),
(60, '/DB/local/media/30/logo.png', 30, b'0'),
(62, '/DB/local/media/33/lupulo.jpg', 33, b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `idDepartamento` int UNSIGNED NOT NULL,
  `indBaja` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_articulos_departamentos` (`idDepartamento`);
ALTER TABLE `articulo` ADD FULLTEXT KEY `search_idx` (`titulo`,`autor`,`texto`,`descripcion`,`tags`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_recursos_articulos` (`idArticulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_usuarios_departamentos` (`idDepartamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `pk_articulos_departamentos` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD CONSTRAINT `pk_recursos_articulos` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `pk_usuarios_departamentos` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
