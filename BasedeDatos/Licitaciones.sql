	drop database if exists LicitacionesFinal;
	create DATABASE LicitacionesFinal;
	USE LicitacionesFinal;

drop table if exists Oferta ;
    
CREATE TABLE `aboga` (
    `id` INT(12) NOT NULL,
    `nombre_aboga` VARCHAR(100) NOT NULL,
    `valido_id` INT(12) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `causal` (
    `id` INT(12) NOT NULL,
    `nombre_causal` VARCHAR(100) NOT NULL,
    `valido_id` INT(12) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;


CREATE TABLE `certificadosf` (
    `id` INT(11) NOT NULL,
    `nombre` VARCHAR(50) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;


-- Tablas con Poco Proposito Investigar
CREATE TABLE `ecce` (
    `id` INT(11) NOT NULL,
    `vtIVA` VARCHAR(50) NOT NULL,
    `acum` VARCHAR(80) NOT NULL,
    `obligado` VARCHAR(10) NOT NULL,
    `ebitda` VARCHAR(80) NOT NULL,
    `tipoeventu` VARCHAR(80) NOT NULL,
    `vpn` VARCHAR(80) NOT NULL,
    `ordenc` VARCHAR(80) NOT NULL,
    `fechaoc` DATE NOT NULL,
    `fechafoc` DATE NOT NULL,
    `ctari` VARCHAR(80) NOT NULL,
    `targetari` VARCHAR(80) NOT NULL,
    `tarim` VARCHAR(80) NOT NULL,
    `ebitdatm` VARCHAR(80) NOT NULL,
    `vpntari` VARCHAR(80) NOT NULL,
    `myse` INT(11) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `formanexos` (
    `id` INT(11) NOT NULL,
    `entregable` VARCHAR(100) NOT NULL,
    `firmarl` VARCHAR(50) NOT NULL,
    `requisitos` VARCHAR(500) NOT NULL,
    `observaciones` VARCHAR(500) NOT NULL,
    `myse` VARCHAR(50) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8;





-- CheklistLicitaciones
CREATE TABLE `requecaractecni` (
    `id` INT(11) NOT NULL,
    `entregable` VARCHAR(100) NOT NULL,
    `firmarl` VARCHAR(50) NOT NULL,
    `requisitos` VARCHAR(500) NOT NULL,
    `observaciones` VARCHAR(500) NOT NULL,
    `myse` VARCHAR(50) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `requeexpe` (
    `id` INT(11) NOT NULL,
    `entregable` VARCHAR(100) NOT NULL,
    `firmarl` VARCHAR(50) NOT NULL,
    `requisitos` VARCHAR(500) NOT NULL,
    `observaciones` VARCHAR(500) NOT NULL,
    `myse` VARCHAR(50) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `requejudiricos` (
    `id` INT(11) NOT NULL,
    `entregable` INT(11) NOT NULL,
    `firmarl` VARCHAR(100) NOT NULL,
    `requisitos` VARCHAR(500) NOT NULL,
    `observaciones` VARCHAR(500) NOT NULL,
    `myse` MEDIUMTEXT NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `requerimientosj` (
    `id` INT(11) NOT NULL,
    `nombreRJ` VARCHAR(100) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE `requifinancieros` (
    `id` INT(11) NOT NULL,
    `entregable` VARCHAR(50) NOT NULL,
    `firmarl` VARCHAR(50) NOT NULL,
    `requisitos` VARCHAR(500) NOT NULL,
    `observciones` VARCHAR(500) NOT NULL,
    `myse` VARCHAR(50) NOT NULL
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4;



-- Base de Datos Licitaciones

CREATE TABLE Usuario (

    cedula_U BIGINT NOT NULL unique,
	PRIMARY KEY (cedula_U),
       
    imagen_perfil varchar(150) ,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    estado CHAR(1) DEFAULT 'A',
	soporte_caso CHAR(2) DEFAULT 'No'
    
);

CREATE TABLE priv_certificaciones (

    id_priv_certificaciones TinyInt NOT NULL auto_increment,
    PRIMARY KEY (id_priv_certificaciones),
    
    privilegio VARCHAR(30) NOT NULL
    
);
INSERT INTO `priv_certificaciones` (`id_priv_certificaciones`, `privilegio`) VALUES
(1, 'Coordinador'),
(2, 'Usuario'),
(3, 'Consultor'),
(4, 'UsuarioPeticiones');

CREATE TABLE priv_licitaciones (

    id_priv_licitaciones TinyInt NOT NULL auto_increment,
    PRIMARY KEY (id_priv_licitaciones),
    
    privilegio VARCHAR(30) NOT NULL
    
);
INSERT INTO `priv_licitaciones` (`privilegio`) VALUES
('Administrador'),
('Usuario'),
('Asignar'),
('Usuario CCE'),
('ConsultorVP'),
('Corporativo'),
('Govermment'),
('Pymes'),
('Whosale');

CREATE TABLE TipoAcceso (

	id_tipo_acceso TinyInt NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id_tipo_acceso),
  
	Acceso varchar(50) NOT NULL
  
);

INSERT INTO `TipoAcceso` (`id_tipo_acceso`, `Acceso`) VALUES
(1, 'Multiple'),
(2, 'Licitaciones'),
(3, 'Certificaciones'),
(4, 'Facturaciones'),
(5, 'Contrataciones');


CREATE TABLE Acceso (

    id_Acceso SMALLINT AUTO_INCREMENT,
	PRIMARY KEY (id_Acceso),
    usuario VARCHAR(100) not null,
    clave VARCHAR(200) NOT NULL,
	UsuarioNuevo char(1) default'0',

	cedula_U BIGINT NOT NULL,
	priv_licitaciones_id tinyint NOT NULL,
	priv_certificaciones_id tinyint NOT NULL,
	tipo_acceso_id tinyint NOT NULL,
    
    FOREIGN KEY (cedula_U)
	REFERENCES Usuario (cedula_U),
    
	FOREIGN KEY (priv_licitaciones_id)
	REFERENCES priv_licitaciones (id_priv_licitaciones),
    
	FOREIGN KEY (priv_certificaciones_id)
	REFERENCES priv_certificaciones (id_priv_certificaciones)
        
);
INSERT INTO `Acceso` (`usuario`, `clave`, `cedula_U`, `priv_licitaciones_id`,`priv_certificaciones_id`,`tipo_acceso_id`) VALUES
('nmorenoh', 'OGJtcWNpTDM0bDViRDYybm9ia2RXdz09', '1001084291', 1, 1, 1);

CREATE TABLE Acceso_TipoAcceso(

	Acceso_id SMALLINT NOT NULL,
	FOREIGN KEY (Acceso_id)
        REFERENCES Acceso (id_Acceso),
	tipo_acceso_id TINYINT NOT NULL,
	FOREIGN KEY (tipo_acceso_id)
        REFERENCES TipoAcceso (id_tipo_acceso)
        
);
INSERT INTO `Acceso_TipoAcceso` (`Acceso_id`, `tipo_acceso_id`) VALUES
(3, 1);

CREATE TABLE BitacoraAccesos(

	id_bitacoraaccesos smallint NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (id_bitacoraaccesos),
	codigo varchar(50),
	fecha date,
	hora_inicio varchar(50),
	hora_fin varchar(50) DEFAULT 'Indeterminado',
    cedula BIGINT NOT NULL,

    FOREIGN KEY (cedula)
        REFERENCES Usuario (cedula_U)

);
-- SELECT id_bitacoraaccesos FROM BitacoraAccesos where codigo='CB17804963';
-- SELECT id_bitacoraaccesos FROM BitacoraAccesos where codigo='CB730246111';

Create table Sector(

    id_sector TinyInt NOT NULL auto_increment unique,
PRIMARY KEY (id_sector),
    nombre VARCHAR(100) NOT NULL
    
);
INSERT INTO `Sector` (`id_sector`, `nombre`) VALUES
(1, 'Prime'),
(2, 'Large'),
(3, 'Goverment'),
(4, 'Whosale'),
(5, 'Pymes');

create table Region(

    id_region TinyInt NOT NULL auto_increment unique,
PRIMARY KEY (id_region),
    nombre_reg VARCHAR(100) NOT NULL
    
);
INSERT INTO `Region` (`id_region`, `nombre_reg`) VALUES
(1, 'Centro'),
(2, 'Eje cafetero'),
(3, 'Nor occidente'),
(4, 'Norte'),
(5, 'Oriente'),
(6, 'Sur'),
(7, 'Pendiente');


CREATE TABLE Consultor (

    id_consultor SMALLINT NOT NULL auto_increment unique,
PRIMARY KEY (id_consultor),
    nombre_cons VARCHAR(150) NOT NULL
        
);
INSERT INTO `Consultor` (`nombre_cons`) VALUES
('Gloria Luz Muños Monsalve');


CREATE TABLE Director (

    id_director SMALLINT NOT NULL auto_increment unique,
PRIMARY KEY (id_director),
    nombre_dir VARCHAR(150) NOT NULL
        
);
INSERT INTO `Director` (`nombre_dir`) VALUES
('Sergio Andres Garcia Arango');

CREATE TABLE Ejecutivo (

    id_ejecutivo SMALLINT NOT NULL auto_increment unique,
PRIMARY KEY (id_ejecutivo),
    nombre VARCHAR(150) NOT NULL,
    correo VARCHAR(120) NOT NULL,
    
    sector_id TINYINT NOT NULL,
    FOREIGN KEY (sector_id)
        REFERENCES Sector (id_sector),

    region_id TINYINT NOT NULL,
    FOREIGN KEY (region_id)
        REFERENCES Region (id_region),

	consultor_id SMALLINT NOT NULL,
    FOREIGN KEY (consultor_id)
        REFERENCES Consultor (id_consultor),

	director_id SMALLINT NOT NULL,
    FOREIGN KEY (director_id)
        REFERENCES Director (id_director)

        
);
INSERT INTO `Ejecutivo` (`nombre`,`correo`,`sector_id`,`region_id`,`consultor_id`,`director_id`) VALUES
('David Muños Saldarriaga','dmunozs@emtelco.com.co',5,1,1,1);

-- Tablas Caso

create table Proceso(

  id_proceso TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_proceso),
  nombre_proc varchar (100) NOT NULL
  
);
INSERT INTO Proceso (`id_proceso`, `nombre_proc`) VALUES
(1, 'Acuerdo de confidencialidad'),
(2, 'Contratacion Directa'),
(3, 'Convocatoria Publica'),
(4, 'Diligenciamiento de formatos'),
(5, 'Estudio de Mercado'),
(6, 'Evento CCE'),
(7, 'Invitacion a contratar'),
(8, 'Invitacion a presentar Oferta'),
(9, 'Invitacion Cerrada'),
(10, 'Invitacion Publica'),
(11, 'Licitacion Publica'),
(12, 'Manifestacion de interes'),
(13, 'Registro de proveedores'),
(14, 'Rfi'),
(15, 'Rfp'),
(16, 'Rfq'),
(17, 'Seleccion Abierta'),
(18, 'Seleccion Abreviada de menor cuantia'),
(19, 'Subasta Inversa'),
(20, 'Terminos de referencia'),
(21, 'Seleccion Abreviada'),
(22, 'Legalizacion Secoop II'),
(23, 'Evento CCE NP RFI'),
(24, 'Evento CCE NP RFQ'),
(25, 'Invitacion abierta'),
(26, 'Invitacion Privada'),
(27, 'Evento CCE Nube Privada III');

create table EstadoProceso(

    id_estadoproceso TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_estadoproceso),
    nombre_estadpro VARCHAR(100) NOT NULL
    
);
INSERT INTO EstadoProceso (`id_estadoproceso`, `nombre_estadpro`) VALUES
(1, 'Documentacion Enviada'),
(2, 'En Proceso'),
(3, 'No Participamos'),
(4, 'Oferta Presentada'),
(5, 'Suspendido'),
(6, 'Oferta Presentada - Estudio Mercado');


create table Proponente(

    id_proponente TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_proponente),
    nombre_prop VARCHAR(100) NOT NULL
    
);
INSERT INTO Proponente (`id_proponente`,`nombre_prop`) VALUES
(1, 'Colombia Movil S.A. E.S.P.'),
(2, 'Une EPM Telecomunicaciones S.A'),
(3, 'Edatel S.A.'),
(4, 'UT  UNE - COLOMBIA MOVIL'),
(5, 'UT  EDATEL - COLOMBIA MOVIL'),
(6, 'UT  UNE - EDATEL'),
(7, 'UT TIGO - EDATEL');

create table CoberturaProyecto(

    id_coberturaproyecto TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_coberturaproyecto),
    zona VARCHAR(100) NOT NULL
    
);
INSERT INTO CoberturaProyecto (`id_coberturaproyecto`,`zona`) VALUES
(1, 'Nacional');

create table Poliza(

    id_poliza TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_poliza),
    nombre_pol VARCHAR(100) NOT NULL

);
INSERT INTO Poliza (`id_poliza`,`nombre_pol`) VALUES
(1, 'Si, Garantia de Seriedad de la Oferta'),
(2, 'No');

create table EstadoProyecto(

    id_estadoproyecto TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_estadoproyecto),
    nombre_estap VARCHAR(100) NOT NULL

);
INSERT INTO EstadoProyecto (`id_estadoproyecto`, `nombre_estap`) VALUES
(1, 'Pliegos'),
(2, 'Prepliegos'),
(3, 'Evento CCE');

create table Resultado(

    id_resultado TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_resultado),
    nombre_res VARCHAR(100) NOT NULL

);
INSERT INTO Resultado (`id_resultado`, `nombre_res`) VALUES
(1, 'Adjudicado'),
(2, 'Cerrado por la entidad'),
(3, 'Declarado Desierto'),
(4, 'Documentacion enviada'),
(5, 'No Participamos'),
(6, 'Perdido'),
(7, 'Por Definir'),
(8, 'Pendiente adjudicacion');

create table Poder(

    id_poder TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_poder),
    nombre_poder VARCHAR(100) NOT NULL

);
INSERT INTO Poder (`id_poder`,`nombre_poder`) VALUES
(1, 'Sin Poder'),
(2, 'Ok');

create table Causal(

    id_causal TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_causal),
    nombre_causal VARCHAR(100) NOT NULL

);
INSERT INTO Causal (`id_causal`,`nombre_causal`) VALUES
(1, 'Sin Causal'),
(2, 'Por Definir'),
(3, 'Adjudicado'),
(4, 'Alcance Tecnico'),
(5, 'Cerrado por la entidad'),
(6, 'Error en la plataforma SECOP II'),
(7, 'Error en la Plataforma del Cliente'),
(8, 'Limitado a miPymes'),
(9, 'Modelo financiero'),
(10, 'Precio'),
(11, 'Requisitos Habilitantes'),
(12, 'Requisitos Legales'),
(13, 'Precio+Calidad'),
(14, 'Precio Artifc. Bajo'),
(15, 'Pendiente'),
(16, 'Indicadores Financieros'),
(17, 'Se Presenta en Nicaragua');

