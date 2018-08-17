<?php 
/*
select * from actividad
select * from reserva

--crear funcion que retorne trigger
CREATE OR REPLACE FUNCTION actividad_trigger() RETURNS TRIGGER AS $actividad$
DECLARE BEGIN
	INSERT INTO reserva VALUES('jg123@gmail.com','se ha reservado una actividad','2018-08-15','18:08:00');
	RETURN NULL;
END;
$actividad$ LANGUAGE plPgsql;	

 */