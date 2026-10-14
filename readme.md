# Fröbelseminar / Familienzentrum

Doku und Zugänge: obsidian://open?vault=Froebelseminar

TYPO3 13.4.18 (Composer, PHP 8.3), eine Instanz für zwei Websites:

| Site (config/sites) | Live | Lokal | Wurzelseite |
|---|---|---|---|
| `froebel` | https://www.froebelseminar.de | https://froebelseminar.ddev.site | 1 |
| `familienzentrum` | https://familienzentrum.froebelseminar.de | https://familienzentrum.froebelseminar.ddev.site | 83 |

Eigene Extensions in `packages/`:

- `c4theme` – Theme (Templates, TypoScript, CSS/JS)
- `conratpresse` – Presse
- `crbuchkatalog` – Buchkatalog (Medien in fileadmin/user_upload/Buchkatalog, ca. 4,6 GB)
- `crfaq` – FAQ
- `crkalender` – Kalender
- `crlogbook` – Logbuch (Login über Microsoft-SSO)
- `crtraegertreffen` – Trägertreffen inkl. PDF (Login über Microsoft-SSO)

Dazu: b13/container, georgringer/news, in2code/powermail.

Zusätzlich liegen in `public/` eigene Skripte außerhalb von TYPO3:

- `sso/` und `oauth.php` – Microsoft-Login (Azure-App), wird von crlogbook/crtraegertreffen eingebunden.
  `sso/inc/config.inc.php` enthält DB-Zugang und OAuth-Secret und ist **nicht im Repo**.
- `newsletterAPI.php` – Newsletter-Anmeldung, enthält fest eingetragene DB-Zugangsdaten und ist **nicht im Repo**.
- `eye-able-translate.js`

## Live

- SSH: `ssh froebel` (Alias in `~/.ssh/config`, Key-Login), Instanz `~/typo3_2025`
- CLI: `/usr/bin/php83 vendor/bin/typo3 …` (Standard-`php` ist veraltet)
- DB-Zugang steht nur auf dem Server in `~/typo3_2025/.env.live` (`.env` ist ein Symlink darauf),
  `config/system/additional.php` liest die Werte aus der Umgebung
- `config/system/settings.php` (encryptionKey, Install-Tool-Hash) ist nicht im Repo –
  die Live-Datei ist maßgeblich, lokal liegt eine Kopie mit eigenem encryptionKey
- Weitere Ordner auf dem Server (nicht anfassen ohne Rücksprache): `typo3_11`, `typo3_2025_backup_20250916_204205`,
  `olddata`, `bdb` (Laravel-App)

## Lokal (DDEV)

```bash
DDEV_NONINTERACTIVE=true ddev start
ddev composer install
ddev dump-db-fast        # Live-DB holen und einspielen (liest Zugangsdaten auf dem Server)
ddev dump-files          # fileadmin vom Server holen – ACHTUNG: ca. 16 GB
```

Falls `*.ddev.site` lokal nicht aufgelöst wird, einmalig die Hosts-Einträge setzen:

```bash
sudo /opt/homebrew/bin/ddev-hostname froebelseminar.ddev.site 127.0.0.1
sudo /opt/homebrew/bin/ddev-hostname familienzentrum.froebelseminar.ddev.site 127.0.0.1
```

Nach einem frischen Clone fehlt `config/system/settings.php` – die Live-Datei holen und den
`encryptionKey` durch einen eigenen ersetzen (DB-Werte `db`/`db`/`db` passen für DDEV).

## Deploy

```bash
ddev check               # Probelauf, zeigt Unterschiede, ändert nichts
ddev deploy live         # Backup auf dem Server, dann config, packages, vendor, _assets, var/labels
```

fileadmin, var/ (außer labels), alles Übrige in `public/` (`.htaccess`, `sso/`, `oauth.php`, `newsletterAPI.php`),
`.env.live` sowie `config/system/settings.php` und `additional.php` werden nicht deployt.

## Abweichung von Live

- In `crlogbook/Classes/Controller/LogbookController.php` und `crtraegertreffen/Classes/Controller/PDFController.php`
  stand ein Microsoft-Client-Secret im Code (`$secret`, wird nicht verwendet). Im Repo ist es geleert.