create table Abogado(

    id_abogado TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_abogado),
    abogado VARCHAR(100) NOT NULL

);
INSERT INTO Abogado (`id_abogado`, `abogado`) VALUES
(1, 'Sin Abogado'),
(2, 'Diana Marcela Eslava'),
(3, 'Fabian Alejandro Vega'),
(4, 'Maira Alejandra Florez'),
(5, 'Manuela Sierra Escudero'),
(6, 'Mariana Villegas Giraldo'),
(7, 'Marcela Acevedo Arias'),
(8, 'Gloria Velasquez'),
(9, 'Julián Gregorio Neira');

create table IngenieroPreventa(

    id_ingenieropreventa TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_ingenieropreventa),
    Ingeniero VARCHAR(100) NOT NULL

);
INSERT INTO IngenieroPreventa (`id_ingenieropreventa`, `Ingeniero`) VALUES
(1, 'Prueba');


create table Producto(

    id_producto TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_producto),
    nombre_pro VARCHAR(100) NOT NULL

);

create table Certificado(

    id_certificado TinyInt NOT NULL auto_increment,
PRIMARY KEY (id_certificado),
    nombre_cer VARCHAR(100) NOT NULL

);

create table Caso(

    id_caso smallint NOT NULL auto_increment,
PRIMARY KEY (id_caso),
    myse MediumInt NOT NULL,
	fecha_creacion date NOT NULL,
	hora_creacion varchar(50),
	nit int NOT NULL,
	entidad varchar(150) NOT NULL,
    fecha_cierre date NOT NULL,
	hora_cierre varchar(50),
	presupuesto decimal NOT NULL,
    plazo_ejecucion TinyInt NOT NULL,
	mensualidad bigint not null,
    objeto_contrato TEXT NOT NULL,

    R_C CHAR(2) Not Null DEFAULT 'No',

    fecha_indicador date NOT NULL,
	hora_indicador varchar(50),
    porcentaje_poliza TINYINT Not null,
    propuesta_dias SmallInt not null,
    estampillas char(2) Not null,

	-- Fecha con nu valor predeterminado de 1000-01-01 casi no se usa evaluar si este campo si es necesario
    fecha_legalizacion date NOT NULL,
    myse_experiencia MediumInt NOT NULL,
    
        estadoproyecto_id TinyInt NOT NULL,
		ejecutivo_id SMALLINT NOT NULL,
		soporte BIGINT NOT NULL,
        proponente_id TinyInt NOT NULL,
        coberturaproyecto_id TinyInt NOT NULL,
        poliza_id TinyInt NOT NULL,
		abogado_id TinyInt NOT NULL,
		resultado_id TinyInt NOT NULL,
		poder_id TinyInt NOT NULL,
		ingenieropreventa_id TinyInt NOT NULL,
        

		FOREIGN KEY (estadoproyecto_id)
        REFERENCES EstadoProyecto (id_estadoproyecto),
        
		FOREIGN KEY (ejecutivo_id)
        REFERENCES Ejecutivo (id_ejecutivo),
        
		FOREIGN KEY (soporte)
        REFERENCES Usuario (cedula_U),
        
		FOREIGN KEY (proponente_id)
        REFERENCES Proponente (id_proponente),
        
        FOREIGN KEY (coberturaproyecto_id)
        REFERENCES CoberturaProyecto (id_coberturaproyecto),
        
		FOREIGN KEY (poliza_id)
        REFERENCES Poliza (id_poliza),
        
		FOREIGN KEY (abogado_id)
        REFERENCES Abogado (id_abogado),

		FOREIGN KEY (resultado_id)
        REFERENCES Resultado (id_resultado),

		FOREIGN KEY (poder_id)
        REFERENCES Poder (id_poder),

		FOREIGN KEY (ingenieropreventa_id)
        REFERENCES IngenieroPreventa (id_ingenieropreventa)
    
);

