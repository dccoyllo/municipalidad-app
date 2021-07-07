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
on delete cascade
);

create table rol
(
id_rol int not null primary key auto_increment,
nombre varchar(35) not null,
descripcion varchar(100)
);
insert into rol
values
(1, 'Administrador', ''),
(2, 'Logistica', ''),
(3, 'Operaciones', '');

create table modulo
(
id_modulo int not null primary key auto_increment,
nombre varchar(40) not null,
icono varchar(25),
estado boolean
);
insert into modulo
values
(1, "Administrar Trabajadores", "fa fa-address-card-o", 1),
(2, "Adminstrar Usuarios", "fa fa-user", 1),
(3, "Administrar Clientes", "fa fa-money", 1),
(4, "Administrar Contribuyente", "fa fa-handshake-o", 1),
(5, "Administrar Contratos", "fa fa-book", 1),
(6, "Administrar Servicios", "fa fa-cc", 1),
(7, "Administrar Cobros", "fa fa-usd", 1);

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
(1, 'Empleados', 'fa', 1, 'empleado', 1),
(2, 'Contratos', 'fa', 1, 'contrato', 5),
(3, 'Crear contrato', 'fa', 1, 'contrato/create', 5),
(4, 'Contribuyentes', 'fa', 1, 'contribuyente', 4),
(5, 'Crear Contribuyente', 'fa', 1, 'contribuyente/create', 4),
(6, 'Oficinas', 'fa', 1, 'oficina', 1),
(7, 'Servicios', 'fa', 1, 'servicio', 6),
(8, 'Usuarios', 'fa', 1, 'usuario', 2),
(9, 'Personas', 'fa', 1, 'persona', 3),
(10, 'Empresas', 'fa', 1, 'empresa', 3),
(11, 'Arbitrios', 'fa', 1, 'detalles-arbitrios', 7),
(12, 'Agregar', 'fa', 1, 'detalles-arbitrios/create', 7);

create table rol_modulo
(
id_rol_modulo int not null primary key auto_increment,
id_rol int not null,
id_modulo int not null,
constraint fk_id_rol foreign key(id_rol)
references rol(id_rol),
constraint fk_id_modulo foreign key(id_modulo)
references modulo(id_modulo)
);
insert into rol_modulo
values
/*administrador*/
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),

/*logistica*/
(7, 2, 3),
(8, 2, 4),
(9, 2, 5),
/*operaciones*/
(10, 3, 6),
(11, 3, 7),
(12, 1, 7);

create table servicio
(
id_servicio int not null primary key auto_increment,
abreviatura varchar(8) unique not null,
nombre varchar(50) not null,
descripcion varchar(200) not null,
tarifa double not null,
rubro varchar(50) not null,

created_at timestamp,
updated_at timestamp
);

create table persona_natural
(
id_persona_natural int not null primary key auto_increment,
dni int(8) not null unique,
nombre varchar(25) not null,
apellido_pa varchar(25) not null,
apellido_ma varchar(25) not null,
fecha_nacimiento date not null,
sexo varchar(1) not null,
profesion varchar(45) not null,

created_at timestamp,
updated_at timestamp
);

create table persona_juridico
(
id_persona_juridico int not null primary key auto_increment,
ruc int(15) not null unique,
propietario varchar(100) not null,
razon_social varchar(50) not null,
descripcion varchar(500) not null,
fecha date,

created_at timestamp,
updated_at timestamp
);

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

