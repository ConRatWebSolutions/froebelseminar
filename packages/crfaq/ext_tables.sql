#
# Table structure for table 'tx_crfaq_domain_model_eintrag'
#
CREATE TABLE tx_crfaq_domain_model_eintrag (

	frage varchar(255) DEFAULT '' NOT NULL,
	antwort text,
	bilder int(11) unsigned NOT NULL default '0',
	blog1 text,
	blog1bilder int(11) unsigned NOT NULL default '0',
	blog2 text,
	blog2bilder int(11) unsigned NOT NULL default '0',
	downloads int(11) unsigned NOT NULL default '0',
	sortings int(11) DEFAULT '0' NOT NULL,
	kategorie int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_crfaq_domain_model_kategorie'
#
CREATE TABLE tx_crfaq_domain_model_kategorie (

	titel varchar(255) DEFAULT '' NOT NULL,
	beschreibung text,
	subvon varchar(255) DEFAULT '' NOT NULL,
	sortings int(11) DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_crfaq_eintrag_kategorie_mm'
#
CREATE TABLE tx_crfaq_eintrag_kategorie_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);