--    `indi_Interes` VARCHAR(150)CHARACTER SET UTF8 NOT NULL,
--    `obCalidadProces` VARCHAR(1000)CHARACTER SET UTF8 NOT NULL,
--    `obFallaProces` VARCHAR(1000)CHARACTER SET UTF8 NOT NULL,
--    `accionPreCor` VARCHAR(1000)CHARACTER SET UTF8 NOT NULL,
--    `imputabilidad` VARCHAR(50)CHARACTER SET UTF8 NOT NULL,
--    `fecAreaTec` DATE NOT NULL,
--    `horAreaTec` VARCHAR(40)CHARACTER SET UTF8 NOT NULL,
--    `segmento` VARCHAR(50)CHARACTER SET UTF8 NOT NULL

INSERT INTO Caso (`myse`,`fecha_creacion`,`hora_creacion`,`nit`,`entidad`,`fecha_cierre`,`hora_cierre`,`presupuesto`,`plazo_ejecucion`,`mensualidad`,`objeto_contrato`,`fecha_indicador`,`hora_indicador`,`porcentaje_poliza`,`propuesta_dias`,`estampillas`,`fecha_legalizacion`,`myse_experiencia`,`estadoproyecto_id`,`ejecutivo_id`,`soporte`,`proponente_id`,`coberturaproyecto_id`,`poliza_id`,`abogado_id`,`resultado_id`,`poder_id`,`causal_id`,`ingenieropreventa_id`) 
VALUES('00229574','2020-04-05','12:13:12 am',890907106,'Municipio De Envigado','2020-05-08','12:13:12 pm',20000000,8,1000000,'Legalizacion de documentos SECOP II','2020-06-05','12:13:12 pm',25,15,'No','2020-05-08',0, 2,1,1001084291,2,1,1,1,7,1,1,1);

