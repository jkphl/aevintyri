# Controller kopieren

1. Apigility REST-API anlegen
	* HTTP methods anlegen
	* Page size parameter "max"
	* "max"-Parameter in die Whitelist
	
2. Documentation
	* "XXX API" als Titel angeben und speichern
	
3. module.config.php
	* "/api" in der Route ergänzen
	* service_manager/factory ergänzen
	
4. documentation.config.php
	* Abschnitt ergänzen
	* Entitätsname im neuen Abschnitt suchen & ersetzen
	* Response in Apigility
	
5. Mapper/Factory
	* Anlegen
	* Namensraum anpassen
	* Klassenname anpassen

6. Rest/Days
	* Alle Dateien durchgehen und formatieren
	* XXXResourceFactory: $services->get('v1.mapper.xxx') im Konstruktor ergänzen
	* Resource
		* Ableiten von \API\V1\Rest\AbstractResource
		* AbstractResourceListener durch API\V1\Paginator\Adapter\DoctrineAdapter ersetzen
		* fetch() und fetchAll()

# Noch zu erzeugen

* ~~country~~
* ~~day~~!
* ~~event~~
* ~~link~~
* ~~organizer~~
* ~~presenter~~
* ~~room~~
* ~~session~~
* ~~tag~~
* ~~venue~~