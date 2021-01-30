	drop database if exists Acme;
	create DATABASE Acme;
	USE Acme;
    
    CREATE TABLE Usuario (

    cedula_U BIGINT NOT NULL unique,
	PRIMARY KEY (cedula_U),
       
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    telefono VARCHAR(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    estado CHAR(1) DEFAULT 'A'
);INSERT INTO `acme`.`usuario`
(`cedula_U`,
`nombre`,
`apellido`,
`direccion`,
`telefono`,
`ciudad`)
VALUES
(1001084291,'Nicolas','Moreno','Cra 145 # 145 a 66','3172792776','Bogota D.C');

drop table if exists Privilegio;
CREATE TABLE Privilegio (

    id_privilegio TinyInt NOT NULL auto_increment,
    PRIMARY KEY (id_privilegio),
    
    privilegio VARCHAR(30) NOT NULL
    
);
INSERT INTO `acme`.`privilegio`
(`privilegio`)
VALUES
('Admin'),
('Conductor'),
('Propietario');


drop table if exists Acceso;
CREATE TABLE Acceso (

    id_Acceso SMALLINT AUTO_INCREMENT,
	PRIMARY KEY (id_Acceso),
    usuario VARCHAR(100) not null,
    clave VARCHAR(200) NOT NULL,
    
	cedula_U BIGINT NOT NULL,
	privilegio_id tinyint NOT NULL,

    FOREIGN KEY (cedula_U)
	REFERENCES Usuario (cedula_U),
    
	FOREIGN KEY (privilegio_id)
	REFERENCES privilegio (id_privilegio)
        
);
INSERT INTO `acme`.`acceso`
(`usuario`,
`clave`,
`cedula_U`,
`privilegio_id`)
VALUES
('nmorenoh', 'aGhMWGVhWGpEc2VCakxMc3pOSTJ3UT09', '1001084291', 3);

SELECT * from Usuario;

CREATE TABLE Vehiculo (
Placa VARCHAR(100) NOT NULL,
Color VARCHAR(100) NOT NULL,
Marca VARCHAR(100) NOT NULL,
Tipo VARCHAR(100) NOT NULL,

propietario_id BIGINT NOT NULL,
conductor_id BIGINT Null,

    FOREIGN KEY (propietario_id)
	REFERENCES Usuario (cedula_U),
	FOREIGN KEY (conductor_id)
	REFERENCES Usuario (cedula_U)
);
INSERT INTO `acme`.`vehiculo`
(`Placa`,
`Color`,
`Marca`,
`Tipo`,
`propietario_id`)
VALUES
('AAA-123',
'Rojo',
'Publico',
'1001084291');


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

DELIMITER  $$
drop procedure if exists Usuario;
create  PROCEDURE Usuario /* nombre */
(/* parametros de Entrada INput */
IN   P_cedula_U BIGINT,
IN   opcion CHAR(15)
) 
BEGIN /*inicio del la programación*/
	CASE opcion 
		WHEN  'DatosUsuario' THEN 
		Select * from usuario where cedula_U = P_cedula_U;
	END CASE;
END; $$

DELIMITER  $$
drop procedure if exists Acceso;
create  PROCEDURE Acceso /* nombre */
(/* parametros de Entrada INput */
IN   P_cedula_U BIGINT
) 
BEGIN /*inicio del la programación*/
		Select A.id_Acceso from Acceso A 
		inner join priv_licitaciones PL on A.priv_licitaciones_id = PL.id_priv_licitaciones
		inner join priv_certificaciones PC on A.priv_certificaciones_id = PC.id_priv_certificaciones
		where A.cedula_U = P_cedula_U;
END; $$