create table Proceso_EstadoProceso_Caso(

	caso_id smallint NOT NULL,
	proceso_id TINYINT NOT NULL,
    estadoproceso_id TINYINT NOT NULL,
    causal_id TinyInt NOT NULL,
            
	FOREIGN KEY (caso_id)
        REFERENCES Caso (id_caso),

	FOREIGN KEY (proceso_id)
        REFERENCES Proceso (id_proceso),
 
	FOREIGN KEY (estadoproceso_id)
        REFERENCES EstadoProceso (id_estadoproceso),
        		
	FOREIGN KEY (causal_id)
		REFERENCES Causal (id_causal),

	numero_proceso varchar (40) NOT NULL  
 
);
INSERT INTO Proceso_EstadoProceso_Caso (`caso_id`,`proceso_id`,`estadoproceso_id`,`numero_proceso`) 
VALUES(1,23,3,'2020');

UPDATE Proceso_EstadoProceso_Caso
SET estadoproceso_id='2' WHERE caso_id='1';

SELECT PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
  FROM Caso C
  LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
  LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto

  LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
  LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso

  LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id

  where PEC.estadoproceso_id ='2' || PEC.estadoproceso_id ='5'  
  ORDER BY  C.id_caso;
  
create table Plataforma(

	id_Plataforma smallint NOT NULL auto_increment,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(100) not null,
    clave VARCHAR(200) NOT NULL,

		caso_id TINYINT NOT NULL,
		FOREIGN KEY (caso_id)
        REFERENCES Licitacion (id_caso)

);

