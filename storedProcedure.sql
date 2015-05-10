DELIMITER //
 CREATE PROCEDURE GetAllProducts()
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