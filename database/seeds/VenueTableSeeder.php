<?php

/**
 * aevintyri
 *
 * @category    Apparat
 * @package     Apparat_<Package>
 * @author      Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @copyright   Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @license     http://opensource.org/licenses/MIT	The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"]); to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueTableSeeder extends Seeder
{
    public function run()
    {
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Orpheum-Lichtspielhaus',
            'street_address_1' => 'Johannisstraße 32a',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90419',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.45814',
            'longitude'        => '11.06674',
            'hashtag'          => 'Orpheum',
            'description'      => 'Das historische Orpheum-Lichtspielhaus wurde 1910 als glamouröses Kino im Nürnberger Stadtteil St. Johannis errichtet. Den zweiten Weltkrieg überstand das Gebäude nur schwer beschädigt und wurde 1948 restauriert wiedereröffnet. Der Siegeszug des Fernsehens zwang das Kino in den 60er Jahren, seinen Betrieb einzustellen. Bis in die späten 90er Jahre wurde das Kino daraufhin als Supermarkt genutzt und schließlich in einem ruinösen Zustand geschlossen. Seit seiner erneuten Restaurierung im Jahr 2010 dient es gelegentlich als Veranstaltungsort.',
            'abstract'         => 'Ehemaliges Jugendstil-Kino im Herzen des Nürnberger Stadtteils St. Johannis',
            'image'            => '/img/venue/venue-1.jpg'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Historisches Schürstabhaus',
            'street_address_1' => 'Albrecht-Dürer-Platz 4',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.45577',
            'longitude'        => '11.07637',
            'hashtag'          => 'Schürstabhaus',
            'description'      => 'Das ehemalige Patrizierhaus gegenüber der Sebalduskirche gilt als eines der bedeutendsten Bürgerhäuser im nordbayerischen Raum aus gotischer Zeit. Erbaut in den Jahren um 1270 blickt es auf eine lange Geschichte zurück. Seinen Namen erhält es durch die Familie Schürstab, die das Haus von 1328 bis 1478 besitzt.',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Hausbrauerei Altstadthof',
            'street_address_1' => 'Hausbrauerei & Whiskydestille',
            'street_address_2' => 'Bergstraße 19-21',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.45703',
            'longitude'        => '11.07486',
            'hashtag'          => 'Altstadthof',
            'description'      => '',
            'abstract'         => 'Biergenuss im Herzen Nürnbergs',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Stadtmuseum Fembohaus',
            'street_address_1' => 'Burgstraße 15',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.45649',
            'longitude'        => '11.07739',
            'hashtag'          => 'Fembohaus',
            'description'      => 'Nürnbergs einziges erhaltenes großes Kaufmannshaus der Spätrenaissance lädt – auf dem halben Weg zur Kaiserburg – zu einer Erlebnisreise durch die Vergangenheit Nürnbergs ein: 950 Jahre Stadtgeschichte werden durch wertvolle Originalräume, Rauminszenierungen und Hörspiele lebendig. Die Multivisionsschau "Noricama", eine aufwändig inszenierte Welt aus Bild und Ton, gibt einen guten Überblick zur Stadthistorie. Das Ausstellungsforum mit seinen wechselnden Präsentationen ist das Schaufenster zur Geschichte, Kunst und Kultur Nürnbergs.',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Museum Tucherschloss und Hirsvogelsaal',
            'street_address_1' => 'Hirschelgasse 9',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.45797',
            'longitude'        => '11.08408',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Bäckerhof',
            'street_address_1' => 'Schlehengasse 2',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.44949',
            'longitude'        => '11.06756',
            'hashtag'          => 'Bäckerhof',
            'description'      => 'Einst musste sich das feuertreibende Gewerbe außerhalb der Stadtmauern niederlassen und so siedelten sich unweit des „Weißen Turms“ die Bäcker an. So entstand auch eine Herberge für die wandernden Gesellen und eine Gaststätte für Meister Ihrer Zunft. In der Gründerzeit ließen es sich dann auch die Bäcker Nürnbergs nicht nehmen, sich ein standesgemäßes Innungsgebäude errichten zu lassen. So entstand der Bäckerhof in seiner jetzigen Form.

In der heutigen Brasserie und dem „Wohnzimmer“ befand sich die Gaststube und im ersten Stock errichteten die stolzen Eigner einen mondänen Ballsaal. Durch eine glückliche Fügung des Schicksals blieb das Haus im zweiten Weltkrieg nahezu unversehrt und so begrüßt der Bäckerhof seine Gäste noch heute im stilsicheren Antlitz einer Grande Dame der Gastfreundschaft.',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Nürnberger Rathaus',
            'street_address_1' => 'Rathausplatz 2',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.4554',
            'longitude'        => '11.07741',
            'hashtag'          => 'Rathaus',
            'description'      => 'Das Nürnberger Rathaus liegt in der Altstadt von Nürnberg, gleich östlich des Chores der Sebalduskirche. Es gehört als eine der Sehenswürdigkeiten der Stadt zur Historischen Meile Nürnbergs.',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'DATEV eG Nürnberg',
            'street_address_1' => 'Gebäude DATEV IV',
            'street_address_2' => 'Virnsberger Straße 63',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90431',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.44696',
            'longitude'        => '11.00666',
            'hashtag'          => '',
            'description'      => 'DATEV steht für qualitativ hochwertige Softwarelösungen und IT-Dienstleistungen für Steuerberater, Wirtschaftsprüfer, Rechtsanwälte und Unternehmen.

Anfahrt: Haltestelle Virnsberger Str. (Buslinie 38 und 39)
Alle Teilnehmer müssen sich bei der Rezeption melden und mit einem offiziellen Dokument (Personalausweis, Führerschein, Reisepass) ausweisen, Anmeldung erfolgt nach Eintrag in Xing-Einladung.',
            'abstract'         => '',
            'image'            => '/img/venue/venue-8.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'adidas',
            'street_address_1' => 'Adi-Dassler-Straße 1',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '91074',
            'locality'         => 'Herzogenaurach',
            'region'           => '',
            'latitude'         => '49.583033',
            'longitude'        => '10.90805',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Finca & Bar Celona Nürnberg',
            'street_address_1' => 'Vordere Insel Schütt 4',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.452778',
            'longitude'        => '11.080915',
            'hashtag'          => '',
            'description'      => 'Ganz entspannt und lecker im Celona rumkrümeln: mit Croissants und Co, Käse und Konsorten, reichhaltigem Wurst-Ensemble, Fruchtaufstrichen und vielen anderen Leckereien in der Finca & Bar Celona Nürnberg',
            'abstract'         => '',
            'image'            => '/img/venue/venue-10.jpg'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Coworking Space Nürnberg',
            'street_address_1' => 'Coworking Nürnberg GmbH',
            'street_address_2' => 'Josephsplatz 8',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '49.451677',
            'longitude'        => '11.073496',
            'hashtag'          => 'cwnue',
            'description'      => 'Coworking ist ein offener Treffpunkt und Arbeitsplatz. Ein flexibles und innovatives Konzept - Schreibtische können auf Tages- oder Monatsbasis gemietet werden und beinhalten moderne Infrastruktur mit WLAN, Netzwerk, Telefon, Drucker, Scanner, Fax, Beamer, Besprechungsraum...
Im offenen Café kommt es zum Austausch, neuen Ideen und es gibt eine ganze Menge Veranstaltungen.',
            'abstract'         => 'Der Coworking Space für die Metropolregion: Dein Büro mitten in der Nürnberger Innenstadt ab 19 € pro Tag und 149 € pro Monat!',
            'image'            => '/img/venue/venue-11.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Rio Palast Nürnberg',
            'street_address_1' => 'Fürther Straße 61',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90429',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => 'Rio Palast Kult-Kino mit besonderem Charme',
            'image'            => '/img/venue/venue-12.jpg'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'machen.de Medien und Marketing GmbH',
            'street_address_1' => 'Benno-Strauß-Straße 7',
            'street_address_2' => 'Eingang A',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90763',
            'locality'         => '',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => 'Wir glauben an die Kraft von Netzwerken und die Effizienz kreativer Werbung. Auf Papier. Im Internet. Im echten Leben.',
            'image'            => '/img/venue/venue-13.jpg'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Neues Museum Nürnberg',
            'street_address_1' => 'Eingang Klarissenplatz',
            'street_address_2' => 'Luitpoldstraße 5',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90402',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => 'Ein Museum des 21. Jahrhunderts als ein lebendiges Forum für kulturelle Erfahrungen, als ein Ort der Inspiration, der Bildung, des Austauschs und der Diskussion.
So versteht sich das Neue Museum als Stätte der Begegnung, das seinen Besuchern stetig neue Wahrnehmungserlebnisse eröffnet.

Das Neue Museum in Nürnberg ist eine bedeutende Institution im kulturellen Leben der Stadt. Mit seinem vielfältigen Kunst- und Kulturprogramm trägt es maßgeblich zum Kulturangebot in der Metropolregion Nürnberg bei.
Als Plattform für aktuelle Diskurse im Kunst- und Kulturbereich arbeitet das Neue Museum auch mit Akademie und Hochschulen der Region zusammen. Junge kreative Ansätze und das Potential neuer Ideen finden Entfaltungsraum.',
            'abstract'         => '',
            'image'            => '/img/venue/venue-14.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Artefakt',
            'street_address_1' => 'Johannesgasse 22',
            'street_address_2' => '',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90402',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => 'Café, Kneipe, Galerie',
            'abstract'         => 'Café, Kneipe, Galerie',
            'image'            => '/img/venue/venue-15.jpg'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Parks',
            'street_address_1' => 'PARKS Nürnberg',
            'street_address_2' => 'Berliner Platz 9',
            'co'               => 'im Stadtpark Nürnberg',
            'postbox'          => '',
            'postal_code'      => '90409',
            'locality'         => 'Nürnberg',
            'region'           => 'Bayern',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => 'Das Stadtparkrestaurant ist in Nürnberg eine Location mit einer langen und großen Tradition. Seit Januar 2013 zieht hier Stück für Stück neues Leben ein. Lassen Sie sich überraschen von einer aufregenden Mischung aus Café, Restaurant, Bar, Kunst, Kultur und Events.',
            'abstract'         => 'Café. Restaurant. Bar. Kunst. Kultur. Events.',
            'image'            => '/img/venue/venue-16.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Webmasters Akademie',
            'street_address_1' => 'Webmasters Akademie Nürnberg',
            'street_address_2' => 'Nordostpark 7',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90411',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => '/img/venue/venue-17.jpg'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'JOSEPHS Servicemanufaktur',
            'street_address_1' => '',
            'street_address_2' => 'Karl-Grillenberger-Straße 3',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90402',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => 'Das JOSEPHS wurde von einem Team der Fraunhofer-Arbeitsgruppe für Supply Chain Services SCS und dem Lehrstuhl Wirtschaftsinformatik1 der Friedrich-Alexander-Universität in den Jahren 2012 bis 2014 als offene Plattform entwickelt. Neugierige und interessierte Besucher sind eingeladen, mit innovativen Ideen die Dienstleistungen und Produkte der Zukunft mitzugestalten.
JOSEPHS ist ein vorerst dreijähriges Projekt und erprobt,

(1) wie Besucher in innovativer Umgebung Produkte und Dienstleistungen mitgestalten können, wie sie von passiven Konsumenten zu aktiven Mitgestaltern werden und wie sie auf diese Art selbst mitgestalten, was attraktive und lebendige Innenstädte ausmacht.

(2) wie Unternehmen in und von der Zusammenarbeit mit Kunden lernen und diese erfolgreich in die Entwicklung und den Test von Prototypen einbinden können und

(3) wie Wissenschaftler Methoden des Prototyping sowie der Produkt- und Dienstleistungsentwicklung im Feldexperiment mit Unternehmen und Kunden weiterentwickeln können.',
            'abstract'         => '',
            'image'            => '/img/venue/venue-18.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'NETZKOLLEKTIV GmbH',
            'street_address_1' => 'NETZKOLLEKTIV GmbH',
            'street_address_2' => 'Frauentormauer 18',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90402',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => '/img/venue/venue-19.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Müller Medien',
            'street_address_1' => 'Müller Medien – Müller Medien GmbH und Co. KG',
            'street_address_2' => 'Pretzfelder Str. 7-11',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90425',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'FabLab Nürnberg',
            'street_address_1' => 'FabLab Nürnberg',
            'street_address_2' => 'Muggenhofer Straße 141',
            'co'               => 'Halle 14, Auf AEG',
            'postbox'          => '',
            'postal_code'      => '90429',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => 'Ein Fablab ist genau das, was der Name sagt: ein Ort an dem gebaut (Fabrik]); aber auch getüftelt wird (Labor). Das Besondere an einem Fablab ist allerdings, dass es jeder frei benutzen kann - vom kleinen Matz bis zum gestandenen Ingenieur. Egal ob Mode oder Elektronik-Gadgets, ob Einsteigerprojekt oder Entwicklung auf professionellem Niveau, das Fablab bietet die passende Umgebung.

Auf über 200m² sind verschiedene Bereiche mit speziellen, erstaunlichen und ganz gewöhnlichen Werkzeugen und Maschinen untergebracht. Publikumslieblinge sind nach wie vor Lasercutter und 3D-Drucker.

In unserem Material-Shop könnt ihr wichtige Materialen für euer Projekt kaufen.',
            'abstract'         => '',
            'image'            => '/img/venue/venue-21.png'
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'LottaLeben Media',
            'street_address_1' => 'LottaLeben Media GmbH',
            'street_address_2' => 'Neuwieder Str. 15',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90411',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'Wirtschaftsrathaus Nürnberg',
            'street_address_1' => '',
            'street_address_2' => 'Theresienstraße 9',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90403',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => ''
        ]);
        Venue::create([
            'country_id'       => '276',
            'name'             => 'dns - digital nervous systems GmbH',
            'street_address_1' => 'Krugstr. 12',
            'street_address_2' => 'Rückgebäude, 1. Stock, rechter Eingang',
            'co'               => '',
            'postbox'          => '',
            'postal_code'      => '90419',
            'locality'         => 'Nürnberg',
            'region'           => '',
            'latitude'         => '0',
            'longitude'        => '0',
            'hashtag'          => '',
            'description'      => '',
            'abstract'         => '',
            'image'            => ''
        ]);
    }
}
