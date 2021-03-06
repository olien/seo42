SEO42 - Changelog
=================

### Version 4.4.2 DEV

* Fixed #211: Fatal error: Class 'sql' not found" auf der Page "Redirects", thx@mizmiz
* Fixed #202: `@import` in der SCSS-Datei funktionierte nicht, thx@bega011, thx@RNGesus
* Fixed #207: Auf der Redirects Seite ging der Abbrechen Button nicht, thx@DanielWeitenauer
* Neu: Less.php als Standard LESS Parser hinzugefügt, Lessp.php SEO42 Plugin wird damit nicht mehr benötigt, thx@DanielWeitenauer
* Neu: Less und Scss Compiler Versionsinfo zur Debugseite hinzugefügt

### Version 4.4.1 - 22. November 2015

* Fixed #201: Kompatibilität zum min42 Plugin wiederhergestellt

### Version 4.4.0 - 18. November 2015

* Update: Achtung! Die Klasse `nav42` wird in der nächsten SEO42 Version (4.5.0) komplett entfernt werden. Bitte die Zeit nutzen und auf das Navigation Factory Addon umsteigen. Bitte im Navigation Factory Addon die Changelog studieren für API Änderungen.
* Verbessert: Offline 404 Modus zeigt jetzt im Frontend einen Hinweis an: "REDAXO Offline Artikel (nur für eingeloggte Benutzer sichtbar)"
* Verbessert: Data Addon Dir wird bei Deinstallation des Addons automatisch gelöscht
* Geändert: Einstellungen > User Interface > Alle URL Typen standardmäßig deaktiviert
* Geändert: Klasse `res42` umbenannt in `rex_resource_includer`. Die Wrapper-Methoden der Klasse `seo42` bleiben unverändert erhalten, d.h. es sind keine Code-Anpassungen nötig
* Geändert: `seo42::getIconFile()` in `seo42::getFavIconFile()` umbenannt. Der Standard Favicon Ordner ist jetzt `/resources/favicons/`
* Deprecated (veraltet): Klasse `nav42` wurde in das neue Navigation Factory Addon überführt. In der nächsten SEO42 Version wird die Klasse komplett entfernt werden
* Deprecated (veraltet): `seo42::getIconFile()`. In der nächsten SEO42 Version wird die Methode entfernt werden

### Version 4.3.0 - 27. Oktober 2015

* Update: Bitte die Hinweise in der `UPDATE.md` beachten!
* Fixed #184: Cached Redirects werden nun nach Import aktualisiert
* Fixed #177: Interne Ersetzung funktioniert nicht bei Ziel-URLs mit entfernter Root-Kategorie, thx@bega011
* Neu: Offline 404 Modus (unter Einstellungen > URLs): Ist der Modus aktiviert wird ein Artikel der offline ist im Frontend nicht mehr angezeigt. Es kommt der Fehlerartikel mit einem 404 Header. Aus dem Backend heraus über den Link "Webansicht" kann man den Artikel jedoch noch aufrufen. Link ist dann nur gültig für den im Backend eingeloggten Benutzer. Ausserdem wird dann ein 404 Header + X-Robots noindex Header zusätzlich gesendet.
* Neu: `setLiIdFromCategoryId()` und `setLiClassFromCategoryId()` zur `nav42` hinzugefügt. Damit kann man den Menüpunkten CSS IDs und Klassen zuweisen anhand der Kategorie ID. Siehe Codebeispiele in der Hilfe.
* Neu: `seo42::getUrlEnding()` hinzugefügt
* Neu: Plugin zur Readme hinzugefügt: `url_control` Fork - Inofizieller Fork des url_controls Plugin mit Unterstützung für SEO42 4.0+
* Neu: Hinweis aufgenommen: Der X-UA-Compatible Meta Tag kann im Template weggelassen werden, da SEO42 diesen automatisch als HTTP Header sendet.
* Neu: Sprachfeld `region_code` inkl. Methode `seo42::getLangRegionCode()` hinzugefügt. Beispielwert: de-AT (Sprache-REGION), thx@chrfickinger
* Neu: Sprachfeld `url_slug` inkl. Methode `seo42::getLangUrlSlug()` hinzugefügt. Beispielwert: de, thx@chrfickinger
* Neu: Sprachfeld `hreflang` inkl. Methode `seo42::getHreflang()` hinzugefügt. Beispielwert: de (de-AT nun auch möglich damit), thx@chrfickinger
* Neu: Sprachfeld `dir` inkl. Methode `seo42::getLangDir()` hinzugefügt. Beispielwert: ltr, thx@DanielWeitenauer 
* Neu: Methoden `seo42::getRegionCode()`, `seo42::getLangLocale()` und `seo42::setLocale()` als Wrapper für `setlocale()` von PHP hinzugefügt, thx@alexwenz
* Verbessert: Methode `seo42::getLangSlug()` umbenannt in `seo42::getLangUrlSlug()`
* Verbessert: AddTypes in `.htaccess` vereinheitlicht, thx@olien
* Verbessert: SCSS Compiler auf Version 0.3.3 aktualisiert, thx@olien
* Verbessert: File Combiner gibt "file not found" Meldung aus wenn Datei nicht vorhanden, thx@denisdanielyan
* Deprecated: `seo42::getLangSlug()` (`seo42::getLangUrlSlug()` benutzen!)

### Version 4.2.1 - 10. August 2015

* Neuer Hinweis: Der One Domain Only Redirect leitet automatisch auf die WWW bzw. die Nicht-WWW Version um, je nachdem wie man die "URL der Website" im Setup angegeben hat.
* Verbessert: Beim DB Import wird nun auch auf die neuen Redirects Felder geprüft
* Debug-Seite zeigt nun geänderte Settings an

### Version 4.2.0 - 31. Juli 2015

