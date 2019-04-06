CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`) VALUES
(1, 'usuario', 'usuario', 'usuario@usuario.com', '$2y$04$kGafnwdOCic2FTw5uDaY6e4w4UJdMoEZVycxTF2OqWMIQuEJdapbW'),
(3, 'usuarioDos', 'usuarioDos', 'usuario2@usuario.com', '$2y$04$tDQYi9GTABnSauK1z1qk3emINoFgTLL6YIYaZcBchgVlfq4SGQMke');

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
