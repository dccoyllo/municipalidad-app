INSERT INTO `bd_impuestos_municipales`.`servicio` (`NOMBRE`, `DESCRIPCION`, `TARIFA`, `RUBRO`) VALUES ('Limpieza Publica', 'Barrido de calles y avenidas, tambien a la recoleccion y transporte y disposcion final.', '1255', 'Servicios');
INSERT INTO `bd_impuestos_municipales`.`servicio` (`NOMBRE`, `DESCRIPCION`, `TARIFA`, `RUBRO`) VALUES ('Mantenimiento de Areas publicas', 'Mantener en condiciones optimas de limpieza de las calles, plazas, etc.', '2566', 'Servicios');
INSERT INTO `bd_impuestos_municipales`.`servicio` (`NOMBRE`, `DESCRIPCION`, `TARIFA`, `RUBRO`) VALUES ('Servicios y Control', 'Se binda el servici de emitir partidas de nacimiento, acta de defunciones,etc, tambien las licencias de conducir, autorizacion de ruta y la administracion del los mercado.', '5144', 'Servicios');
INSERT INTO `bd_impuestos_municipales`.`servicio` (`NOMBRE`, `DESCRIPCION`, `TARIFA`, `RUBRO`) VALUES ('Seguridad Ciudadana', 'Se realizan patrullajes motorizados, esto se desarrolla con la coordinacion junto a la PNP garantizando la seguridad ciudadana', '4666', 'Sevicios');
INSERT INTO `bd_impuestos_municipales`.`servicio` (`NOMBRE`, `DESCRIPCION`, `TARIFA`, `RUBRO`) VALUES ('Alumbrado Publico', 'Promoveer la iluminacion necesaria en los espacios publicos, con el fin de garantizar la seguridad de peatones y vehiculos.', '2313', 'Servicio');
INSERT INTO `bd_impuestos_municipales`.`servicio` (`NOMBRE`, `DESCRIPCION`, `TARIFA`, `RUBRO`) VALUES ('Administracion del Cementerio', 'Contruimos, habilitamos, conservamos y administramos los cementerios.', '7899', 'Servicio');


INSERT INTO `bd_impuestos_municipales`.`oficina` (`COD`, `NOMBRE`) VALUES ('001', 'Oficina de secretaria general');
INSERT INTO `bd_impuestos_municipales`.`oficina` (`COD`, `NOMBRE`) VALUES ('101', 'Oficina de administracion y finanazas');
INSERT INTO `bd_impuestos_municipales`.`oficina` (`COD`, `NOMBRE`) VALUES ('102', 'Oficina de asesoria juridica');
INSERT INTO `bd_impuestos_municipales`.`oficina` (`COD`, `NOMBRE`) VALUES ('103', 'Oficina de planeamiento y presupuesto');

INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('32541878', 'Miguel Ángel ', 'Burguete García ', 'Jefe de logistica', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('96589632', 'Francisco', 'Caballero Green ', 'Jefe de comunicaciones', '4');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('36584756', 'Juan Gabriel', 'Calvillo Carrasco ', 'Administrador Comercial', '4');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('68547269', 'Erick Fernando ', 'Cano Figueroa ', 'Marketing', '4');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('78946231', 'Ciro ', 'Carrera Santiago ', 'Recursos Humanos', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('65498784', 'Alejandro ', 'Casas Bastida ', 'Administrador de Operaciones', '3');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('32167954', 'Enrique Alfonso ', 'Castillo López ', 'Administrador Comercial', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('32148974', 'Javier Alfredo ', 'Cervantes Gutiérrez ', 'Marketing', '3');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('63479946', 'María del Rocío ', 'Chacón Murillo', 'Recursos Humanos', '4');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('78421646', 'Rafael Alberto', 'Chávez Rodríguez ', 'Recursos Humanos', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('78942169', 'Darío Carlos', 'Contreras Favila', 'Recursos Humanos', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('78413656', 'Julio Rogelio ', 'Coronado Medina', 'Administrador Comercial', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('98794612', 'Soto Mario', 'De la Medina ', 'Administrador de Operaciones', '3');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('98747456', 'Héctor Federico', 'Delgado Guajardo', 'Administrador de Operaciones', '4');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('74568945', 'Jorge Armando', 'Elizalde Herrera ', 'Marketing', '2');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('65498745', 'María Antonieta', 'Forment Hernández ', 'Marketing', '3');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('21347848', 'José de Jesús ', 'Garcés Yanome ', 'Marketing', '4');
INSERT INTO `bd_impuestos_municipales`.`empleado` (`DNI`, `NOMBRE`, `APELLIDO`, `CARGO`, `ID_OFICINA`) VALUES ('19898789', 'José Alfonso', 'García López ', 'Marketing', '2');