* Update: Bitte die Hinweise in der `UPDATE.md` beachten!
* Fixed #175: Bei mehrsprachigen Websites wurde der 404 Artikel nicht angezeigt wenn die `clang` IDs nicht durchgehend nummeriert waren, thx@GeForce92
* Fixed #174: nav42: Breadcrumb Navigation zeigt jetzt keine offline Artikel mehr an
* Fixed: Die Seite eines Plugins wurden nicht automatisch angezeigt im Menü
* Fixed: Offline Startartikel einer anderen Sprache wie der Default Sprache werden nun nicht mehr angezeigt in der `sitemap.xml`
* Neu: Sync Redirects: Es wird automatisch ein Redirect angelegt wenn sich eine Url geändert hat
* Neu: Redirects können nun automatisch ablaufen wenn man eine Ablaufzeit in Tagen in den Einstellungen angibt
* Neu: Kompakte Ansicht für die Redirects Seite über Einstellungen > User Interface einstellbar. Nützlich bei sehr langen Urls.
* Neu: EP's `SEO42_URL_UPDATE` und `SEO42_URL_UPDATED` hinzugefügt. Wird getriggert wenn die URL über die URL-Seite in der Artikelansicht geändert wurde
* Neu: FAQ Eintrag (+ Startguide und Readme) hinzugefügt: "Auf meinem 1und1 Server werden die Image Manager Bilder nicht gecachet sonder jedesmal neu heruntergeladen?!" 
* Neu: RegEx Redirect Beispiel in die Readme aufgenommen
* Neu: Erklärung zu allen Redirects Varianten in die Readme aufgenommen
* Verbessert: Bei den One Domain Only Redirects wurde der Hinweis mit aufgenommen dass WWW/Nicht-WWW Weiterleitungen hier automatisch mit inkludiert sind ;)
* Verbessert: Setup Schritt 4 hinzugefügt mit Links zum Hilfe-Bereich

### Version 4.1.2 - 04. Mai 2015

* Fixed #144: Bei URL Endung "ohne" funktionieren die automatischen Sprach Redirects nicht, thx@TobiasKrais
* Fixed #171: Es gab einen 404 Fehler wenn eine interne Url gleich war die automatisch generierte Url
* Fixed #170: `nav42::addCallback()` public gemacht, thx@dtpop
* Fixed #168: Smart Redirect ging bei Url Endung "/" nicht, thx@JeGr
* Fixed #165: RegEx Redirect bei Subdir Installs, thx@NGWNGW
* Verbessert: Startartikel der Website wird jetzt immer, auch wenn offline, in die sitemap.xml aufgenommen
* Verbessert: Wird der Rewriter ausgeschaltet werden auch die CSS/JS Dateien nicht mehr mit einem Versionsstring bestückt

### Version 4.1.1 - 04. Februar 2015

* Fixed: Auto Redirects für alte url_rewrite Urls, thx@TobiasKrais
* Fixed: http/https Weiterleitung, thx@Christian
* Verbessert: Die URL der Startseite kann jetzt nicht mehr verändert werden, thx@execrable
* Verbessert: Startguide ergänzt um verschiedene Hinweise zum SEO42 Boilerplate
* Verbessert: Startguide ergänzt um Tips zur Resourcen-Einbindung
* Verbessert: Externe Links korrigiert (SEO42 Einführung + Seobility)

### Version 4.1.0 - 03. Dezember 2014

* Update: Bitte die Hinweise in der `UPDATE.md` beachten!
* Fixed #155: Kombination One Page Mode + Mehrsprachigkeit führte in der Sitemap.xml zu einem fehlerhaften Eintrag, thx@TobiasKrais
* Fixed #156: Bei Benutzung von `rex_redirect()` gab es Probleme mit den Query Parametern, thx@Sysix
* Fixed #158: Mime Types für Fonts verbessert, Chrome meldete sonst "Resource interpreted as font but transferred with MIME type x-font/woff", thx@TobiasKrais
* Neu: Ausgabe einer Breadcrumb Navigation möglich, siehe Codebeispiele, thx@webghostx
* Neu: Google Site Verification Unterstützung: über die Webmaster Tools den Namen der Html-Datei (google*.html) kopieren und bei den Einstellungen eintragen. Upload der Datei nicht nötig!
* Neu: `nav42::setLiClass()` hinzugefügt, thx@polarpixel
* Neu: `min42` Plugin zur Readme hinzugefügt, thx@webghostx
* Neu: FAQ Eintrag: "Gibt es ein Tutorial zu SEO42 und/oder weitere Informationen zu den Features des Addons?"
* Verbessert: SCSS Compiler auf Version 0.0.15 aktualisiert
* Verbessert: LESS Compiler auf Version 0.5.0 aktualisiert
* Verbessert: Existiert bereits eine `robots.txt`, `sitemap.xml` oder `google*.html` Datei so wird diese zuerst ausgeliefert bevor das automatische Handling von SEO42 greift
* Verbessert: Cached Redirects wurden in eine eigene Datei ausgelagert
* Verbessert: Website Manager 3.0 Kompatibilität
* Finetuning

### Version 4.0.2 - 28. Oktober 2014

* Neu: Lang-Presets hinzugefügt: ungarisch, schwedisch und norwegisch, thx@polarpixel
* Neu: www.seobility.net zu den Tools hinzugefügt
* Neu: `seo42::getAbsoluteImageFile()` hinzugefügt
* Neu: FAQ Eintrag: "Warum wird meine Website umgeleitet auf eine andere URL?"
* Neu: FAQ Eintrag: "Das umschalten von $REX['MOD_REWRITE'] hat keine Wirkung?!"
* Neu: FAQ Eintrag: "Wie werden die Standardeinstellungen von SEO42 wiederhergestellt?"
* Verbessert: No Double Content Redirect: One Domain Only wieder standardmäßig aktiviert und Option hinzugefügt damit dieser Redirect nur noch fürs Frontend greift per default
* Finetuning

### Version 4.0.1 - 22. Oktober 2014

* Fixed #147: Der standardmäßig aktivierte No Double Content Redirect führte zu Problemen wenn die URL der Website (noch) nicht korrekt gesetzt war. Default deshalb vorerst deaktiviert.
* Verbessert: Hinweis in die Startguide aufgenommen: Ein No Double Content Redirect sollte in den Einstellungen ausgewählt werden nachdem das Setup durchgeführt wurde. Empfohlen: One Domain Only
* Verbessert: Benutzungs-Hinweis für den Tag Editor in den Einstellungen hinzugefügt

### Version 4.0.0 - 21. Oktober 2014

