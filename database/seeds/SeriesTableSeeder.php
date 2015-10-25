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

use App\Models\Series;
use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{
    public function run()
    {
        Series::create([
            'organizer_id' => '1',
            'name' => 'border:none',
            'image' => '/img/series/series-1.png',
            'email' => 'info@border-none.net',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'https://border-none.net',
            'facebook' => '',
            'twitter' => 'border_none',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '1',
            'name' => 'Accessibility Club',
            'image' => '/img/series/series-3.png ',
            'email' => 'hello@a11y-club.org',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://accessibility-club.org',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => 'a11yclub',
            'description' => '',
            'abstract' => 'Treffen für Webentwickler & -designer zur Förderung von Barrierefreiheit im Internet und zum Austausch über assistive Technologien',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '4',
            'name' => 'Open Coffee Club',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://occnue.de/',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'www.xing.com/communities/groups/open-coffee-club-nuernberg-0fcd-1005558',
            'gplus' => '',
            'hashtag' => 'occnue',
            'description' => 'Super leckerer Cappucino und Jung-Unternehmer aus der Metropolregion Nürnberg, Fürth und Erlangen an einem Tisch!
Der Open Coffee Club Nürnberg ist ein fester Termin in der Nürnberger Webszene. Längst ist er nicht mehr nur der Vorab-Termin für das nächste Startup Weekend Nürnberg, sondern hat sich als eigenständiger Treff für Unternehmer und Freelancer aus der Metropolregion Nürnberg entwickelt.

Was ist Open Coffee Club?

In mittlerweile über 80 Städten weltweit treffen sich junge Unternehmer, Interessierte, Entwickler und Kapitalgeber regelmässig in OpenCoffee Clubs um miteinander zu diskutieren, sich auszutauschen und sich zu vernetzen.
Zentraler Aspekt sind dabei der feste Termin und der feste Ort. Es spielt keine Rolle wer an einem bestimmten Termin teilnimmt oder wieviele Teilnehmer kommen. Wichtig ist einzig, dass es einen zuverlässigen Anlaufpunkt gibt, an dem sich die Gründerszene austauscht und an dem man Gleichgesinnte treffen kann.',
            'abstract' => 'Der Open Coffee Club ist ein eigentsändiger Treff bei leckerem Frühstück für Unternehmer, Startups und Freelancer aus der Metropolregion Nürnberg.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '4',
            'name' => 'CMS Night',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://cmsnue.de/',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'www.xing.com/events/6-cms-night-nurnberg-1442297?sc_o=as_e',
            'gplus' => '',
            'hashtag' => 'cmsnue',
            'description' => 'An diesem Abend möchten wir gerne die beliebten Systeme Joomla!, TYPO3, Drupal und Wordpress miteinander vergleichen, unterschiedliche Einsatzmöglichkeiten aufzeigen, zusammen darüber diskutieren und in Kurz-Vorträgen vorstellen.

Willkommen ist jeder Interessierte, Designer, Entwickler, Nutzer, Administrator oder Entscheider.',
            'abstract' => 'Es gibt inzwischen unzählige Open Source Content Management Systeme auf dem Markt. Die CMS Night ist eine gemeinsame Veranstaltung der Nutzer verschiedener CMS Systeme aus der Metropolregion Nürnberg.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '5',
            'name' => 'Social Media Night',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'www.xing.com/communities/groups/social-media-breakfast-nuernberg-0fcd-1065111',
            'gplus' => '',
            'hashtag' => '',
            'description' => '',
            'abstract' => 'Bei der Social Media Night treffen sich Social Media Worker aller Richtung zu Austausch und Networking in gemütlicher Runde. Ergänzt wird das Programm durch Vorträge, Panels und Interviews.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '6',
            'name' => 'MobileFirst! Night',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => '',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '8',
            'name' => 'Wordpress Meetup',
            'image' => '/img/series/series-16.jpg',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://wpmeetup-franken.de/',
            'facebook' => '',
            'twitter' => 'WPMeetupFranken',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Das Wordpress Meetup Franken ist eine Usergroup, die sich mit dem Content Management System "Wordpress" beschäftigt. Einsteiger und Fortgeschrittene sind herzlich eingeladen, sich mit Gleichgesinnten über die aktuellsten Neuigkeiten auszutauschen und ihre Erfahrungen miteinander zu teilen.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '2',
            'name' => 'Pecha Kucha',
            'image' => '/img/series/series-18.jpg',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://pecha-kucha-nuernberg.de/',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Pecha Kucha (sprich: petscha-kutscha, jap. ペチャクチャ “wirres Geplauder, Stimmengewirr”) ist eine Vortragstechnik, bei der zu einem mündlichen Vortrag passende Bilder (Folien) an eine Wand projiziert werden. Die Anzahl der Bilder ist dabei mit 20 Stück ebenso vorgegeben wie die 20-sekündige Dauer der Projektionszeit je Bild. Die Gesamtdauer des Vortrags beträgt damit 6 Minuten 40 Sekunden. In Pecha Kucha Nights (PKN) folgen mehrere dieser Vorträge hintereinander. Die Themen liegen meist im Bereich Design, Kunst, Mode und Architektur. - See more at: http://www.nuernberg-startups.de/uebersicht-ueber-die-it-internetszene-in-der-metropolregion-nuernberg/#.U_8JWbx_tZw',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Series::create([
            'organizer_id' => '10',
            'name' => 'Agile Monday',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'www.xing.com/communities/groups/agile-monday-nuernberg-62c0-1026729',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Hier liegt der Schwerpunkt besonders auf der agilen Software-Entwicklung. Das Ziel ist, nicht an einem steifen Plan festzuhalten, sondern seine Vorgehensweisen der vorangeschrittenen Entwicklung anzupassen, um am Ende zu bekommen, was man auch braucht. Dies soll möglichst dynamisch und ohne oder nur mit wenig bürokratischem Aufwand vorangehen. Die Ideen hinter agiler Entwicklung sind klar umrissen: Menschen und gemeinsames Arbeiten kommen vor theoretischen Abläufen und Prozessen, funktionierende Software hat Vorrang vor umfassender Dokumentation, konstruktive Zusammenarbeit mit Kunden hat mehr Gewicht als Vertragsverhandlungen und flexibler Umgang mit veränderten Anforderungen ist wichtiger als Festhalten an einem Plan. Diese Gruppe soll dem Informationsaustausch rund um den Stammtisch über alle agilen Themen (Scrum, Extreme Programming, Crystal etc.) in der Region Nürnberg dienen.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
    }
}

