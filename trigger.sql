DROP TRIGGER IF EXISTS `doctors_count_add`

delimiter $$
create trigger doctors_count_add
after insert on visits
for each row
begin
	update hospital
    set total_doctors=total_doctors+1
    -- set total_doctors=doctorCount(total_doctors) 
    where hosp_id=new.hosp_id;
end$$
delimiter ;

DROP TRIGGER IF EXISTS `doctors_count_sub`

delimiter $$
create trigger doctors_count_sub
after delete on visits
for each row
begin
	update hospital
    set total_doctors=total_doctors-1
    -- set total_doctors=doctorCount(total_doctors) 
    where hosp_id=old.hosp_id;
end$$
delimiter ;


DROP PROCEDURE IF EXISTS `doctorCount`

delimiter $$
create procedure(IN total_doctors int, OUT count int)
begin
	set count=total_doctors+1;
end$$
delimiter ;

DROP PROCEDURE IF EXISTS `experienceYear`
DELIMITER $$
CREATE PROCEDURE experienceYear(IN exp_start_date DATE)
BEGIN
    SELECT FLOOR(DATEDIFF(NOW(), DATE(exp_start_date))/365) as exp_year;
END $$
DELIMITER ;

SET @p0=TIMESTAMP('2000-01-01'); 
CALL `experienceYear`(@p0);


DROP PROCEDURE IF EXISTS `experienceYear`
delimiter$$
create procedure experienceYear (IN exp_start_date date)
begin
	select TIMESTAMPDIFF(YEAR,exp_start_date,CURDATE()) as exp_year;
end$$
delimiter ;


DROP PROCEDURE IF EXISTS `searchDoctor`
delimiter $$
create procedure searchDoctor(IN doc_name varchar(20)) 
begin 
	SELECT * FROM doctor d, location l 
	WHERE d.loc_id = l.loc_id 
	AND d.first_name = doc_name ; 
end$$
delimiter ;