* Update: Bitte die Hinweise in der `UPDATE.md` beachten!
* Fixed: `seo42::getImageFile()` gab im Backend nicht den richtigen Wert aus und dadurch wurde das Bild nicht angezeigt
* Neu: Update-Hinweise (auch für alle zukünftigen Versionen) wurden in die Datei `UPDATE.md` ausgelagert und sind auch über die Hilfe im AddOn einsehbar.
* Neu: No Double Content Redirects eingeführt. Ersetzen die WWW/Non-WWW Redirects aus Setup Schritt 2. One Domain Only Redirect hinzugefügt um nur noch eine Domain zu erlauben.
* Neu: Updatefähigkeit für REDAXO 4.6 hergestellt. Bei einem Update werden die Einstellungen nicht mehr überschrieben, da diese nun im Data-Ordner von REDAXO abgelegt werden
* Neu: Einstellungen nun alle über das Backend verfügbar :)
* Neu: Alle Dateien wie Redirects-Cachedatei und `.htaccess` Backups werden im Data-Ordner von REDAXO abgelegt
* Neu: Einstellung `redirects` hinzugefügt, um die Redirects-Seite ausschalten zu können (z.B. wenn man die Redirects-Funktionalität des url_control Plugin einsetzt). Die Option kann theoretisch auch von einem Plugin gesetzt werden.
* Neu: Einstellung `allow_article_id` hinzugefügt, um bei Spezialfällen nicht umgeschriebene Urls zu erlauben. Achtung! Bitte nur einschalten wenn wirklich benötigt! Und: Diese Option setzt die `auto_redirects` Option für die nicht umgeschriebenen Urls ausser Kraft!
* Neu: `seo42::getIconFile()` inkl. Directoryangabe in den Einstellungen hinzugefügt
* Verbessert: Das SEO42 Boilerplate in Setup Schritt 3 wurde etwas abgespeckt so dass nur noch die wichtigsten Zeilen sichbar sind
* Verbessert: `seo42::getMediaUrl()` und `seo42::getAbsoluteMediaFile()` zu den Codebeispielen hinzugefügt
* API Umstellung: EP's haben jetzt alle den Prefix `SEO42_`
* API Umstellung: Pathlist Arrays lauten jetzt `$SEO42_URLS` und `$SEO42_IDS`
* API Umstellung: Alle Funktionen aus der Rewriter-Klasse umbenannten `SEO42Rewrite` sowie die PHP-Dateien selbst beginnen jetzt mit Prefix `seo42_`
* API Umstellung: `seo42::getImageManagerUrl()` entfernt. Bitte nur noch `seo42::getImageManagerFile()` benutzen
* Umbenannt: `robots_txt_auto_disallow` in `no_robots_txt_auto_disallow`
* Entfernt: `drop_dbfields_on_uninstall` Option
* Entfernt: `debug_article_id` Option

### Version 3.4.0 - 24. September 2014

* Neu: `seo42::getResourceFile($fileWithPath)` implementiert. Damit kann man nun unabhängig von den gesetzten Resource-Verzeichnissen JS/CSS Dateien inkl. Versionsstring ausgeben lassen. Pfad muss hier mit angegeben werden! Codebeispiele wurden ergänzt.
* Neu: `seo42::getMediaDirName()` gibt den reinen Medienordner (R4 = files) zurück. Im Gegensatz dazu gibt `seo42::getMediaDir()` den Medienordner inkl. Slash vor und danach aus.
* Neu: `seo42::getAbsoluteMediaFile($file)` hinzugefügt. Gibt den absoluten Pfad der Mediendatei aus. Nützlich für `filesize()` etc.
* Neu: `seo42::getUrl()` hinzugefügt als Wrapper zu `rex_getUrl()`
* Neu: Option `no_url_for_categories` hinzugefügt (Prinzip wie `remove_root_cats_for_categories`). Damit kann man ein Array von Kategorie ID's angeben, deren Artikel automatisch den URL-Typ "Keine URL" zugewiesen bekommen. Nützlich für Container Kategorien deren Artikel on/offline schaltbar sein sollen aber deren URLs nicht in der Sitemap erscheinen dürfen.
* Neu: Option `robots_txt_auto_disallow` hinzugefügt um den automatischen robots.txt Eintrag abschalten zu können. Url landet bei einem Disallow meist im Index, während wenn man nur den noindex Metatag setzt dass nicht passieren sollte.
* Neu: Option `redirects_allow_regex` hinzugefügt. Redirects unterstützen jetzt die RegEx Notation wenn Option aktiv, thx@Sysix-Coding
* Neu: Option `auto_redirects` in den Einstellungen um dass Handling von `ArticleName.0-42.html` aus R3 ergänzt, thx@Tobi
* Neu: FAQ Eintrag: Warum bekomme ich einen Fehler bei der Einbindung von Bootstrap? (inkl. Hinweise in die Readme aufgenommen), thx@webghostx
* Neu: FAQ Eintrag: Wie installiere ich ein (SEO42) Plugin?, thx@webghostx
* Verbessert: `.htaccess` Audiotypen hinzugefügt
* Verbessert: `seo42::getUrlString()` Codebeispiel hinzugefügt
* Verbessert #132: Anpassungen vorgenommen für url_control Plugin
* Deprecated: `seo42::getImageManagerUrl()` wurde zur Entfernung vorgemerkt. Bitte nur noch `seo42::getImageManagerFile()` benutzen.

### Version 3.3.2 - 30. Juli 2014

* Fixed #135: [Nur Unterordner-Installs] Auto Redirects führt ein redirect ohne Unterordner aus, thx@execrable für den Bugreport
* Neu `nav42`: `setHideIds(array(1,2,3))` hinzugefügt. Damit lassen sich beliebige Menüeinträge (Artikel-IDs) verstecken. In der Sitemap.xml bleiben diese aber erhalten wenn online.
* Neu `seo42`: `getAllowedDownloadFileTypes()` und `isAllowedDownloadFileType()` hinzugefügt, thx@pemd

### Version 3.3.1 - 17. Juli 2014

* Hinweis: Die mitgelieferte `.htaccess` Datei hat sich in dieser Version geändert. Bei Update bitte beachten.
* Fixed: #129: JS und CSS Dateien wurden bei der Verwendung von `seo42::getJSFile()`/`seo42::getCSSFile()` nicht geladen, wenn ein Versionsstring bereits im Dateinamen enthalten war
* Verbessert: In Codebeispiel 7 fehlende Klammer ergänzt

### Version 3.3.0 - 17. April 2014