create table Trazabilidad(

	id_trazabilidad smallint NOT NULL auto_increment,
    fecha_hora_trazabilidad TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    trazabilidad TEXT NOT NULL,

		caso_id TINYINT NOT NULL,
		FOREIGN KEY (caso_id)
        REFERENCES Licitacion (id_caso)

);

create table Producto_Caso(

	producto_id TINYINT NOT NULL,
	FOREIGN KEY (producto_id)
        REFERENCES Producto (id_producto),
	caso_id TINYINT NOT NULL,
	FOREIGN KEY (caso_id)
        REFERENCES Licitacion (id_caso)

);

create table Certificado_Caso(

	certificado_id TINYINT NOT NULL,
	FOREIGN KEY (certificado_id )
        REFERENCES Certificado (id_certificado),
	caso_id TINYINT NOT NULL,
	FOREIGN KEY (caso_id)
        REFERENCES Licitacion (id_caso)

);


-- Tabla en duda
CREATE TABLE Detalles_Usuario_Licitacion (

    licitacion_id SMALLINT NOT NULL,
    cedula BIGINT NOT NULL,
    FOREIGN KEY (licitacion_id)
        REFERENCES Licitacion (id_licitacion),
    FOREIGN KEY (cedula)
        REFERENCES Usuario (cedula_U),
        
    sector_id TINYINT NOT NULL,
    FOREIGN KEY (sector_id)
        REFERENCES Sector (id_sector),
    proceso_id TINYINT NOT NULL,
    FOREIGN KEY (proceso_id)
        REFERENCES Proceso (id_proceso)

);
--

