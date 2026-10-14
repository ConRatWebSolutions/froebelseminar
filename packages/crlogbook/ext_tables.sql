#
# Table structure for table 'tx_crlogbook_domain_model_logbook'
#
CREATE TABLE tx_crlogbook_domain_model_logbook (

	datum int(11) DEFAULT '0' NOT NULL,
	start varchar(255) DEFAULT '' NOT NULL,
	ende varchar(255) DEFAULT '' NOT NULL,
	fahrstrecke int(11) DEFAULT '0' NOT NULL,
	von varchar(255) DEFAULT '' NOT NULL,
	bis varchar(255) DEFAULT '' NOT NULL,
	bemerkung text,
	grund text,
	user varchar(255) DEFAULT '' NOT NULL,

);