* Fixed #123: SVG Bilder wurden nicht angezeigt bei bestimmten Webserverkonfigurationen (Achtung, `.htaccess` Datei hat sich in dieser Version geändert), thx@meugel
* Fixed #122: Nur Unterordner-Installs: Call to undefined function trimSubDir() Fehler gefixt, thx@Sysix-Coding
* nav42: Komplettumbau der Klasse `nav42`. Ist nun keine statische Klasse mehr! Siehe Codebeispiele in der Hilfe von SEO42.
* nav42: `setUlId($ulId, $level = 0)` und `setUlClass($ulClass, $level = 0)` hinzugefügt. Damit kann man jeder Ul auf jedem Level innerhalb der Navigation eine CSS-Klasse/ID zuweisen
* nav42: `setActiveClass($activeClass)` hinzugefügt. Damit kann mann die letzte selektierte Klasse angeben. Default: `selected active`
* nav42: `setCurrentClass()` in `setSelectedClass()` umbenannt
* nav42: `setLangCurrentClass` in `setLangSelectedClass` umbenannt
* Entfernt: Wrapper-Methoden `seo42::getNavigationByLevel()`, `seo42::getNavigationByCategory()` und `seo42::getLangNavigation()`. Aufruf bitte nur noch über die Klasse `nav42`.
* Verbessert: `seo42::getUrlString()` zum Debug-Output hinzugefügt

### Version 3.2.0 - 16. März 2014

* Neu: `seo42::getMediaUrl()` hinzugefügt. Wie `seo42::getMediaFile()` nur mit voller Url ausgabe, thx@SigmaAlphaPi
* Neu: EP's `SEO42_COMPILE_LESS` und `SEO42_COMPILE_SCSS` hinzugefügt um alternative Compiler damit einbinden zu können, thx@DanielWeitenauer
* Neu: Neues Plugin `lessdotphp` (alternativer LESS Compiler) von DanielWeitenauer in die Readme hinzugefügt, thx@DanielWeitenauer
* Fixed: Import Dir beim LESS Compiler richtig gesetzt, so dass jetzt `@include` korrekt funktioniert, thx@DanielWeitenauer
* Verbessert: Angabe von `//` Urls zusätzlich zu `http://` möglich bei `seo42::getCSS()` und Co., thx@DanielWeitenauer

### Version 3.1.2 - 19. Februar 2014

* Fixed #110: `seo42::getTitle()` und `&amp;` Problem gefixt, thx@akrys
* Verbessert: `seo42::getLangNavigation()` gibt nun Ids aus statt Klassen (wenn gewünscht)
* Verbessert: Codebeispiele in der Hilfe für `seo42::getLangNavigation()` ergänzt

### Version 3.1.1 - 13. Februar 2014

* Fixed #107: Betrifft nur Unterordner-Installs: Canonical Url jetzt ohne doppelten Unterordner
* Neu: `seo42::getTitlePart()` hinzugefügt falls jemand nur den Titel ohne den Websitenamen brauchen sollte ;)
* Neu: `seo42::getUrlString($string)` hinzugefügt. Wrappt `rexseo_parse_article_name` und ist nützlich um z.B. saubere Ankernamen für Urls zu erzeugen `foo.html#clean-anchor-name`
* Verbessert: Anpassungen für das `url_control` Plugin vorgenommen

### Version 3.1.0 - 08. Februar 2014 

* Fixed #106: `$REX['CUR_CLANG']` wird jetzt vor dem Aufruf von `REXSEO_ARTICLE_ID_NOT_FOUND` gesetzt. Wichtig für das `url_control` Plugin.
* Fixed: Problem mit dem `auth_media` Plugin in Zusammenhang mit suchmaschinenfreundlichen Image Manager Urls gefixt. Ulrs lauten jetzt so: `/imagetypes/img_type/pic.jpg` (`.htaccess` hat sich geändert!)
* Neu: Force Download Funktionalität inkl. suchmaschinenfreundlicher Urls und Canonical Header hinzugefügt. Datei in `files` Ordner ablegen, Dateityp (z.B. 'pdf') zu Einstellung `force_download_for_filetypes` hinzufügen und `seo42::getDownloadFile($file)` nutzen oder so verlinken: `/download/foo.pdf` (`.htaccess` hat sich geändert!)
* Neu: Bei manchen Webserver (z.B. 1und1) wird für Image Manager Bilder per `.htaccess` Datei kein Cache Control Header gesendet. Über die neue Einstellung `fix_image_manager_cache_control_header` wird dies per PHP erledigt. Default ist aber deaktiviert.
* Verbessert: Englisches Langfile komplett übersetzt. Credits und ein herzliches Dankeschön gehen an SigmaAlphaPi :)
* Verbessert: Man kann jetzt auch weitere Unterordner angeben bei der Nutzung von `seo42::getCSSFile()` und Co.. Beispiel: `seo42::getCSSFile("foo/extra.css")` -> `/resources/css/foo/extra.css`
* Verbessert: Vorhandene Lang-Presets als Kommentar in die `settings.lang.inc.php` gepackt zur direkten Verwendung. Danke an alle die hier mit eingebracht haben und noch einbringen werden ;)
* Verbessert: Beginners' Guide in Startguide umbenannt

### Version 3.0.0 - 02. Februar 2014

* Neu: Beginners' Guide als kleine Anleitung für Einsteiger und Neulinge hinzugefügt, zu finden in der SEO42 Hilfe.
* Neu: SEO42 HTML5 Boilerplate hinzugefügt. Kann und soll als Basis für eigene Templates genutzt werden. Zu finden im Setup Schritt 3.
* Neu: Das AddOn Resource Includer inkl. `.htaccess` Datei, SCSS/LESS Compiler, etc. wurde direkt in SEO42 integriert. Da nun die Cachingdauer von CSS/JS Dateien auf 4 Wochen eingestellt ist sollte unbedingt entweder die Methoden `seo42::getCSSFile()` / `seo42::getJSFile()` genutzt werden oder man reduziert in der `.htaccess` Datei die Cachingdauer (z.B. auf 1 Woche).
* Neu: Option `remove_root_cats_for_categories` hinzugefügt mit der man Kategorien (IDs) einstellen kann deren Artikel automatisch den URL-Typ "Root-Kategorie entfernen" erhalten sollen (experimentell!)
* Verbessert: `seo42` Klasse: Wrapper Methoden `seo42::getNavigationByLevel()`, `seo42::getNavigationByCategory()`, `seo42::getLangNavigation()` hinzugefügt, `seo42::setNavigationClass()` (default auf `nav42`) hinzugefügt
* Verbessert: `seo42::getImageManagerUrl()` umbenannt in `seo42::getImageManagerFile()`. `seo42::getImageManagerUrl()` bleibt aus Kompatibilitätsgründen bestehen.
* Verbessert: `nav42` Klasse: Abhängigkeit zu `rex_navigation` entfernt, ein Patchen des Community AddOns ist jetzt nicht mehr nötig (entsprechenden Readme-Eintrag entfernt)
* Verbessert: `auto_redirects` Option in die Einstellungen-Seite gepackt
* Verbessert: `smart_redirects` Option jetzt standardmäßig eingeschaltet
* Verbessert: `seo42::getLangTags()` berücksichtigt jetzt extra Urls (z.B. per url_control Plugin)

