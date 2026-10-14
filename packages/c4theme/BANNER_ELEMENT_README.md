# Banner Inhaltselement für c4theme

## Übersicht
Das Banner Inhaltselement ist ein einfaches TYPO3 Inhaltselement, das unter dem Menüpunkt "Media" verfügbar ist. Es ermöglicht die Auswahl eines Bildes und optional die Eingabe von Textinhalten.

## Funktionen
- **Bildauswahl**: Ein Bild über den TYPO3 Dateimanager auswählen
- **Textinhalte**: Optional Titel, Untertitel und Beschreibungstext
- **Responsive Design**: Automatische Anpassung an verschiedene Bildschirmgrößen
- **Bildbearbeitung**: Verschiedene Seitenverhältnisse (16:9, 4:3, 1:1, 3:2, 2:1)

## Verwendung

### 1. Inhaltselement erstellen
1. Im TYPO3 Backend eine neue Seite oder Inhaltselement erstellen
2. Unter "Media" das "Banner" Element auswählen
3. Ein Bild über den Dateimanager auswählen
4. Optional: Titel, Untertitel und Beschreibungstext eingeben

### 2. Bildbearbeitung
- Das ausgewählte Bild kann mit verschiedenen Seitenverhältnissen zugeschnitten werden
- Verfügbare Seitenverhältnisse: 16:9, 4:3, 1:1, 3:2, 2:1

### 3. Styling
Das Banner-Element verwendet die CSS-Klasse `.banner-element` und kann über die Datei `Resources/Public/Css/banner.css` angepasst werden.

## Technische Details

### Dateien
- **TCA-Konfiguration**: `Configuration/TCA/Overrides/tt_content_banner.php`
- **PageTSConfig**: `Configuration/TsConfig/Page/ContentElement/Element/Banner.tsconfig`
- **TypoScript**: `Configuration/TypoScript/setup.typoscript`
- **Template**: `Resources/Private/Templates/ContentElements/Banner.html`
- **Layout**: `Resources/Private/Layouts/ContentElements/Default.html`
- **CSS**: `Resources/Public/Css/banner.css`
- **Sprachdatei**: `Resources/Private/Language/locallang_db.xlf`

### CType
Das Banner-Element verwendet den CType `c4theme_banner`.

### Abhängigkeiten
- Bootstrap Package (für Basis-Funktionalität)
- TYPO3 Core (für Standard-Felder)

## Anpassungen

### CSS anpassen
Die Styling-Datei befindet sich unter `Resources/Public/Css/banner.css` und kann nach Bedarf angepasst werden.

### Template anpassen
Das Fluid-Template kann unter `Resources/Private/Templates/ContentElements/Banner.html` angepasst werden.

### Felder hinzufügen
Zusätzliche Felder können über die TCA-Konfiguration in `Configuration/TCA/Overrides/tt_content_banner.php` hinzugefügt werden.

## Installation
Das Banner-Element wird automatisch aktiviert, wenn das c4theme-Paket installiert ist. Nach der Installation sollte es im Backend unter "Media" verfügbar sein.
