DROP EVENT IF EXISTS update_late_status;
CREATE EVENT update_late_status
	ON SCHEDULE EVERY 24 HOUR 
	DO UPDATE 
		rental SET late_status = 'LATE'
	WHERE 
		(TIMESTAMPDIFF(DAY, CURDATE(), date_due) < 0) AND date_checked_in IS NULL;