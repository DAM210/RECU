CREATE DATABASE IF NOT EXISTS tienda;

USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE IF NOT EXISTS `familias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `nombre`) VALUES
(1, 'drama'),
(2, 'terror'),
(3, 'comedia'),
(4, 'accion'),
(7, 'fantasia'),
(10, 'documental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `ruta`) VALUES
(1, 'pulpFiction.jpg', 'Imagenes/pulpFiction.jpg'),
(2, 'elPadrino.jpg', 'Imagenes/elPadrino.jpg'),
(3, 'LaVidaEsBella.jpg', 'Imagenes/LaVidaEsBella.jpg'),
(4, 'ElClubDeLaLucha.jpg', 'Imagenes/ElClubDeLaLucha.jpg'),
(5, 'CadenaPerpetua.jpg', 'Imagenes/CadenaPerpetua.jpg'),
(6, 'schindlerList.jpg', 'Imagenes/schindlerList.jpg'),
(7, 'Saw.jpg', 'Imagenes/Saw.jpg'),
(8, 'reservoirDogs.jpg', 'Imagenes/reservoirDogs.jpg'),
(9, 'elSenorDeLosAnillosElRetornoDelRey.jpg', 'Imagenes/elSenorDeLosAnillosElRetornoDelRey.jpg'),
(10, 'elPadrinoParteII.jpg', 'Imagenes/elPadrinoParteII.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `precio` float NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `familia_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL, -- Nueva columna para la imagen
  PRIMARY KEY (`codigo`),
  KEY `fk_productos_familias` (`familia_id`),
  CONSTRAINT `fk_productos_familias` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_imagenes` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE -- Nueva restricción de clave externa
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `precio`, `nombre`, `descripcion`, `familia_id`,`imagen_id`) VALUES
(1, 5.4, 'Pulp Fiction', 'Jules y Vincent, dos asesinos a sueldo con no demasiadas luces, trabajan para el gángster Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su atractiva mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse \"manos a la obra\". Su misión: recuperar un misterioso maletín.', 2,1),
(2, 3.7, 'El Padrino', 'América, años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Fredo (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \"Il consigliere\" Tom Hagen (Robert Duvall), se niega a participar en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.', 1,2),
(3, 5.75, 'La vida es bella', 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo, en la Toscana, con la intención de abrir una librería. Allí conoce a la encantadora Dora y, a pesar de que es la prometida del fascista Rodolfo, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.', 4,3),
(4, 7.66, 'El club de la lucha', 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador. ', 1,4),
(5, 8.7, 'Cadena perpetua', 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.', 1,5),
(6, 7.55, 'La lista de Schindler', 'Oskar Schindler (Liam Neeson), un empresario alemán de gran talento para las relaciones públicas, busca ganarse la simpatía de los nazis de cara a su beneficio personal. Después de la invasión de Polonia por los alemanes en 1939, Schindler consigue, gracias a sus relaciones con los altos jerarcas nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente, gracias sobre todo a su gerente Itzhak Stern (Ben Kingsley), también judío. Pero conforme la guerra avanza, Schindler y Stern comienzan ser conscientes de que a los judíos que contratan, los salvan de una muerte casi segura en el temible campo de concentración de Plaszow, que lidera el Comandante nazi Amon Goeth (Ralph Fiennes), un hombre cruel que disfruta ejecutando judíos.', 3,6),
(7, 10.55, 'Saw', 'Adam se despierta encadenado dentro de una decrépita cámara subterránea. A su lado, hay otra persona encadenada, el Dr. Lawrence Gordon. Entre ellos hay un hombre muerto. Ninguno de los dos sabe por qué está allí, pero tienen un casette con instrucciones para que el Dr. Gordon mate a Adam en un plazo de ocho horas. Recordando una investigación de asesinato llevada a cabo por un detective llamado Tapp, Gordon descubre que él y Adam son victimas de un psicópata conocido como Jigsaw. Sólo disponen de unas horas para desenredar el complicado rompecabezas en el que están inmersos.', 2,7),
(8, 3.55, 'Reservoir Dogs', 'Una banda organizada es contratada para atracar una empresa y llevarse unos diamantes. Sin embargo, antes de que suene la alarma, la policía ya está allí. Algunos miembros de la banda mueren en el enfrentamiento con las fuerzas del orden, y los demás se reúnen en el lugar convenido.', 4,8),
(9, 4.66, 'El señor de los anillos: El retorno del rey', 'Las fuerzas de Saruman han sido destruidas, y su fortaleza sitiada. Ha llegado el momento de decidir el destino de la Tierra Media, y, por primera vez, parece que hay una pequeña esperanza. El interés del señor oscuro Sauron se centra ahora en Gondor, el último reducto de los hombres, cuyo trono será reclamado por Aragorn. Sauron se dispone a lanzar un ataque decisivo contra Gondor. Mientras tanto, Frodo y Sam continuan su camino hacia Mordor, con la esperanza de llegar al Monte del Destino.', 7,9),
(10, 11.2, 'El padrino. Parte II', 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael como jefe de los negocios familiares y los orígenes del patriarca, Don Vito Corleone, primero en su Sicilia natal y posteriormente en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.', 1,10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_spanish2_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`) VALUES
('daw203', '827ccb0eea8a706c4c34a16891f84e7b'),
('root', 'af8f9dffa5d420fbc249141645b962ee');
