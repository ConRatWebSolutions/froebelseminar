#
# Table structure for table 'tx_conratpresse_domain_model_presseartikel'
#
CREATE TABLE tx_conratpresse_domain_model_presseartikel (

	titel varchar(255) DEFAULT '' NOT NULL,
	uberschrift varchar(255) DEFAULT '' NOT NULL,
	datum int(11) DEFAULT '0' NOT NULL,
	anleser text,
	pdf int(11) unsigned NOT NULL default '0',
	bild int(11) unsigned NOT NULL default '0',
	externerlink varchar(255) DEFAULT '' NOT NULL,
	kategorie int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_conratpresse_domain_model_kategorie'
#
CREATE TABLE tx_conratpresse_domain_model_kategorie (

	kategorie varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'tx_conratpresse_presseartikel_kategorie_mm'
#
CREATE TABLE tx_conratpresse_presseartikel_kategorie_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
