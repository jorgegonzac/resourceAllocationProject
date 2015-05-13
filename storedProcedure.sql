-- by RESOURCE
DELIMITER //
 CREATE PROCEDURE ResourceTotal(IN lab_id INT(10))
   BEGIN
   DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select resources.name,count(resources.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id 
	AND resources.laboratory_id = lab_id
	AND MONTH(bookings.start_date) = curMonth
	AND YEAR(bookings.start_date) = curYear
	group by resources.name;
   END //
 DELIMITER ;

-- by USER

 DELIMITER //
 CREATE PROCEDURE UserTotal(IN lab_id INT(10))
   BEGIN
   DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select bookings.user_id,count(resources.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id 
	AND resources.laboratory_id = lab_id
	AND MONTH(bookings.start_date) = curMonth
	AND YEAR(bookings.start_date) = curYear
	group by bookings.user_id;
	
   END //
 DELIMITER ;

-- by MONTH
DELIMITER //
 CREATE PROCEDURE MonthTotal(IN lab_id INT(10))
   BEGIN
   	DECLARE curYear INT;
   	SET curYear = (select YEAR(NOW()));
	select MONTH(bookings.start_date) as month ,count(bookings.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id 
	AND resources.laboratory_id = lab_id
	AND YEAR(bookings.start_date) = curYear
	group by MONTH(bookings.start_date);
	
   END //
 DELIMITER ;

-- by WEEK
 DELIMITER //
 CREATE PROCEDURE WeekTotal(IN lab_id INT(10))
   BEGIN
   	DECLARE curMonth INT;
	DECLARE curYear INT;
	SET curMonth = (select MONTH(NOW()));
	SET curYear = (select YEAR(NOW()));
	select DAYOFWEEK(bookings.start_date) as day ,count(bookings.id) as total 
	from resources,bookings
	where bookings.resource_id = resources.id
    AND resources.laboratory_id = lab_id
    AND MONTH(bookings.start_date) = curMonth
    AND YEAR(bookings.start_date) = curYear
	group by DAYOFWEEK(bookings.start_date);
	
   END //
 DELIMITER ;


















