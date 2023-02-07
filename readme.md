# Eenvoudige doorverwijzing 🪄
Dit PHP script verwijst binnenkomende verzoeken door naar een URL op basis van een queryvariabele en een doel-URL.

## Installatie 🛠️
Het is voldoende om de bestanden `index.php`, `standaard-url.txt` en `codes.json` op de webserver te plaatsen. Deze drie bestanden moeten in dezelfde map staan op het hoogste niveau in de mappenstructuur. Het bestand `index.php` dient ongewijzigd te blijven. Het bestand `codes.json` bevat een complete lijst van alle mogelijke doorverwijzingen die je wenst in te stellen. Zoals de bestandsnaam al aangeeft moet in `standaard-url.txt` de volledige URL opgegeven worden die als standaard doorverwijzingspagina ingesteld moet worden als er geen specifieke doorverwijzing is opgegeven.

## Doorverwijzingen instellen ⏩
Zorg ervoor dat de gewenste standaard-url staat ingesteld in het bestand `standaard-url.txt`. Dit moet een volledige url zijn zonder spaties of witregels ervoor of erachter. Elke specifieke doorverwijzing bestaat tenminste uit een ID-nummer en uit een doel-URL. Andere variabelen kunnen naar behoefte worden toegevoegd. Het is aan te raden om op zijn minst een gebruiksvriendelijke titel of naam bij elke doorverwijzing te zetten om het beheer van de lijst met doorverwijzingen te vereenvoudigen. Om het bestand `codes.json` te bekomen bestaan er meerdere methodes. De eenvoudigste methode is als volgt:

1. Maak in Excel (of vergelijkbaar) een lijst aan met op zijn minst twee kolommen: `id` en `target`. Een beschrijvende extra kolom kan handig zijn om zaken terug te kunnen vinden, de naam hiervan maakt niet uit.
2. Houd in deze Excel file alle doorverwijzingen bij
3. Maak een export van de Excel file naar CSV
4. Gebruik de site [csvjson.com](https://csvjson.com/csv2json) om dit bestand gemakkelijk om te zetten naar een JSON-bestand
5. Download het resultaat en hernoem het bestand `codes.json`
6. Plaats (via ftp) dit JSON-bestand in de hoofdmap van de site

Het bestand `codes.json` kan gerust steeds overschreven worden om nieuwe doorverwijzingen toe te voegen of om er enkele te wissen, zorg er echter voor dat je ergens een backup hebt van je volledige lijst doorverwijzingen, bijvoorbeeld in het genoemde Excel-bestand.

## Gebruik 🍌
Na installatie kun je naar het domein surfen waar dit script op geïnstalleerd staat. Standaard zul je worden doorverwezen naar de zelf ingestelde standaard-URL. Wanneer je de queryvariabele `?q=` aan de URL toevoegd, gevolgd door het ID nummer van de gewenste doorverwijzing, bijvoorbeeld `180002`, zul je worden doorverwezen naar de pagina die je in het bestand `codes.json` gekoppeld hebt aan object `180002`. Zo'n URL kan er dus bijvoorbeeld zo uit zien: `https://www.voorbeeld.be/?q=180002`. Een dergelijke URL kan vervolgens op vele manieren gebruikt worden, bijvoorbeeld in de vorm van een [QR code](https://duckduckgo.com/?q=QR+https%3A%2F%2Fwegenenverkeer.be%2F&t=h_&ia=answer).

## Wat dit script niet doet 🤔
Dit script is bedoeld als eenvoudige oplossing om doorverwijzingen van het ene naar het andere domein mogelijk te maken zonder tussenkomst van software en een domein van een derde partij. Daarom kent het de volgende beperkingen:

- Statistieken en gebruikersgegevens bijhouden
- Foutmeldingen sturen of foutrapporten genereren
- Een 404 pagina tonen. Een ongeldig verzoek wordt doorverwezen naar de standaard URL
- Zoekmachineoptimalisatie (SEO)
- Uitgebreide beveiligingsinstellingen (door de eenvoud van het script is dit ook niet noodzakelijk)
- Een interface bieden om doorverwijzingen op te lijsten en te beheren (dit moet rechtstreeks in het bestand `codes.json`)