create table EmpresaGanadora(

    id_empresaganadora TinyInt NOT NULL,
    nombre VARCHAR(100) NOT NULL
    
);

create table OfertaGanadora(

	id_ofertaganadora smallint NOT NULL,
    valor_oferta_ganadora bigint Not Null,
    
		empresaganadora_id TinyInt NOT NULL,
		FOREIGN KEY (empresaganadora_id)
		REFERENCES EmpresaGanadora (id_empresaganadora),

		caso_id smallint NOT NULL,
		FOREIGN KEY (caso_id)
		REFERENCES Casos (id_caso)
        
);


create table Oferta(

	id_oferta smallint NOT NULL auto_increment,
    PRIMARY KEY (id_oferta),
    fecha_presentacion_oferta date NOT NULL,
	hora_presentacion_oferta varchar(50),
    medio_presentacion_oferta VARCHAR(100),
    valor_oferta bigint not null,
	seguimiento CHAR(2),

		caso_id smallint NOT NULL,
		FOREIGN KEY (caso_id)
		REFERENCES Caso (id_caso)
        
);

insert into oferta (fecha_presentacion_oferta,hora_presentacion_oferta,medio_presentacion_oferta,valor_oferta,seguimiento,caso_id)
values ('2020-05-08','12:13:12 pm','Secop II','0','No','1');