create table terreno 
(
id_terreno int not null primary key auto_increment,
ancho int,
largo int,
alto double,
area int,
piso int,	
tipo_construccion varchar (50),
tipo_terreno varchar (50),
id_contribuyente int,

constraint fk_id_contribuyente_terreno foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
);
insert into terreno
values
(1, 50, 100, 2.5, 150, 2, "Material Noble", "Casa", 1),
(2, 35, 70, 2.5, 120, 2, "Material Noble", "Casa", 2),
(3, 45, 90, 2.5, 140, 2, "Material Noble", "Casa", 3),
(4, 60, 120, 2.5, 170, 2, "Material Noble", "Casa", 4),
(5, 55, 90, 2.5, 160, 2, "Material Noble", "Casa", 5),
(6, 40, 80, 2.5, 120, 2, "Material Noble", "Casa", 6),
(7, 45, 75, 2.5, 130, 2, "Material Noble", "Casa", 7),
(8, 45, 110, 2.5, 140, 2, "Material Noble", "Casa", 8),
(9, 45, 90, 2.5, 125, 2, "Material Noble", "Casa", 9),
(10, 40, 70, 2.5, 110, 2, "Material Noble", "Casa", 10);

create table cobro_arbitrio 
(
id_cobro_arbitrio int not null primary key auto_increment,
tipo_pago varchar(100),
precio_mensual double not null,
pago_actual double,
precio_anual double not null,
descripcion varchar(1000),
estado varchar(100),
fecha_primer_pago date,
fecha_ultimo_pago date,
id_contribuyente int not null,

created_at timestamp,
updated_at timestamp,

constraint fk_id_contribuyente_cobro_arbitrio foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
);
insert into cobro_arbitrio
values
(1, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 1, current_date(), current_date()),
(2, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 2, current_date(), current_date()),
(3, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 3, current_date(), current_date()),
(4, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 4, current_date(), current_date()),
(5, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 5, current_date(), current_date()),
(6, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 6, current_date(), current_date()),
(7, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 7, current_date(), current_date()),
(8, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 8, current_date(), current_date()),
(9, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null, 9, current_date(), current_date()),
(10, "Mensual", 100, null, 1200, "sin descripción", "Pendiente", null, null,10, current_date(), current_date());

create table contribuyente_dni
(
id_contribuyente_dni int not null primary key auto_increment,
id_persona_natural int not null,
id_contribuyente int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_id_persona_natural_dni foreign key(id_persona_natural)
references persona_natural(id_persona_natural),
constraint fk_id_contribuyente_dni foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
on update cascade
on delete cascade
);

create table contribuyente_ruc
(
id_contribuyente_ruc int not null primary key auto_increment,
id_persona_juridico int not null,
id_contribuyente int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_id_persona_juridico_ruc foreign key(id_persona_juridico)
references persona_juridico(id_persona_juridico),
constraint fk_id_contribuyente_ruc foreign key(id_contribuyente)
references contribuyente(id_contribuyente)
on update cascade
on delete cascade
);

create table estado_contrato
(
id_estado_contrato int not null primary key,
nombre varchar(45) not null,
color varchar(45)
);
insert into estado_contrato
values
(1, "Pendiente", "label-warning"),
(2, "En proceso", "label-primary"),
(3, "Finalizado", "label-success");

create table contrato
(
id_contrato int not null primary key auto_increment,
cod varchar(8) not null unique,
nombre varchar(50) not null,
fecha date not null,
descripcion varchar(100) default "Sin descripción",
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
on update cascade
on delete cascade
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
value
(1, 'admin', 'admin@hotmail.com', null ,'$2y$10$dsvG16/tkLMiPJYl7mzdL.Ouvy15YLCsmeREL0vIruE44gSikMV8i', 0, null, current_date(), current_date());

create table users_empleado
(
id int not null primary key auto_increment,
user_id bigint unsigned not null,
empleado_id int not null unique,
created_at timestamp,
updated_at timestamp,
constraint fk_user_id_empleado foreign key(user_id)
references users(id),
constraint fk_empleado_id foreign key(empleado_id)
references empleado(id_empleado)
on delete cascade
);

create table users_rol
(
id int not null primary key auto_increment,
user_id bigint unsigned not null,
rol_id int not null,

created_at timestamp,
updated_at timestamp,
constraint fk_user_id_rol foreign key(user_id)
references users(id),
constraint fk_rol_id foreign key(rol_id)
references rol(id_rol)
on delete cascade
);
insert into users_rol
value
(1, 1, 1, current_date(), current_date());