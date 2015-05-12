--REPORTES DEL SUPER USUARIO

--REPORTE POR RECURSO 
DELIMITER //
 CREATE PROCEDURE ResourceTotal_super()
   BEGIN
   DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select resources.name,count(resources.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id 
	AND MONTH(bookings.start_date) = curMonth
	AND YEAR(bookings.start_date) = curYear
	group by resources.name;
   END //
 DELIMITER ;

 --REPORTE POR CATEGORIA 
 DELIMITER //
 CREATE PROCEDURE CategoryTotal_super()
   BEGIN
   DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select categories.name,count(resources.id) as total 
	from resources,bookings, categories
	where bookings.resource_id = resources.id 
	AND resources.category_id = categories.id 
	AND MONTH(bookings.start_date) = curMonth
	AND YEAR(bookings.start_date) = curYear
	group by categories.name;
   END //
 DELIMITER ;

 --REPORTE POR USUARIO
 DELIMITER //
 CREATE PROCEDURE UserTotal_super()
   BEGIN
   DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select users.school_id, count(users.id) as total 
	from bookings, users
	where bookings.user_id = users.school_id 
	AND MONTH(bookings.start_date) = curMonth
	AND YEAR(bookings.start_date) = curYear
	group by users.school_id;
   END //
 DELIMITER ;


-- Mes
DELIMITER //
 CREATE PROCEDURE monthTotal_super()
   BEGIN
   	DECLARE curYear INT;
   	SET curYear = (select YEAR(NOW()));
	select MONTH(bookings.start_date) as month ,count(bookings.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id 
	AND YEAR(bookings.start_date) = curYear
	group by MONTH(bookings.start_date);
	
   END //
 DELIMITER ;

-- Dia
 DELIMITER //
 CREATE PROCEDURE DayTotal_super()
   BEGIN
   	DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select DAYOFWEEK(bookings.start_date) as day ,count(bookings.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id
    AND MONTH(bookings.start_date) = curMonth
    AND YEAR(bookings.start_date) = curYear
	group by DAYOFWEEK(bookings.start_date);
	
   END //
 DELIMITER ;
