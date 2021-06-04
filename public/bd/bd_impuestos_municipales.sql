create database bd_impuestos_municipales;
use bd_impuestos_municipales;
/*probando cambios a todo minuscula*/

create table oficina
(
id_oficina int not null primary key auto_increment,
cod varchar(10) not null unique,
nombre varchar(50) not null,
created_at timestamp,
updated_at timestamp
);

create table empleado
(
id_empleado int not null primary key auto_increment,
dni int(8) not null unique,
nombre varchar(25) not null,
apellido varchar(35) not null,
cargo varchar(45) not null,
id_oficina int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_id_oficina foreign key (id_oficina)
references oficina(id_oficina)
);

create table rol
(
id_rol int not null primary key auto_increment,
nombre varchar(35) not null,
descripcion varchar(100)
);
insert into rol
values
(1, 'Administrador', 'encargado de administrar todas las funciones del sistema'),
(2, 'Logistica', ''),
(3, 'Recursos Humanos', ''),
(4, 'Operaciones', ''),
(5, 'Planeamiento', '');

create table modulo
(
id_modulo int not null primary key auto_increment,
nombre varchar(40) not null,
icono varchar(25),
estado boolean
);
insert into modulo
values
(1, "Administración de trabajadores", "fa fa-", 1),
(2, "Adminstración de usuarios y roles", "fa fa-", 1),
(3, "Administración de Clientes", "fa fa-", 1),
(4, "Administrar Contribuyente", "fa fa-", 1),
(5, "Administrar Contratos", "fa fa-", 1),
(6, "Administración de servicios", "fa fa-", 1);

create table submodulo
(
id_submodulo int not null primary key auto_increment,
nombre varchar(35) not null,
icono varchar(35),
estado boolean not null,
url varchar(45),
id_modulo int not null,

constraint fk_id_modulo_submodulo foreign key(id_modulo)
references modulo(id_modulo)
);
insert into submodulo
values
(1, 'empleado', 'fa', 1, 'empleado', 1),
(2, 'contrato', 'fa', 1, 'contrato', 5),
(3, 'contribuyente', 'fa', 1, 'contribuyente', 4),
(4, 'oficina', 'fa', 1, 'oficina', 1),
(5, 'servicio', 'fa', 1, 'servicio', 6),
(6, 'usuario', 'fa', 1, 'usuario', 2),
(7, 'Persona Natural', 'fa', 1, 'persona', 3),
(8, 'Persona Juridica', 'fa', 1, 'empresa', 3);

create table rol_submodulo
(
id_rol_submodulo int not null primary key auto_increment,
id_rol int not null,
id_submodulo int not null,
constraint fk_id_rol foreign key(id_rol)
references rol(id_rol),
constraint fk_id_submodulo foreign key(id_submodulo)
references submodulo(id_submodulo)
);
insert into rol_submodulo
values
/*administrador*/
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(17, 1, 7),
(18, 1, 8),
/*logistica*/
(7, 2, 1),
(8, 2, 2),
/*recursos humanos*/
(9, 3, 3),
(10, 3, 4),
/*operaciones*/
(11, 4, 5),
(12, 4, 6),
/*planeamiento*/
(13, 5, 3),
(14, 5, 4),
(15, 5, 5),
(16, 5, 6);

create table servicio
(
id_servicio int not null primary key auto_increment,
nombre varchar(50) not null,
descripcion varchar(200) not null,
tarifa double not null,
rubro varchar(50) not null,

created_at timestamp,
updated_at timestamp
);

create table persona_natural
(
id_persona_natural int not null primary key,
dni int(8) not null unique,
nombre varchar(25) not null,
apellido_pa varchar(25) not null,
apellido_ma varchar(25) not null,
fecha_nacimiento date not null,
sexo varchar(1) not null,
profesion varchar(45) not null,
estado boolean not null,

created_at timestamp,
updated_at timestamp
);

create table persona_juridico
(
id_persona_juridico int not null primary key auto_increment,
ruc int(15) not null unique,
id_persona_natural int not null,
razon_social varchar(50) not null,
descripcion varchar(500) not null,
estado boolean,

created_at timestamp,
updated_at timestamp,
constraint fk_id_persona_natural foreign key(id_persona_natural)
references persona_natural(id_persona_natural)
);

create table tipo_identificacion
(
id_tipo_identificacion int not null primary key,
nombre varchar(15) not null
);
insert into tipo_identificacion
values
(1, "DNI"),
(2, "RUC");