### Version 2.8.3 - 11. Januar 2014

* Fixed #86: Bei RewriteMode = Urlencode und Standalone-Benutzung von `rexseo_parse_article_name` werden mehrfach vorkommende `-` auf eins reduziert
* Fixed: Die automatische Canonical Url funktioniert jetzt auch korrekt mit manuell hinzugefügten Urls (TvsBlog, url_control)
* Verbessert: Automatische Auswahl der richtigen WWW-Weiterleitung im Setup anhand der angegeben Url der Website im Setup Schritt 1, Option `non_www_to_www` entfernt
* Verbessert: Debug Ausgabe zeigt Community Version wenn vorhanden
* Verbessert: Neue Parameter `$useLangCodeAsLinkText` und `$upperCaseLinkText` zu `nav42::getLangNavigation()` hinzugefügt
* Verbessert: Weitere Hinweise zur SEO42 Plugin Entwicklung in die Readme audgenommen
* Finetuning

### Version 2.8.2 - 02. Dezember 2013

* Neu: `auto_redirects` Option um alte REDAXO Urls automatisch weiterzuleiten auf die Neuen. 0 = aus, 1 = Schema `index.php?article_id=1` weiterleiten, 2 = Schema `1-0-ArticleName.html` weiterleiten
* Entfernt: `allow_article_id` Option (ist nun `auto_redirects` = 1)

### Version 2.8.1 - 23. November 2013

* Fixed #85: `REXSEO_SITEMAP_ARRAY_CREATED` jetzt wieder ohne vorangestellte ServerUrl
* Fixed #84: Bessere Datumsausgabe für die `sitemap.xml`
* Verbessert: OnePageMode auf Mehrsprachigkeit hin optimiert (betrifft `Sitemap.xml` und Anzeigen-Link für Artikel)
* Verbessert: `seo42::getLangNavigation()` selektiert jetzt auch die aktuelle Sprache. Parameter `$currentClass` hinzugefügt.
* Verbessert: Beim Hinzufügen einer neuen Sprache werden die ganzen SEO Daten (Titel, Beschreibung etc.) nicht mehr übernommen von der Hauptsprache

### Version 2.8.0 - 13. November 2013

* Neu: Option `smart_redirects` hinzugefügt (per Defaulteinstellungen zuerst mal deaktiviert): Leitet den Benutzer der in der Adressleiste Urls von Hand verkürzt auf die korrekte Url um, wenn vorhanden (z.B. `domain.de/foo/bar/` > `domain.de/foo/bar.html`).
* Neu: Recht `seo42[redirects_only]` hinzugefügt um für normale Benutzer nur die Redirects Seite anzuzeigen. Muss mit Recht `seo42[]` gesetzt werden.
* Neu: Sortiermöglichkeiten für die Redirects Liste hinzugefügt
* Neu: Hinweis in der Readme.md und in der FAQ auf [HTML5 Boilerplate](http://html5boilerplate.com/) bzw. [Resource Includer](https://github.com/RexDude/resource_includer) als SEO-Maßnahme zur Verbesserung der Ladezeit der Website.
* Verbessert: Hinweis Icons jetzt inkl. Tooltips :)
* Verbessert: `.htaccess` Anweisung für die Deaktivierung der Verzeichnisauflistung optimiert. Leider gibt es trotzdem Server die einen 500 Server Error raushauen :(
* Verbessert: Neben der automatischen Einbindung der aktivierten Plugins für SEO42 werden nun auch die Language-Files der Plugins automatisch mit eingebunden
* Entfernt: Einstellungen `levenshtein` und `rewrite_params` komplett entfernt

### Version 2.7.0 - 02. November 2013

* Fixed: Redirects gingen manchmal auf die nicht-WWW Adresse, dadurch entstanden dann 2 Redirects
* Neu: Marvin, der Roboter ist nun in der Hilfe zu finden und gibt dort wertvolle Lebensweisheiten von sich ;)
* Neu: Es wird nun ein 404 Header gesendet wenn Fehlerartikel = Startartikel der Website ist. Standardverhalten von REDAXO ist hier nämlich sonst kein 404 zu senden was schlecht fürs SEO ist.
* Neu: FAQ-Eintrag: `Meine CSS Dateien werden nicht geladen?!`
* Verbessert: Im Setup Schritt 1 wird der Hinweis auf die `settings.lang.inc.php` gegeben, wo man aktuell noch die Spracheinstellungen vornehmen muss. Zusätzlich wird ein Status-Icon angezeigt falls die Anzahl der Sprachen mit den REDAXO Sprachen nicht übereinstimmt.
* Verbessert: Optionale Parameter `ulId`, `showLiClasses` und `hideLiIfOfflineArticle` für `seo42::getLangNavigation()` hinzugefügt
* Verbessert: Nach Wechsel von REDAXO Unterordner-Installation auf normale Installation wird im Setup die RewriteBase Checkbox weiterhin angezeigt bis `.htaccess` Datei neu kopiert
* Verbessert: Debug-Output inkl. REDAXO, SEO42 und PHP Versionen-Anzeige, `seo42::hasTemplateBaseTag()` hinzugefügt

### Version 2.6.1 - 31. Oktober 2013

* Fixed #65: WWW-Weiterleitung gilt nur noch für das Frontend. Dadurch wird bei manchen ein versehentliches Aussperren aus dem Backend vermieden.
* Fixed #64: Bei einem LangCode `en-US` lautet der LangSlug jetzt korrekt `en`. Methode `seo42::getLangSlug()` hinzugefügt.
* Neu: `seo42::getLangNavigation()` zur Ausgabe von einfachen Sprachnavigationen hinzugefügt
* Neu: Jeder Redirect kann nun direkt getestet werden über den entsprechenden Link
* Verbessert: Community Addon Unterstützung. `Sitemap.xml` reagiert nun auf gesperrte Artikel des Community Addons.

