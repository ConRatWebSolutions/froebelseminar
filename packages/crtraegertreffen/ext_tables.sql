#
# Table structure for table 'tx_crtraegertreffen_domain_model_kategorie'
#
CREATE TABLE tx_crtraegertreffen_domain_model_kategorie (

	kategorie varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_crtraegertreffen_domain_model_pdf'
#
CREATE TABLE tx_crtraegertreffen_domain_model_pdf (

	titel varchar(255) DEFAULT '' NOT NULL,
	pdf int(11) unsigned NOT NULL default '0',
	youtube varchar(255) DEFAULT '' NOT NULL,
	webseite varchar(255) DEFAULT '' NOT NULL,
	facebook varchar(255) DEFAULT '' NOT NULL,
	instagram varchar(255) DEFAULT '' NOT NULL,
	kategorie int(11) unsigned DEFAULT '0'

);

#
# Table structure for table 'tx_crtraegertreffen_domain_model_eintrag'
#
CREATE TABLE tx_crtraegertreffen_domain_model_eintrag (

	name varchar(255) DEFAULT '' NOT NULL,
	anschrift varchar(255) DEFAULT '' NOT NULL,
	telefon varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	web varchar(255) DEFAULT '' NOT NULL,
	zielgruppe text,
	angebotsformen text,
	schwerpunkte text,
	ansprechpartner varchar(255) DEFAULT '' NOT NULL,
	sonstiges text,
	aptelefon varchar(255) DEFAULT '' NOT NULL,
	apemail varchar(255) DEFAULT '' NOT NULL,
	apkontankt varchar(255) DEFAULT '' NOT NULL,
	praktikum varchar(255) DEFAULT '' NOT NULL,
	facebook varchar(255) DEFAULT '' NOT NULL,
	logo int(11) unsigned NOT NULL default '0',
	logourl varchar(255) DEFAULT '' NOT NULL,
	instagram varchar(255) DEFAULT '' NOT NULL,
	youtube varchar(255) DEFAULT '' NOT NULL,
	kategorie int(11) unsigned DEFAULT '0' NOT NULL,
	standort int(11) unsigned DEFAULT '0' NOT NULL

);

#
# Table structure for table 'tx_crtraegertreffen_domain_model_standort'
#
CREATE TABLE tx_crtraegertreffen_domain_model_standort (

	titel varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_crtraegertreffen_eintrag_kategorie_mm'
#
CREATE TABLE tx_crtraegertreffen_eintrag_kategorie_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_crtraegertreffen_eintrag_standort_mm'
#
CREATE TABLE tx_crtraegertreffen_eintrag_standort_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
