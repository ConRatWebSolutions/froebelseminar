#
# Table structure for table 'tx_crkalender_domain_model_eintrag'
#
CREATE TABLE tx_crkalender_domain_model_eintrag (

	titel varchar(255) DEFAULT '' NOT NULL,
	datum int(11) DEFAULT '0' NOT NULL,
	zeit int(11) DEFAULT '0' NOT NULL,
	bis datetime DEFAULT NULL,
	bzeit int(11) DEFAULT '0' NOT NULL,
	kurzbeschreibung text,
	beschreibung text,
	ort varchar(255) DEFAULT '' NOT NULL,
	erstellt varchar(255) DEFAULT '' NOT NULL,
	link varchar(255) DEFAULT '' NOT NULL,
	bemerkung text,
	bemerkung1 text,
	kosten text,
	anmledung text,
	referent text,
	google_id varchar(255) DEFAULT '' NOT NULL,
	bilder int(11) unsigned NOT NULL default '0',
	kategorie int(11) unsigned DEFAULT '0' NOT NULL,
	filter int(11) unsigned DEFAULT '0' NOT NULL

);

#
# Table structure for table 'tx_crkalender_domain_model_kategorie'
#
CREATE TABLE tx_crkalender_domain_model_kategorie (

	kategorie varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_crkalender_domain_model_filter'
#
CREATE TABLE tx_crkalender_domain_model_filter (

	titel varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_crkalender_eintrag_kategorie_mm'
#
CREATE TABLE tx_crkalender_eintrag_kategorie_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_crkalender_eintrag_filter_mm'
#
CREATE TABLE tx_crkalender_eintrag_filter_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