create table Observacion(

	id_observacion smallint NOT NULL auto_increment,
PRIMARY KEY (id_observacion),
    fecha_observacion date not null,
	hora_observacion varchar(50) not null,
    medio_presentacion_observacion VARCHAR(100) not null,

		caso_id smallint NOT NULL,
		FOREIGN KEY (caso_id)
		REFERENCES Caso (id_caso)
    
);
INSERT INTO Observacion (`fecha_observacion`, `hora_observacion`, `medio_presentacion_observacion`, `caso_id`) VALUES
('2020-05-08', '12:13:12 pm', 'Ninguno', 1);

create table Interes(

	id_interes smallint NOT NULL,
    fecha_hora_manifestacion timestamp,
    medio_manifestacion VARCHAR(100),
	carta_manifestacion varchar (100),

		caso_id smallint NOT NULL,
		FOREIGN KEY (caso_id)
		REFERENCES Casos (id_caso)
    
);

-- Tablas Oportunidad

create table EstadoOPortunidad(

    id_oportunidad TinyInt NOT NULL,
    opcion VARCHAR(100) NOT NULL

);

CREATE TABLE Oportunidad (

    id_Oportunidad smallint NOT NULL,
	PRIMARY KEY (id_Oportunidad),
    
	nomEntidad VARCHAR(250) NOT NULL,
	numContrato VARCHAR(200) NOT NULL,
	Objeto VARCHAR(400) NOT NULL,
	Cuantia int NOT NULL,
	ubicacion Varchar(200) NOT NULL,
	fPublicacion DATETIME NOT NULL,
    fCreacion DATETIME NOT NULL,
    fcierre DATETIME NOT NULL,
	link VARCHAR(200) NOT NULL,
	observacion VARCHAR(200) NOT NULL,
    
	oportunidad_id TINYINT NOT NULL,
	ejecutivo_id TINYINT NOT NULL,
            
	FOREIGN KEY (oportunidad_id)
	REFERENCES EstadoOPortunidad (id_oportunidad),
    
	FOREIGN KEY (ejecutivo_id)
	REFERENCES Ejecutivo (id_ejecutivo)
    
);


-- Histotial Licitaciones
create table HistorialTareasLicitaciones(

	id_historial smallint NOT NULL,
    fecha_hora_cambio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    id_myse INT(11) NOT NULL,
	Tarea char(1) DEFAULT 'R',

    cedula BIGINT NOT NULL,

    FOREIGN KEY (cedula)
        REFERENCES Usuario (cedula_U)

);

create table CampoModifiacion(

	id_campomodifiacion smallint NOT NULL,
	campo varchar(500) NOT NULL,

	historial_id smallint NOT NULL,

	FOREIGN KEY (historial_id)
	REFERENCES HistorialTareasLicitaciones (id_historial)

);
    
    
-- Hola soylicitaciones oficial

