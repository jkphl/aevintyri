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

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionTableSeeder extends Seeder
{
    public function run()
    {
        Session::create([
            'day_id' => '3',
            'room_id' => '7',
            'name' => 'Assistive Technologien Hands-On',
            'level' => '1',
            'requirements' => 'Es können eigene Projekte zur Prüfung herangezogen werden',
            'start_time' => '11:00:00',
            'end_time' => '13:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '3',
            'room_id' => '7',
            'name' => 'Easy Checks — Accessibility-Basics prüfen',
            'level' => '2',
            'requirements' => '',
            'start_time' => '10:00:00',
            'end_time' => '10:45:00',
            'hashtag' => '',
            'description' => 'Die Session geht auf Aspekte der Barrierefreiheit ein, die mit geringem Aufwand und wenigen kostenlosen Prüftools – größtenteils sogar mit Bordmitteln – schnell geprüft werden können und gleichzeitig als Gradmesser für die Qualität von Webangeboten dienen können. Schwerpunkte der Session sind Kontrastverhältnisse, Strukturierung, Benutzbarkeit mit eigenen Farbeinstellungen und die Tastaturbedienbarkeit. Anhand konkreter Beispiele werden dabei sowohl HTML-Seiten als auch PDF-Dateien thematisiert.',
            'abstract' => 'Einfache und praxisnahe Tests zur groben Einordnung der Barrierefreiheit von Webangeboten',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '3',
            'room_id' => '7',
            'name' => 'Zugängliche Formulare',
            'level' => '2',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '09:45:00',
            'hashtag' => '',
            'description' => 'In seiner Session zeigt Marco Zehe, wie man mit einfachen Bordmitteln Formulare so verbessern kann, dass nicht nur eine eindeutige Zuordnung zwischen dem stattfindet, was abgefragt wird, und dem, wohin die Antwort zu platzieren ist, sondern auch freundlichere Touch-Targets erzeugt werden und dynamische Fehlerabfragen das Ausfüllen erleichtern. Anhand von Live-Beispielen werden die direkten Auswirkungen der Änderungen seh- und hörbar gemacht.',
            'abstract' => 'Barrierefreundliche Formulare — Tipps & Tricks für den Entwickleralltag',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'Begrüßung & Vorstellungsrunde',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '19:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Kurze Begrüßung und Vorstellungsrunde',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'Begrüßung durch den Gastgeber',
            'level' => '1',
            'requirements' => '',
            'start_time' => '20:00:00',
            'end_time' => '20:30:00',
            'hashtag' => '',
            'description' => 'Begrüßung durch den Gastgeber und Dr. Michael Fraas, Wirtschaftsreferent der Stadt Nürnberg (wurde angefragt, Zusage oder Absage steht noch aus)',
            'abstract' => 'Begrüßung durch den Gastgeber und Dr. Michael Fraas',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'Und nun auch noch intern?! Social Media im Unternehmenseinsatz',
            'level' => '1',
            'requirements' => '',
            'start_time' => '20:30:00',
            'end_time' => '21:15:00',
            'hashtag' => '',
            'description' => 'Session von DATEV:  “Und nun auch noch intern?! Social Media im Unternehmenseinsatz”',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'Industrie 4.0',
            'level' => '1',
            'requirements' => '',
            'start_time' => '21:15:00',
            'end_time' => '21:45:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Industrie 4.0',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'CheckMyBus',
            'level' => '1',
            'requirements' => '',
            'start_time' => '21:45:00',
            'end_time' => '22:15:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'CheckMyBus',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'Startup Session',
            'level' => '1',
            'requirements' => '',
            'start_time' => '22:15:00',
            'end_time' => '22:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Startup Session mit dem aktuellen Stand von: myOma, streetspotr und unicoach',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '4',
            'room_id' => '8',
            'name' => 'Ideenpitch und Veranstaltungshinweise',
            'level' => '1',
            'requirements' => '',
            'start_time' => '22:30:00',
            'end_time' => '22:45:00',
            'hashtag' => '',
            'description' => 'Unter anderem mit:

Alexander Hektor - foodtrack.de
Markus Römer - Dress and Friends',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '6',
            'room_id' => '10',
            'name' => 'Frühstück & Networking',
            'level' => '1',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '12:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '7',
            'room_id' => '11',
            'name' => 'Ankommen',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '19:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Reinkommen, Space kennenlernen und kurze Vorstellung der Anwesenden',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '7',
            'room_id' => '11',
            'name' => 'Impulsvortrag / News / Showcase',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:30:00',
            'end_time' => '20:15:00',
            'hashtag' => '',
            'description' => 'Hier ist Platz für alles was ihr unbedingt loswerden wollt.

*5min Impulsvortrag
*News zu Content Management Systemen
*Showcase von aktuellen Projekten die euch am Herzen liegen',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '7',
            'room_id' => '11',
            'name' => '»My Home is my Castle«',
            'level' => '2',
            'requirements' => '',
            'start_time' => '20:15:00',
            'end_time' => '21:30:00',
            'hashtag' => '',
            'description' => '»Hardening/Absichern einer WP-Installation« Was machen die anderen CMS-Plattformen im Vergleich? Ähnlichkeiten? Wo gibt\'s Angriffsvektoren, wie arbeitet man gegen welche Angriffsszenarien, etc.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '7',
            'room_id' => '11',
            'name' => 'Networking',
            'level' => '1',
            'requirements' => '',
            'start_time' => '21:30:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Jeder mit jedem - quatschen.',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '5',
            'room_id' => '9',
            'name' => 'Vortrag',
            'level' => '2',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '20:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '5',
            'room_id' => '9',
            'name' => 'Networking',
            'level' => '1',
            'requirements' => '',
            'start_time' => '20:30:00',
            'end_time' => '22:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '9',
            'room_id' => '14',
            'name' => 'MobileFirst! Night',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '10',
            'room_id' => '15',
            'name' => 'Machbar machen!',
            'level' => '1',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '11',
            'room_id' => '24',
            'name' => 'Wordpress Meetup',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '12',
            'room_id' => '16',
            'name' => 'Ankommen & Networking',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:30:00',
            'end_time' => '20:20:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '12',
            'room_id' => '16',
            'name' => 'Beginn der Vorträge',
            'level' => '1',
            'requirements' => '',
            'start_time' => '20:20:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '13',
            'room_id' => '17',
            'name' => 'Iron Blogger Franken Treffen',
            'level' => '1',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '22:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '14',
            'room_id' => '11',
            'name' => 'Agile Monday',
            'level' => '2',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'tba',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'B2C: Marke bzw. Hersteller vs. Handel.',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'B2C: Marke bzw. Hersteller vs. Handel.',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'B2B Online-Vertrieb ist unmöglich!?',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'Die Zukunft des E-Commerce ist... Multichannel!',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'Beacons: E-Commerce erobert die Filialen.',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '15',
            'room_id' => '18',
            'name' => 'Moderation',
            'level' => '1',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '16',
            'room_id' => '11',
            'name' => 'OpenUp Meetup',
            'level' => '2',
            'requirements' => '',
            'start_time' => '14:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '17',
            'room_id' => '11',
            'name' => 'Barcamp Night',
            'level' => '1',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '18',
            'room_id' => '19',
            'name' => 'Espress Code Retreat',
            'level' => '3',
            'requirements' => 'Bring bitte ein Notebook mit lauffähiger Programmierumgebung und Testframework mit.',
            'start_time' => '19:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '19',
            'room_id' => '20',
            'name' => 'WERBEBOTSCHAFT bewegt!',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '19:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '20',
            'room_id' => '18',
            'name' => 'WebInsights Confernece',
            'level' => '3',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '21',
            'room_id' => '21',
            'name' => 'Vorteile beim Einsatz von Magento',
            'level' => '2',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '20:00:00',
            'hashtag' => '',
            'description' => 'Dominik Krebs, der die technische Leitung bei NETZKOLLEKTIV verantwortet, wird über die Möglichkeiten und Vorteile beim Einsatz von Magento für individuelle Vertriebsplattformen berichten.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '21',
            'room_id' => '21',
            'name' => 'Nearbees.de – Die Bienen aus deiner Nachbarschaft',
            'level' => '2',
            'requirements' => '',
            'start_time' => '20:00:00',
            'end_time' => '21:00:00',
            'hashtag' => '',
            'description' => 'Michael Gelhaus, Mitgründer der Plattform www.nearbees.de, über die Imker ihren Honig zum Verkauf anbieten können, wird über die Idee sowie die Plattform berichten. Diese wurde von NETZKOLLEKTIV auf Magento-Basis umgesetzt.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '22',
            'room_id' => '22',
            'name' => 'Google: Mobile Boom',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '19:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '23',
            'room_id' => '22',
            'name' => 'Google AdWords',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '19:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '24',
            'room_id' => '22',
            'name' => 'Facebook: Social Media',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '19:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '25',
            'room_id' => '23',
            'name' => 'Einlass & Networking',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '19:15:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Ankommen & Networking',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '25',
            'room_id' => '23',
            'name' => 'Start des Ignite Contest – Schuhe selber erstellen',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:15:00',
            'end_time' => '20:45:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '25',
            'room_id' => '23',
            'name' => 'Vorstellung der Ergebnisse & Wahl des Siegers in der Rubrik Schönheit',
            'level' => '1',
            'requirements' => '',
            'start_time' => '20:45:00',
            'end_time' => '20:45:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '25',
            'room_id' => '23',
            'name' => 'Ignite Talks',
            'level' => '1',
            'requirements' => '',
            'start_time' => '21:15:00',
            'end_time' => '22:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '26',
            'room_id' => '16',
            'name' => 'Creative Monday',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '27',
            'room_id' => '11',
            'name' => 'Ankunft, Networking, Team-Building, etc.',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '27',
            'room_id' => '11',
            'name' => 'Kurze Präsentation zur App-Entwicklung auf der Microsoft Plattform',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '18:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '27',
            'room_id' => '11',
            'name' => 'Hackathon – im Team oder alleine',
            'level' => '3',
            'requirements' => 'Laptop mit Windows 8 und Visual Studio 2013,  ggf. Windows Phone SDK (wir haben auch alle Tools dabei, falls Du sie noch nicht installiert hast); Dein Interesse am Internet-Of-Things und an der App-Entwicklung; Dein Wissen zu HTML5/JS-Background oder .NET/Silverlight/XAML/C#',
            'start_time' => '18:30:00',
            'end_time' => '23:59:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '28',
            'room_id' => '11',
            'name' => 'Hackathon – im Team oder alleine',
            'level' => '3',
            'requirements' => 'Laptop mit Windows 8 und Visual Studio 2013,  ggf. Windows Phone SDK (wir haben auch alle Tools dabei, falls Du sie noch nicht installiert hast); Dein Interesse am Internet-Of-Things und an der App-Entwicklung; Dein Wissen zu HTML5/JS-Background oder .NET/Silverlight/XAML/C#',
            'start_time' => '00:01:00',
            'end_time' => '05:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '28',
            'room_id' => '11',
            'name' => 'Abschlusspräsentation der entwickelten Apps',
            'level' => '3',
            'requirements' => '',
            'start_time' => '05:00:00',
            'end_time' => '06:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '29',
            'room_id' => '20',
            'name' => '1. Treffen der Gamification-Szene Frankens',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '22:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '8',
            'room_id' => '11',
            'name' => 'Social Media Night',
            'level' => '2',
            'requirements' => '',
            'start_time' => '18:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '31',
            'room_id' => '25',
            'name' => 'Crowdfunding Workshop',
            'level' => '2',
            'requirements' => '',
            'start_time' => '14:00:00',
            'end_time' => '17:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '33',
            'room_id' => '1',
            'name' => 'Erfolgreich Crowdfunden!',
            'level' => '1',
            'requirements' => '',
            'start_time' => '19:00:00',
            'end_time' => '23:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '35',
            'room_id' => '26',
            'name' => 'Nutze den Tinder-Effect: „Wisch und Weg“-Technologie anhand von drei nicht ganz ernst gemeinte StartUp-Ideen illustriert',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '18:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '35',
            'room_id' => '26',
            'name' => 'Get Your ducks in a row',
            'level' => '1',
            'requirements' => '',
            'start_time' => '18:30:00',
            'end_time' => '20:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Die Online Marketing Fitness Analyse ist die Basis für die Effektivitäts- und Effizienzsteigerung während Ihrer digitalen Transformation',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '1',
            'room_id' => '1',
            'name' => 'In the DOM, no one will hear you scream (Talk)',
            'level' => '3',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => 'This talk is about the DOM and its more twilight areas. We\'ll have a look at the weird parts and talk about where and why this might be security critical and affect your precious online applications, browser extensions or packaged apps. To understand the foundations of what the DOM has become by today, we\'ll further explore the historical parts — who created the DOM, what was the intention and how fought dirty about it during the browser wars.

Finally, we\'ll see a DOM based attack called DOM Clobbering. An attack, that is everything but obvious and affected a very popular and commonly used Rich Text Editor. Be prepared for a lot of tech-talk as well as fear and loathing in the browser window. But don\'t shed no tears, there\'s a tool that fixes the security crazy for you and this talk will present it.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '1',
            'room_id' => '1',
            'name' => 'Back to the Web (Talk)',
            'level' => '2',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => 'In the beginning, the Web was a simple thing. A bit of HTML, running on a server you probably had root access to, and maybe even had running under your desk. Fast forward 20 years, and most of the Web\'s content resides in silos, like Twitter, Facebook and Instagram.

Our siloed experience of the Web poses huge challenges for the longevity, integrity, and ultimately ownership of the content we create. Aaron Parecki will talk about data ownership, identity and the IndieWeb, a movement that is about taking back ownership of one’s own identity and data through Microformats, IndieAuth, Webmention and more.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '1',
            'room_id' => '1',
            'name' => 'Breaking News: The otherizing effect of digital content curation (Talk)',
            'level' => '2',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => 'Social, political, and geographic compartmentation occurs on the Internet both organically and inorganically. While the Internet has immense potential to erase borders, a user\'s personal networks are often limited to people that user already knows, or people similar to her. This occurs as a result of conscious and unconscious personal decisions and the efforts of corporations to personalize the Internet on a per user basis. Such a level of content curation crafts an Internet to reinforce one\'s thoughts and biases, and push us all further apart.

The unique properties of the Internet can be leveraged against this human tendency to otherize, and the combination of art and technology play an important role in that endeavor.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '1',
            'room_id' => '1',
            'name' => 'Indie Design (Talk)',
            'level' => '1',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => 'The decentralisation of the web is impossible for products whose business models are based on the retention, and exploitation, of their users\' data. We need to create alternatives with sustainable business models that can survive in a decentralised world. Whilst it might be easier to make money from users’ data, we must operate on a more ethical basis in order to create genuine alternatives.

Considerate design and user experience is vital to making alternatives to the current mainstream tech. We don’t want our alternatives to only be available to a geek elite. Accessibility and diversity will make us design better solutions, and help new tech spread beyond enthusiasts. Accessible sharing and educating will also help us promote sustainable practices in our industries and communities.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Opening "E-Entrepreneurship Flying Circus"',
            'level' => '1',
            'requirements' => '',
            'start_time' => '10:00:00',
            'end_time' => '10:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '37',
            'room_id' => '20',
            'name' => 'Opening "E-Entrepreneurship Flying Circus"',
            'level' => '1',
            'requirements' => '',
            'start_time' => '10:00:00',
            'end_time' => '10:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Vorstellung "Gründerlehre/-förderung vor Ort"',
            'level' => '1',
            'requirements' => '',
            'start_time' => '10:30:00',
            'end_time' => '11:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Podium "Digitale Weltmarktführer aus Deutschland?!?" (Big Picture)',
            'level' => '1',
            'requirements' => '',
            'start_time' => '11:00:00',
            'end_time' => '12:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Vorlesung "Was ist E-Entrepreneurship?"',
            'level' => '1',
            'requirements' => '',
            'start_time' => '14:00:00',
            'end_time' => '14:45:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Q&A "E-Entrepreneurship als Lehrfach?!"',
            'level' => '1',
            'requirements' => '',
            'start_time' => '14:45:00',
            'end_time' => '15:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Meetup "Digitale Startups vor Ort"',
            'level' => '1',
            'requirements' => '',
            'start_time' => '15:00:00',
            'end_time' => '16:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Podium "Chancen für digitale Startups vor Ort" (Local Picture)',
            'level' => '1',
            'requirements' => '',
            'start_time' => '16:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '36',
            'room_id' => '20',
            'name' => 'Get Together',
            'level' => '1',
            'requirements' => '',
            'start_time' => '17:00:00',
            'end_time' => '18:30:00',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '1',
            'room_id' => '1',
            'name' => 'Open Source Design needs Collaboration (Talk)',
            'level' => '1',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => 'Dezentralization often means, that more and more functionality is sourced into the client. And the client needs to learn to do more and more on its own, without the help of its «big brother», the server. That includes security — and security on the client is hard and different from what we know.

This talk is about the DOM and its more twilight areas. We\'ll have a look at the weird parts and talk about where and why this might be security critical and affect your precious online applications, browser extensions or packaged apps. To understand the foundations of what the DOM has become by today, we\'ll further explore the historical parts — who created the DOM, what was the intention and how fought dirty about it during the browser wars.

Finally, we\'ll see a DOM based attack called DOM Clobbering. An attack, that is everything but obvious and affected a very popular and commonly used Rich Text Editor. Be prepared for a lot of tech-talk as well as fear and loathing in the browser window. But don\'t shed no tears, there\'s a tool that fixes the security crazy for you and this talk will present it.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '2',
            'room_id' => '1',
            'name' => 'In the DOM, no one will hear you scream (Creator Unit)',
            'level' => '3',
            'requirements' => 'Laptop, 1 or 2 browsers',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => 'So, security in the DOM, what is this and what are the risks? The creator unit will cover this topic, shed bright light on HTML5, SVG, the DOM, ES5 and ES6, AngularJS and co. and all the new things in our browsers and web apps that make us do more with less code.

If you are a programmer working on modern web apps, a security person eager to break what\'s hot and new or simply a person with an interest in what breaking and fixing modern web applications looks this session might be for you. But be aware, there\'s lots and lots of code and tech-talk in here.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '2',
            'room_id' => '1',
            'name' => 'Back to the Web (Creator Unit)',
            'level' => '2',
            'requirements' => 'You should come to the workshop with an existing website, or at least an existing domain name. Some familiarity with HTML is required, and you should be comfortable writing code in a language of your choosing. No particular programming language or environment is required, as long as you are familiar with it.',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => 'This creator unit will help you learn about ways to empower yourself to own your data, create and publish content on your own site, and only optionally syndicate to third-party silos. You will be guided through taking your existing website and adding just enough so that you can join IndieWeb conversations.

Topics covered will be:

*   IndieAuth
*   Microformats
*   Webmention
*   Syndication / POSSE
*   Receiving replies from syndicated posts

By the end of the creator unit, you will be able to write a post on your own website and have it show up as a comment on someone else\'s post in real time.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '2',
            'room_id' => '1',
            'name' => 'Breaking News: The otherizing effect of digital content curation (Creator Unit)',
            'level' => '1',
            'requirements' => 'Curtis\' current plan is to involve some use of Instagram and/or Twitter in the creator unit.',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => 'With a general focus on exploring the possibility of images to connect across cultures, the creator unit team will collaborate in a guided lightning brainstorming session and then go out into the city to actually make artworks. No prior artistic experience necessary! The idea is to develop a collaborative art project that will extend outside the border:none conference.',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '2',
            'room_id' => '1',
            'name' => 'Time (Creator Unit)',
            'level' => '2',
            'requirements' => 'You should have an own website (or plan to have one)',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => 'Got a website? Great! Let\'s see if we can make some small tweaks so that you can use your own site to publish out to social networks (and receive responses back from those networks). Be part of the indie web!',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '1',
            'room_id' => '1',
            'name' => 'Time (Talk)',
            'level' => '1',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'hashtag' => '',
            'description' => 'This thing all things devours:
Birds, beasts, trees, flowers;
Gnaws iron, bites steel;
Grinds hard stones to meal;
Slays king, ruins town,
And beats high mountain down',
            'abstract' => '',
            'image' => ''
        ]);
        Session::create([
            'day_id' => '2',
            'room_id' => '1',
            'name' => 'Indie Design (Creator Unit)',
            'level' => '1',
            'requirements' => '',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'hashtag' => '',
            'description' => 'Using the [ind.ie manifesto](https://ind.ie/manifesto) for a basis, we\'ll discuss the impact that independence, sustainability, diversity and leading with design have on our current and future projects. After introducing ourselves, and the projects that we\'re working on, we\'ll consider how the goals of beautiful, free, social, accessible, secure, and distributed products could affect our working practices.

Following the discussions, we\'ll move on to a practical design session, breaking into smaller groups. Each group will take on a project focusing on the redesign of a sustainable alternative to a product that exists in the mainstream. In our groups, we\'ll design the product at a high-level, making business, design and development decisions in line with decentralised, ethical and sustainable practices.',
            'abstract' => '',
            'image' => ''
        ]);
    }
}