### Version 2.6.0 - 24. Oktober 2013

* Fixed: Bug bei Option `full_urls` in Kombination mit externen URLs 
* Fixed: Redirects funktionieren jetzt auch mit REDAXO Unterordner Installationen
* Fixed: bei `allow_articleid` = 0 und einer `article_id` URL wird jetzt ein 404 Fehler ausgegeben anstelle eines Redirects auf die Startseite
* Fixed: Autom. Canonical URL und Rel Alternate Tags werden bei einem 404 Fehler nicht mehr gesetzt
* Fixed: Website Manager Umschalter funktionierte nicht mehr, wenn man auf der Redirects Page war
* Fixed: Wenn `URL der Website` = `www.redaxo.org` wurde ein Unterordner entdeckt
* Teilweise Übersetzung in englisch (SEO- und URL-Page).
* Klasse `rex_navigation42` in `nav42` umbenannt. 
* Weitere Optionen für `nav42` hinzugefügt: `currentClass`, `firstUlId`, `firstUlClass`, `liIdFromMetaField`, `liClassFromMetaField`, `linkFromUserFunc`. Codebeispiele ergänzt und angepasst.
* Das Redirects Plugin wurde direkt in SEO42 integriert
* 3 RewriteModes für Sprachen hinzugefügt: `SEO42_REWRITEMODE_SPECIAL_CHARS`, `SEO42_REWRITEMODE_URLENCODE`, `SEO42_REWRITEMODE_INHERIT` (jeweils pro Sprache einstellbar)
* Optionen `urlencode_lowercase` und `urlencode_whitespace_replace` hinzugefügt
* Methoden `getLangName()` und `getOriginalLangName()` hinzugefügt
* Redirects werden nun im `generated` Ordner von SEO42 gespeichert
* `title_delimiter` auf Standardwert "-" gesetzt da Google anscheined gerne mal die Titles nachträglich abändert in den Suchergebnissen und dabei auch "|" in "-" konvertiert.
* Google Index Tool in seperatem Container und inkl. Domainfreischaltung
* Wenn Website Manager installiert, wird Schritt 1 im Setup deaktiviert
* Generelle Optimierungen für den Website Manager durchgeführt (z.B. `getImageManagerUrl()` verbessert)
* Extra Robots Einträge werden nun im `generated` Ordner von SEO42 angelegt. Website Manager Kompatibilität hergestellt.
* No-Caching Header für robots.txt und sitemap.xml hinzugefügt
* Skin Tuning für `simplerex` und `ppx_skin`
* ISO Lang-Datei hinzugefügt, damit Fehlermeldungen bei Install unter älteren REDAXO Versionen angezeigt werden
* `getLangTags()` berücksichtigt jetzt auch evtl. Query Params in der URL. Lässt sich über die neue Option `include_query_params` abschalten.
* Optionen `include_query_params` und `ignore_query_params` hinzugefügt
* Datei `settings.pagerank_checker.inc.php` umbenannt in `settings.domains.inc.php`
* Neuer FAQ Eintrag: `Warum kann kann man keine globalen Descriptions und Keywords eintragen, die dann für alle Seiten gültig sind?`
* URL Schema `url_rewrite` entfernt
* Finetuning, Codeoptimierungen, etc.

### Version 2.5.0 - 07. Oktober 2013

* Base-Tag wieder eingeführt ;) Damit ist es nun prinzipiell egal, wie die URLs beginnen, ausser bei REDAXO-Unterordnerinstallation. Dort dürfen Sie nicht mit `/` anfangen. Einfach trotzdem Codebeispiele 2 nutzen :P
* Für mehrsprachige Websites steht jetzt die PHP-Methode `seo42::getLangTags()` zur Verfügung um im Head-Bereich SEO-relevante `rel="alternate"` Tags hinzuzufügen.
* Fixed #62: Notices bei Installation des Community Addons beseitigt. Nötige Anpassungen in Zusammenhang mit der Klasse `rex_navigation42` zur Readme hinzugefügt.
* Fixed: Verschwundene Image Manager Bilder im Medienpool
* Automatische Canonical URL übernimmt jetzt mögliche Query Strings (z.B. seite=1, seite=2). Methoden-Parameter `$ignoreQueryParams` für `seo42::getCanonicalUrl()` hinzugefügt damit man Parameter (foo, foo=bar) als Array angeben kann, die eine eindeutige (kanonische) URL andeuten (z.B. seite=1).
* Automatische Weitereitung von `/langslug` nach `/langslug/`. 
* Neue Option `rewriter` um die URL-Umschreibung ein/auszuschalten, da dies über `REX['MOD_REWRITE']` ja nicht mehr geht.
* `Options -Indexes` (zum Abschalten des Directory Listings des Webservers) wird nur noch gesetzt, wenn im Setup angegeben. Inkl. Hinweis wegen möglichem 500 Servererror.
* Hilfesystem verbessert. Markdown Parser wird nun genutzt.
* Sonderzeichen wie z.B. der Middle dot `•` zu Anfang im Artikelnamen werden nun ausgeklammert aus der URL-Umschreibung. Davor wurden diese (bzw. das Leerzeichen danach) als `-` umgeschrieben.
* Redirects Plugin wird bei Installation des Addons nicht mehr automatisch mitinstalliert
* Sitemap.xml: Sortierung der Einträge anhand der Artikel-IDs
* Sitemap.xml: Neue Option `static_sitemap_priority` um die Priorität auf die festgelegten Werte 1.0 und 0.8 zu setzen. Sonst autom. Berechnung anhand des Kategorie-Levels.
* Option `subdir_force_full_urls` enfernt. Option `url_start_subdir` hinzugefügt.
* Redirects in die Debug-Ausgabe mit aufgenommen (wenn verfügbar) 
* Textkorrekturen, Feintuning, Codebeispiele erweitert, FAQ verbessert

### Version 2.1.2 - 25. September 2013

* Fixed: Notices and bestimmte PHP-Fehler wenn z.B. ein Artikel entfernt wurde, auf den bereits per URL-Typ verwiesen war.
* Fixed: Problem mit der Pathlist wenn ein Artikel/Kategorie geändert wurde.

### Version 2.1.1 - 23. September 2013

* Fixed: Beim Löschen einer Kategorie oder eines Artikels kam ein PHP-Fehler
* Kleine optische Verbesserungen