-- CRUD LOGIN

DELIMITER  $$
drop procedure if exists Loguear;
create  PROCEDURE Loguear /* nombre */
(/* parametros de Entrada INput */
IN   P_usuario VARCHAR(100),
IN   P_clave VARCHAR(200)
) 
BEGIN /*inicio del la programación*/
		SELECT A.*, U.estado FROM Acceso A inner join Usuario U WHERE A.usuario = P_usuario and A.clave = P_clave and U.estado = 'A' and A.cedula_U = U.cedula_U;
		SELECT A.*, U.estado FROM Acceso A inner join Usuario U WHERE A.usuario = 'nmorenoh' and A.clave = 'OGJtcWNpTDM0bDViRDYybm9ia2RXdz09' and U.estado = 'A' and A.cedula_U = '1001084291';
END; $$
-- CRUD Bitacora

DELIMITER  $$
drop procedure if exists Bitacora;
create  PROCEDURE Bitacora /* nombre */
(/* parametros de Entrada INput */
IN   P_codigo varchar(50),
IN   P_fecha date,
IN   P_hora_inicio varchar(50),
IN   P_hora_fin varchar(50),
IN   P_cedula BIGINT,
IN   opcion CHAR(15)
) 
BEGIN /*inicio del la programación*/
	CASE opcion 
		WHEN  'Guardar' THEN 
		INSERT INTO BitacoraAccesos (codigo,fecha,hora_inicio,cedula) VALUES (P_codigo,P_fecha,P_hora_inicio,P_cedula);
        WHEN  'ActualizarFin' THEN 
		UPDATE bitacoraaccesos SET hora_fin = P_hora_fin WHERE id_bitacoraaccesos = '6' and codigo = 'CB76685406';
	END CASE;
END; $$

DELIMITER  $$
drop procedure if exists Usuario;
create  PROCEDURE Usuario /* nombre */
(/* parametros de Entrada INput */
IN   P_cedula_U BIGINT,
IN   P_nombre VARCHAR(100),
IN   P_apellido VARCHAR(100),
IN   P_correo VARCHAR(100),
IN   P_estado char(1),
IN   opcion CHAR(15)
) 
BEGIN /*inicio del la programación*/
	CASE opcion 
		WHEN  'DatosUsuario' THEN 
		Select * from usuario where cedula_U = P_cedula_U;
		WHEN  'Registrar' THEN 
		INSERT INTO usuario (cedula_U,nombre,apellido,correo) VALUES (P_cedula_U,P_nombre,P_apellido,P_correo);
	END CASE;
END; $$

DELIMITER  $$
drop procedure if exists Acceso;
create  PROCEDURE Acceso /* nombre */
(/* parametros de Entrada INput */
IN   P_cedula_U BIGINT
) 
BEGIN /*inicio del la programación*/
		Select A.id_Acceso, PL.privilegio as 'privilegioL', PC.privilegio as 'privilegioC'from Acceso A 
		inner join priv_licitaciones PL on A.priv_licitaciones_id = PL.id_priv_licitaciones
		inner join priv_certificaciones PC on A.priv_certificaciones_id = PC.id_priv_certificaciones
		where A.cedula_U = P_cedula_U;
END; $$

call Usuario (1001084291,'Nicolas Andres','Moreno Higuavita','nicolas007andres@hotmail.com',null,'Registrar');
-- call Bitacora ('A1515151P','1001-01-01','3:27',null,'1001084291','Guardar');
CALL Usuario(1001084291,null,null,null,null,'DatosUsuario');

UPDATE bitacoraaccesos SET hora_fin='11:00:26 am' WHERE id_bitacora='CB730246111'

SELECT At.tipo_acceso_id NA.Acceso FROM Acceso_TipoAcceso At 
                INNER JOIN TipoAcceso NA ON AT.tipo_acceso_id = NA.id_tipo_acceso 
                WHERE At.Acceso_id ='3';
