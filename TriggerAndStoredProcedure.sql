------ Trigger ------

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

--------- Procedure ----------

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