### Version 2.1.0 - 22. September 2013

* Fixed #59: Es kam eine leere Seite bei Block speichern/übernehmen oder nach Cache löschen tauchte ein PHP-Memory Problem auf.
* Fixed: Die Startseite enthielt einen Lang Slug, auch wenn Option `Starseite` -> `http://domain.de/lang-slug/` mit Option `Lang Slug` -> `Kein Lang Slug für Sprache: xy` aktiv war.
* Fixed: Bei einem 404 Fehler sollte der Fehlerartikel nun in der richtigen Sprache erscheinen
* Wurde bereits vor Installation des Addons eine unvollständige URL unter System eingegeben (z.B. www.redaxo.org), erscheint im Setup direkt eine entsprechende Meldung.
* Klasse `rex_navigation42` inkl. Codebeispiele zu SEO42 hinzugefügt. Methode `getMenuByLevel()` in `getNavigationByLevel()` und `getMenuByCategory()` in `getNavigationByCategory()` umbenannt.
* Option `Starseite` standardmäßig auf `http://domain.de/lang-slug/` gesetzt. Greift nur bei mehrsprachigen Websites. Hier wird dann z.B. `/en/home.html` direkt in `/en/` umgeschrieben.
* Neue Optionen `global_special_chars` und `global_special_chars_rewrite` zur `settings.lang.inc.php` hinzugefügt (für die URL-Umschreibung). Damit lassen sich Sonderzeichen definieren die für alle Sprachen gültig sind. Die sprachabhängigen SpecialChars haben eine höhere Priorität bei der Ersetzung wie die sprachunabhängigen, globalen SpecialChars.
* RexSEO EP `REXSEO_SPECIAL_CHARS` entfernt, da nun die SepcialChars über die `settings.lang.inc.php` gesetzt werden.
* Neues Codebeispiel für: Sprachunabhängiger Website-Name im Titel
* Umleitungsvariante "WWW -> Nicht-WWW" hinzugefügt. Über die neuen Option `non_www_to_www` ist es möglich zu steuern welche Art von WWW-Umleitung man im Setup haben möchte.
* Es wird geprüft ob die URL schon existiert bei URL-Typen "Interne URL" sowie "Root-Katagorie entfernen"
* Beim URL-Typ "Interne URL" wird beim Setzen einer neuen URL diese korrekt umgeschrieben falls z.B. Sonderzeichen vorkommen

### Version 2.0.0 - 18. September 2013

* AddOn wurde von REXSEO42 in SEO42 umbenannt. Die Klasse `rexseo42` wurde in `seo42` umbenannt. Ein Update-Anleitung findet sich in der README.md.
* Neue URL-Page zum manipulieren von URLs. Einige Url-Typen greifen erst, wenn bei der Ausgabe der Navigation auf diese reagiert wird. Die Klasse `rex_navigation42` unterstützt diese Typen bereits (ab 2.1.0 in SEO42 beigelegt). Zusätzliche URL-Typen sind über die Option `all_url_types` abschaltbar.
* Neues Recht `url_default` hinzugefügt um normalen Benutzer die URL-Page ein bzw. auszuschalten.
* PHP-Methode `setWebsiteName()` hinzugefügt sowie `getTitle()` um Parameter `$websiteName` erweitert. Damit lässt sich z.B. über das String Table Addon einen anderen Website-Namen (der damit dann auch sprachunabhängig sein kann) zwecks Titel-Generierung setzen.
* Titel-Vorschau in der Seopage nach oben verschoben
* Neue Optionen `seopage` und `urlpage` um die beiden Seiten global abzuschalten, wenn nicht gebraucht.
* Plugins werden automatisch in das SEO42-Menü eingebunden, wenn installiert und aktiviert (nur für Entwickler interessant).
* Die NoIndex Checkbox in der SEO-Page wurde standardmäßig abgeschaltet. Über die Option `noindex_checkbox` wieder einzuschalten.
* Die No-Prefix/Suffix Checkbox in der SEO-Page wurde standardmäßig abgeschaltet. Über die Option `no_prefix_checkbox` wieder einzuschalten.
* PageRank Checker zu den Tools hinzugefügt. Lässt sich über die Option `pagerank_checker` ausschalten. Domain-Freischalt-Funktion ist Website Manager kompatibel.
* Auf der Debug Seite wird nun auch die Pathlist ausgegeben.
* Option `title_preview` hinzugefügt um die Titel-Vorschau abzuschalten, falls man sein eigenes Titel-Schema implementiert hat.
* Umbenennungen der Optionen: `userdef_canonical_url` -> `custom_canonical_url`, `hide_no_prefix_checkbox` -> `no_prefix_checkbox`.
* Updatedatum des Artikels wird nun automatisch aktualisiert, wenn Änderungen über die SEO-Page durchgeführt wurden.
* Redirects Plugin wird automatisch installiert und aktiviert sobald SEO42 installiert wird.
* Redirects Plugin hinzugefügt um 301 Weiterleitungen komfortabel über das Backend anlegen zu können. Bitte Urls immer mit einem Splash beginnen, die Ziel Url kann aber auch mit http:// beginnen. Plugin ist Website Manager kompatibel.

### Version 1.2.1 - 21. Mai 2013

* Fixed: Es kam ein PHP-Error wenn kein Artikel vorhanden

### Version 1.2.0 - 18. Mai 2013

* Neues Plugin `url_generate` von tbaddade in die README.md mit aufgenommen
* Neuer FAQ Eintrag wegen möglichen 500 Server Error, siehe auch Hinweise in der README.md
* Neues Recht: `seo42[tools_only]` für Zugriff auf die Tools-Page für Nicht-Admins (`seo42[]` muss mit ausgewählt werden)
* Wenn ein Artikel nicht indiziert werden soll wird zusätzl. noch ein `X-Robots Header` ausgegeben.
* Prefix/Suffix Unterscheidung für die Checkbox in der SEO-Page inkl. Option `hide_no_prefix_checkbox` um die Checkbox zu verstecken, wenn anderes Titelschema benötigt
* Beim WWW-Redirect in der `.htaccess` Datei werden jetzt Sudomains ausgeklammert (wichtig für Website Manager AddOn)
* `ignore_root_cats` Option verbessert
* Fixed #49: Wenn die Url einen Trennstrich hatte, wurde fälschlicherweise ein Unterordner entdeckt
* RewriteRules für Website Manager Addon verbessert

