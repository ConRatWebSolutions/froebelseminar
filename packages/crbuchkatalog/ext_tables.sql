#
# Table structure for table 'tx_crbuchkatalog_domain_model_eintrag'
#
CREATE TABLE tx_crbuchkatalog_domain_model_eintrag (

	titel varchar(255) DEFAULT '' NOT NULL,
	autor varchar(255) DEFAULT '' NOT NULL,
	veroeffentlichungsjahr varchar(255) DEFAULT '' NOT NULL,
	kurzbeschreibung text,
	pdf int(11) unsigned NOT NULL default '0',
	schlagworte text,

);
