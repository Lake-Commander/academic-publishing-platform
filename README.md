Table publications

	#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	id Primary	int(11)			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
	2	pub_name Index	varchar(500)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	3	pub_issue	varchar(10)	latin1_swedish_ci		No	CURRENT			Change Change	Drop Drop	
	4	pub_volume	varchar(20)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	5	pub_author Index	varchar(500)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	6	pub_journal	varchar(300)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	7	date_added	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()	Change Change	Drop Drop	
	8	path	varchar(250)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	9	pub_abstract	varchar(2000)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	10	doi	varchar(100)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	11	keyword	varchar(200)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	12	reference	varchar(8000)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	13	status	varchar(200)	latin1_swedish_ci		No	published			Change Change	Drop Drop	


Table editorials
	#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	ID Primary	int(11)			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
	2	name	varchar(500)	utf8mb3_general_ci		No	None			Change Change	Drop Drop	
	3	univ	varchar(500)	utf8mb3_general_ci		No	None			Change Change	Drop Drop	
	4	dept	varchar(500)	utf8mb3_general_ci		No	None			Change Change	Drop Drop	
	5	address	varchar(500)	utf8mb3_general_ci		No	None			Change Change	Drop Drop	
	6	journal Index	varchar(50)	utf8mb3_general_ci		No	None			Change Change	Drop Drop	
	7	path	varchar(150)	utf8mb3_general_ci		No	None			Change Change	Drop Drop	

Table journals

#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	id Primary	int(11)			No	None		AUTO_INCREMENT	Change Change	Drop Drop	
	2	journal_name Index	varchar(11)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	3	journal_name_full	varchar(150)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	4	journal_category	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	5	journal_description	varchar(6500)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	6	journal_description_list	varchar(6200)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	7	path	varchar(30)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	8	journal	varchar(3)	latin1_swedish_ci		No	OLD			Change Change	Drop Drop	
	9	ISSN	varchar(50)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
	10	doij	varchar(200)	latin1_swedish_ci		No	None			Change Change	Drop Drop	