create table contribuyente 
(
id_contribuyente int not null primary key auto_increment,
numero_telefonico int(9),
direccion varchar(50) not null,
referencia varchar(50),
estado boolean,

created_at timestamp,
updated_at timestamp
);

create table contribuyente_dni
(
id_contribuyente_dni int not null primary key auto_increment,
id_persona_natural int not null,
id_tipo_identificacion int not null,
id_contribuyente int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_id_persona_natural_dni foreign key(id_persona_natural)
references persona_natural(id_persona_natural),
constraint fk_id_tipo_identificacion_dni foreign key(id_tipo_identificacion)
references tipo_identificacion(id_tipo_identificacion),
constraint fk_id_contribuyente_dni foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
);

create table contribuyente_ruc
(
id_contribuyente_ruc int not null primary key auto_increment,
id_persona_juridico int not null,
id_tipo_identificacion int not null,
id_contribuyente int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_id_persona_juridico_ruc foreign key(id_persona_juridico)
references persona_juridico(id_persona_juridico),
constraint fk_id_tipo_identificacion_ruc foreign key(id_tipo_identificacion)
references tipo_identificacion(id_tipo_identificacion),
constraint fk_id_contribuyente_ruc foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
);

create table estado_contrato
(
id_estado_contrato int not null primary key,
nombre varchar(45) not null
);
insert into estado_contrato
values
(1, "Pendiente"),
(2, "En proceso"),
(3, "Finalizado");

create table contrato
(
id_contrato int not null primary key auto_increment,
cod int(4) not null unique,
nombre varchar(50) not null,
descripcion varchar(100) not null,
impuesto double not null,
id_servicio int not null,
id_estado_contrato int not null,
id_contribuyente int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_id_servicio foreign key(id_servicio)
references servicio(id_servicio),
constraint fk_id_estado_contrato foreign key(id_estado_contrato)
references estado_contrato(id_estado_contrato),
constraint fk_id_contribuyente_contrato foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
);


/*create table users
(
id int not null primary key,
cuenta varchar(12) not null,
email varchar(45) not null,
email_verified_at timestamp,
password varchar(12) not null,
estado boolean,
id_empleado int not null,
remember_token ----
constraint fk_id_usuario foreign key(id_usuario)
references empleado(id_empleado),
);*/


insert into users
values
(1, 'admin', 'admin@hotmail.com', null ,'$2y$10$dsvG16/tkLMiPJYl7mzdL.Ouvy15YLCsmeREL0vIruE44gSikMV8i', 0, null, current_date(), current_date()),
(2, 'admin2', 'admin2@hotmail.com', null ,'$2y$10$dsvG16/tkLMiPJYl7mzdL.Ouvy15YLCsmeREL0vIruE44gSikMV8i', 0, null, current_date(), current_date()),
(3, 'admin3', 'admin3@hotmail.com', null ,'$2y$10$dsvG16/tkLMiPJYl7mzdL.Ouvy15YLCsmeREL0vIruE44gSikMV8i', 0, null, current_date(), current_date()),
(4, 'admin4', 'admin4@hotmail.com', null ,'$2y$10$dsvG16/tkLMiPJYl7mzdL.Ouvy15YLCsmeREL0vIruE44gSikMV8i', 0, null, current_date(), current_date());
create table users_empleado
(
id int not null primary key auto_increment,
user_id bigint unsigned not null,
empleado_id int not null,
created_at timestamp,
updated_at timestamp,
constraint fk_user_id_empleado foreign key(user_id)
references users(id),
constraint fk_empleado_id foreign key(empleado_id)
references empleado(id_empleado)
);

insert into users_empleado
values
(1, 1, 1, current_date(), current_date()),
(2, 2, 2, current_date(), current_date()),
(3, 3, 3, current_date(), current_date()),
(4, 4, 4, current_date(), current_date());
create table users_rol
(
id int not null primary key auto_increment,
user_id bigint unsigned not null,
rol_id int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_user_id_rol foreign key(user_id)
references users(id) on delete cascade,
constraint fk_rol_id foreign key(rol_id)
references rol(id_rol) on delete cascade
);
insert into users_rol
values
(1, 1, 1, current_date(), current_date()),
(2, 2, 2, current_date(), current_date()),
(3, 3, 3, current_date(), current_date()),
(4, 4, 4, current_date(), current_date());