### Version 1.1.42 - 23. April 2013

* Fixed #41: Parameter in der URL (test.html?foo=bar) führten zu einem 404 Fehler
* Neues Feature: man kann nun direkt aus dem Backend heraus sich alle Einstellungen anschauen die gerade aktiv sind
* Verbesserte Debug Info: es werden jetzt auch alle Settings und die .htaccess Datei mit ausgegeben
* `REX['MOD_REWRITE']` wird on the fly aktiviert sobald AddOn aktiv (master.inc.php wird dafür nicht angepasst)
* Unterordner Verhalten (hoffentlich) verbessert: `subdir_force_full_urls` hinzugefügt, Base Tag komplett entfernt
* Setup für Unterordner-Installationen angepasst: u.a. Option hinzugefügt um die RewriteBase automatisch zu setzen
* Kleine kosmetische Änderungen sowie Textänderungen
* Einstellungsseite lässt sich wieder speichern

### Version 1.0.42 - 10. April 2013

* Änderungen am Datenbank-Schema: `seo_canonical_url` hinzugefügt, `seo_url` in `seo_custom_url` umbenannt
* Neues Feature: Die Canonical Url kann nun auch per Artikel gesetzt werden. Allerdings muss dies explizit in der `settings.advanced.inc.php` aktiviert werden.
* Neues Feature: Es ist nun mögliche "volle" Urls (also inkl. Domain, wie bei WordPress) über die Option `full_urls` zu erhalten
* Neues Feature: `ignore_root_cats` (experimentell)
* Bei normalen Installationen: Base-Tag kann weggelassen werden.
* "Normale" 404-Seite des Webservers, wenn eine Datei unter `files` oder `redaxo` nicht gefunden wurde
* Neue Debug Seite in der Hilfe
* Neue Hilfe Unterpunkte: Codebeispiele und Links, Faq überarbeitet
* Verzeichnis-Auflistung z.B. für files und `files/addon`s wird per .htaccess Datei unterbunden
* Neues Feature: One Page Mode, für Websites die nur über eine einzige Seite verfügen 
* Neues Feature: SEO Tools - eine Linksammlung zu wichtigen SEO-Tools im Netz
* Neue Permission: `seo42[seo_default]` und `seo42[seo_extended]` um für Nicht-Admins die Sichtbarkeit der SEO-Page zu steuern
* editContentOnly[] wird nun berücksichtigt
* Neues Feature: Checkbox zum setzen der WWW-Umleitung im Setup
* `REX['MEDIA_DIR']` wird genutzt
* Robots noIndex Option:  Bug gefixt der bei Mehrsprachigkeit auftrat
* Lang Codes für die Lang Slugs können nun vorläufig in der `settings.lang.inc.php` definiert werden
* Auto DB Fix nach DB-Import wenn die DB Felder fehlen sollten
* SEO-Page: Title, Description und Keywords abgesichert. Keywords werden z.B. nur kleingeschrieben übernommen.
* SEO-Page: Html und CSS aufgeräumt und verbessert
* seo42 Klasse aufgeräumt und ergänzt: `getHtml()`, `getImageTag()`, `getImageManagerUrl()`, etc.
* Änderungen bis RexSEO 1.5.4 reingenommen
* I18N Support: Alles Strings in die Lang-Datei gepackt
* .htaccess Datei aufgeräumt und vereinfacht, `redaxo/.htaccess` entfernt
* Weitere Einstellungen wurden in die `settings.advanced.inc.php` gepackt
* Code wurde generell vereinfacht und aufgeräumt 
* Lizendatei hinzugefügt
* Installation wird bei bei diesen installierten Addons verweigert: `rexseo`, `url_rewrite`, `yrewrite`
* Bei REDAXO 4.5 Beta Versionen wird die Installation nun nicht mehr verweigert
* Aufruf von ADDONS_INCLUDED auf early gesetzt

### Version 1.0.1 - 17. Feburar 2013

* Changelog eingeführt
* Entfernt: Restore Config/Settings Backup
* Einstellungen aus config.inc.php in settings.inc.php verschoben
* Option in settings.inc.php: bei Deinstallation DB-Felder inkl. Daten erhalten 

### Version 1.0.0 - 09. Feburar 2013

Erstes Release mit folgenden Änderungen/Features gegenüber dem original RexSEO:

* Läuft nur mit REDAXO 4.5+
* Entfernt: Selten gebrauchte Features aus der Benutzeroberfläche
* Entfernt: Hilfe-Icons
* Entfernt: Textile Abhängigkeit 
* Entfernt: Default Beschreibung und Suchbegriffe
* Entfernt: Checkbox "Erweiterte Einstellungen"
* Entfernt: GitHub Anbindung
* Entfernt: JavaScript/jQuery Stuff
* Entfernt: Sitemap Changefreq und Priotity
* Canonical URL wird automatisch pro Domain ermittelt, nicht mehr pro Artikel
* Neue Setup-Routine (Quickstart) die in 3 übersichtliche Schritte aufgeteilt ist
* Backups der .htaccess-Dateien werden in das Backup-Verzeichnis geschoben
* Kommt ohne MetaInfos aus stattdessen extra SEO-Page für jeden Artikel
* SEO-Page: Titel Schema laut Google Empfehlung
* SEO-Page: Titel lässt sich mit der Option "Kein Prefix" komplett selber bestimmen
* SEO-Page: Live Titel Vorschau inkl. Titelkürzung a la Google-Suchergebnis
* SEO-Page: Live Anzeige der Buchstaben/Wörter-Anzahl für Beschreibung/Suchbegriffe
* SEO-Page: Live Vorschau der benutzerdefinierten URL
* SEO-Page: noIndex-Option um Seiten aus dem Suchindex auszuschließen
* Klasse `rexseo_meta` durch statische Klasse `seo42` ersetzt
* sitemap.xml sowie robots.txt erhalten die Headeranweisung "X-Robots-tag: noindex"
* Links zur robots.txt und sitemap.xml in der Einstellungen-Seite
* .htaccess-Datei enthält Rewrite-Regel für suchmaschinenfreundliche Image-Manager-URLs 
* PHP Notices entfernt, Strict-Kompatibel
* REX['GENERATED_PATH'] aus REDAXO 4.5 wird genutzt
* FAQ mit der Antwort auf die Fragen aller Fragen ;)
