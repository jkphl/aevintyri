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

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'organizer_id' => '1',
            'series_id' => '1',
            'name' => 'border:none 2014',
            'image' => '/img/event/event-2.png',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'https://border-none.net/2014',
            'facebook' => '',
            'twitter' => 'border_none',
            'xing' => '',
            'gplus' => '',
            'hashtag' => 'bono14',
            'description' => 'Als erste **Kreativkonferenz** widmet sich die border:none 2014 dem Thema **Dezentralisierung des Internet** und begibt sich — angeführt von 7 internationalen Vordenkern unterschiedlichster persönlicher und beruflicher Hintergründe — auf die Suche nach Alternativen zu den übermächtig wirkenden, zentralisierten Strukturen und Angeboten von Google, Facebook & Co.

Am **ersten Konferenztag** werben die Sprecher mit einem inspirierenden Vortrag für ihre Sichtweise auf die Dinge. Am Folgetag übernehmen sie jeweils die Leitung eines **»Creator Units«** und vertiefen mit kleineren Teilnehmergruppen die individuellen Themenfacetten. Ziel ist es, im Team die Inspiration des Vortags in Ergebnisse zu übersetzen, die auch über die Konferenz hinaus Wirkung zeigen.

Wie bereits 2013 werden sämtliche Vorträge in **englischer Sprache** gehalten, und auch das **Orpheum-Lichtspielhaus** bleibt als Veranstaltungsort für den ersten Konferenztag derselbe. Die »Creator Units« verteilen sich auf insgesamt **fünf außergewöhnliche Orte** innerhalb der Nürnberger Stadtmauern. Mit ihrem neuartigen Format begibt sich die border:none auf unbekanntes Terrain uns versucht gerade eben nicht, nur die typischen Konferenzgänger anzusprechen.',
            'abstract' => 'Creator Conference for The Rising Web',
            'facebook_event' => 'www.facebook.com/events/267565300117964/',
            'xing_event' => 'www.xing.com/events/border-none-2014-1436023',
            'gplus_event' => 'plus.google.com/b/103389319737184133956/events/chekl9vf564ebora0d4jaul5r5s',
            'tickets' => '',
            'lanyrd' => ''
        ]);
        Event::create([
            'organizer_id' => '1',
            'series_id' => '3',
            'name' => 'Accessibility Club #2',
            'image' => '/img/event/event-4.png',
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
            'description' => 'Auch die zweite Auflage des Accessibility Club verfolgt das Ziel, Webworker auf Tuchfühlung mit Barrierefreiheitstechniken und assistiven Technologien zu bringen und damit die Zugänglichkeit im Web zu fördern. Sie gliedert sich in einen Vortrags- und einen Hands-On-Teil und findet als erste Veranstaltung der Nürnberg Web Week 2014 im zentral gelegenen Schönen Saal des Nürnberger Rathauses statt.

Beginnen wird [Marco Zehe](http://www.zehe-edv.de) mit einem Vortrag über **Zugängliche Formulare**, gefolgt von [Kerstin Probiesch](http://www.barrierefreie-informationskultur.de) und ihrem Thema **Easy Checks — Accessibility-Basics prüfen**.

Im Anschluss besteht die Möglichkeit, einzelne Themenaspekte in kleineren Gesprächsgruppen zu erörtern, die von den beiden Referenten sowie weiteren Spezialisten für assistive Technologien geführt werden. Ziel dieses zweiten Teils ist es insbesondere, Webdesigner und -entwickler in persönlichen Kontakt mit assistiven Technologien zu bringen und ihnen einen grundlegenden Einstieg in den Umgang zu bieten.',
            'abstract' => 'Treffen für Webentwickler & -designer zur Förderung von Barrierefreiheit im Internet und zum Austausch über assistive Technologien',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '2',
            'series_id' => null,
            'name' => 'Webmontag',
            'image' => '/img/event/event-5.jpeg',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://www.nuernberg-startups.de/2014/08/17/webmontag-am-13-10-2014-in-nuernberg-bei-der-datev/#.U_yT8bx_tZy',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'www.xing.com/communities/groups/webmontag-franken-0fcd-1005553',
            'gplus' => '',
            'hashtag' => 'wmnue',
            'description' => 'Was ist der Web Montag?

Web Montag ist ein informelles, nicht-kommerzielles, dezentral organisiertes Treffen, das zum Ziel hat, all diejenigen miteinander zu verbinden, die die Zukunft des Internet gestalten. Inspiriert von der Kultur Silicon Valleys startete der Web Montag gegen Ende 2005 in Köln als Versuch, ein bisschen “kalifornischen Sonnenschein” nach Deutschland zu bringen.

Seitdem hat sich der Web Montag schnell weiterverbreitet: Treffen finden mittlerweile in mehr als 40 Städten überall in Deutschland und Österreich, in Schweden, Silicon Valley statt. Als Treffpunkt und Anlaufstelle der verschiedenen lokalen Web 2.0- und Startup-Szenen hat der Web Montag mit seinen bisher 100+ Veranstaltungen bereits 1.000+ Teilnehmer angezogen, mit teils sehr erfreulichen Auswirkungen.

Alle, die mit Web 2.0 und benachbarten Themen zu tun haben und interessiert daran sind, ihr Wissen zu teilen und sich miteinander auszutauschen, sind herzlich willkommen. Ob Erfinder, Ingenieur, Designer, Gründer oder Finanzier – Web Montag ist die Gelegenheit, sein neues Produkt, Service, Startup, oder die nächste große Idee einem stetig wachsenden Publikum von Webbegeisterten vorzustellen.',
            'abstract' => 'Der Webmontag bringt Anwender, Entwickler, Gründer, Unternehmer, Venture Capitalists, Forscher, Web-Pioniere, Blogger, Podcaster, Designer und sonstige Interessenten zum Thema Web 2.0 (im weitesten Sinne) zusammen.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '3',
            'series_id' => null,
            'name' => 'Produktmanagement und Open Innovation Stammtisch',
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
            'description' => 'Produktmanagement meets Open Innovation. Auch dieses Mal wieder im Rahmen der Nürnberg Web Week. Ziel und Anlass des Stammtisches ist der Austausch von Best Practices und Erfolgsfaktoren beim Einsatz von Open Innovation Methoden sowie der Abbau von Barrieren und Vorbehalten. Dazu gibt es spannende Impulsvorträge. Mehr Infos gibt es in der Xing Gruppe des Open Innovation Forums und des Produktmanagement Stammtisches.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '4',
            'series_id' => '7',
            'name' => 'Open Coffee Club',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://www.occnue.de',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'www.xing.com/communities/groups/open-coffee-club-nuernberg-0fcd-1005558',
            'gplus' => '',
            'hashtag' => 'occnue',
            'description' => '',
            'abstract' => 'Der Open Coffee Club ist ein eigentsändiger Treff bei leckerem Frühstück für Unternehmer, Startups und Freelancer aus der Metropolregion Nürnberg.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '4',
            'series_id' => '9',
            'name' => '6. CMS Night Nürnberg',
            'image' => '/img/event/event-10.jpg',
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
            'description' => 'Die 6. Content Management System Night findet am 15. Oktober 2014 im Coworking Space Nürnberg im Rahmen der 3. Nürnberg Web Week 2014 statt. Wir starten ganz gemütlich ab 19h und planen bis ca. 23h fest mit eurer Anwesendheit!

Im Rahmen der Nürnberg WebWeek fand am 23.10.2012 die erste Content Management System Night statt.

Zielgruppe für die 6. CMS Night sind ALLE CMS Interessierten vom Anfänger bis Fortgeschrittenen und auch Profis kommen auf Ihre Kosten.',
            'abstract' => 'Es gibt inzwischen unzählige Open Source Content Management Systeme auf dem Markt. Die CMS Night ist eine gemeinsame Veranstaltung der Nutzer verschiedener CMS Systeme aus der Metropolregion Nürnberg.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '5',
            'series_id' => '11',
            'name' => 'Social Media Night',
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
            'description' => '„Social Media sozial: Wie positionieren sich gemeinnützige Einrichtungen im Web 2.0?“

Bei der Social Media Night treffen sich am Abend des 16.10.2014 lokale Player der Social Media-Szene zu Austausch und Networking in entspannter Runde im Coworking Space Nürnberg.

Es gibt Vorträge, Panels und Interviews - immer mit der Möglichkeit, sich als Gast in die Diskussion einzubringen. In diesem Jahr legt die Social Media Night einen Schwerpunkt auf das Thema „Gemeinnützigkeit“: Wir gehen der Frage nach, ob und wie Behörden und öffentliche Einrichtungen (wie Bibliotheken oder Tierheime) bislang eigentlich Facebook & Co. nutzen - und was der moderne, digitalaffine Bürger diesbezüglich heute von ihnen erwartet. Hierzu haben wir spannende Gäste eingeladen, die mit ganz verschiedenen Ideen und Ansätzen soziale Medien erfolgreich nutzen. Demgegenüber stehen erfolgreiche Unternehmen aus der Metropolregion, die an diesem Abend ebenfalls ihre Social Media-Konzepte und -Erfolge vorstellen und Praxistipps geben.

Präsentiert und moderiert wird die Social Media Night 2015 vom Team der Social Media-Sprechstunde (SMS) Nürnberg - einer ehrenamtlichen Initiative dreier lokaler Web 2.0-Experten, die alle paar Wochen einen Abend lang kostenlos Vereine, Privatpersonen und Unternehmen in allen Fragen rund um Social Media beraten. Auch hierüber könnt Ihr bei    der Social Media Night mehr erfahren.

Wir freuen uns auf Euch!

Für das leibliche Wohl in Form von Catering ist gesorgt (Getränke: Selbstzahler).


(Bisheriges) Line-Up:

„Amt 2.0    - Sind Behörden und das Social Web noch Fremde oder schon Freunde?“
Johannes    Barthel, Stadt Nürnberg
Christiane Germann, Bundesamt für Migration und Flüchtlinge (BAMF)
N.N., Stadtbibliothek Erlangen

„Ein Heim    für Tiere - und für 30.000 Facebook Fans! Erfolgsrezepte einer sozialen Einrichtung“
Marcus König, Tierheim Nürnberg

Moderation: Christiane Germann, Danir Bouchekir, Johannes Barthel (SMS Nürnberg)

Die weiteren Referenten und Speaker/innen werden in den kommenden Wochen an dieser Stelle bekannt gegeben. Stay tuned!',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '6',
            'series_id' => null,
            'name' => 'MobileFirst! Night',
            'image' => '/img/event/event-14.jpg',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'https://www.inserteffect.com/unternehmen/events/mobile-first-night-2014',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Welche Technik-Trends die heute aufkommen, haben das Potential, unser Leben von Morgen zu bestimmen? Wearables, Faltbare Displays, The Internet of Things, Big Data, Mobile Wallets, Instant Translation oder selbstfahrende Autos? Oder kommt alles ganz anders und Offline wird das neue Online?

Zusammen mit Ihnen schauen wir in die Glaskugel. Sehen Technologien und Szenarien. Hören Konzepte und Visionen. Sprechen über Utopisches und Mögliches.

Die dritte MobileFirst! Night wird ein entspannter Abend mit spannenden Vorträgen, unter anderem von Heike Scholz von mobile zeitgeist. Im Retro-Ambiente des Nürnberger Stadtteilkinos Rio-Palast gibt es viel Gelegenheit zum Austausch mit anderen Vordenkern aus der Region. insertEFFECT lädt Sie ein: Bei leckerem Essen, Getränken und Musik bis in den Abend.

Die MobileFirst! Night wird von insertEFFECT veranstaltet.',
            'abstract' => 'MobileFirst! Night – Future Buzzwords',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '7',
            'series_id' => null,
            'name' => 'Machbar machen!',
            'image' => '/img/event/event-15.jpg',
            'email' => 'kontakt@machen.de',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Mitarbeiter und Netzwerk-Partner von machen.de sowie die Wirtschaftsjunioren Fürth geben eine realistische Einschätzung deiner Idee sowie Tipps für deine Marketingaktivitäten und vermitteln Kontakte zu Förderern und Partnern. Mit Guerilla-Marketing-Experte Stefan Frisch, sowie Buisnessplan- und Finanzexperte Jan Steinbauer und IT-Profi Ronald Hawelka gibt es eine eindeutige Antwort auf die Frage: „Ist meine Idee machbar?“
Der Austausch findet nach einem Sektempfang durch die Wirtschaftsjunioren an der 10 Meter langen Kreativinsel der Fürther Werbeagentur, der Machbar, statt. Bei Fingerfood, Donuts der Donutfactory und regionalem Bier von Tucher heißt es in lockerer Runde Ideen spinnen, querdenken und die nächsten Schritte in Richtung Ziel machen.

Anmeldung erforderlich. Bitte bis 10.10.2014 eine kurze E-Mail an kontakt@machen.de oder bei der Veranstaltung auf XING zusagen.',
            'abstract' => 'Du hast eine Idee für ein Unternehmen und bist nicht sicher, ob du wirklich durchstarten sollst? Erfahrene Firmenchefs, junge Existenzgründer, unternehmerisch denkende Führungskräfte und andere Kreative helfen dir bei der Entscheidung.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '8',
            'series_id' => '16',
            'name' => 'Wordpress Meetup',
            'image' => '/img/event/event-17.jpg',
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
        Event::create([
            'organizer_id' => '2',
            'series_id' => '18',
            'name' => 'Pecha Kucha',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://pecha-kucha-nuernberg.de/?p=234',
            'facebook' => 'www.facebook.com/events/1473755906206804/',
            'twitter' => '',
            'xing' => 'www.xing.com/events/pechakuchanight-nurnberg-volume-10-17-10-2014-1440097',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Pecha Kucha (sprich: petscha-kutscha, jap. ペチャクチャ “wirres Geplauder, Stimmengewirr”) ist eine Vortragstechnik, bei der zu einem mündlichen Vortrag passende Bilder (Folien) an eine Wand projeziert werden. Die Anzahl der Bilder ist dabei mit 20 Stück ebenso vorgegeben wie die 20-sekündige Dauer der Projektionszeit je Bild. Die Gesamtdauer des Vortrags beträgt damit 6 Minuten 40 Sekunden. In Pecha Kucha Nights (PKN) folgen mehrere dieser Vorträge hintereinander. Die Themen liegen meist im Bereich Design, Kunst, Mode und Architektur.

Die Vorteile dieser Technik liegen in der kurzweiligen, prägnanten Präsentation mit rigiden Zeitvorgaben, die von vornherein langatmige Vorträge und die damit verbundene Ermüdung der Zuhörenden (“death by powerpoint” syndrome) unmöglich machen.

Die Agenda sieht wie folgt aus, befindet sich aber noch im Aufbau (letzter Stand: 21.8.2014, 22:11- Reihenfolge wird noch festgelegt):

Bernd Erk - Titel kommt noch
Sabrina Weyh - Sonntag, 20.15 Uhr
Christine Kayser – Titel kommt noch
Alexander Racz - Titel kommt noch
Sham Jaff - Titel kommt noch
Michael Sabah - Titel kommt noch
wir suchen noch Presenter, bitte bei uns melden',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '9',
            'series_id' => null,
            'name' => 'Iron Blogger Franken Treffen',
            'image' => '/img/event/event-20.png',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://franken.ironblogger.de/',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => 'ironblogger',
            'description' => 'Während andere jeden Halbgedanken per Facebook, Twitter oder Google+ verbreiten, entdecken die “IronBlogger” das Publizieren auf der eigenen Plattform neu. Dabei haben sie einen guten Grund: Sie tun es für Bier. Aber nur vordergründig. IronBlogger schreiben mindestens einen Blogbeitrag pro Woche in ihr Blog – oder zahlen 5€ in die gemeinsame Bierkasse. Weist die Bierkasse einen gewissen Betrag auf, treffen sich die Blogger, nehmen die Kasse und lassen es sich schmecken.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '10',
            'series_id' => '21',
            'name' => 'Agile Monday',
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
            'description' => 'Agile Monday ist eine Expertenrunde mit Fokus auf agile Softwareentwicklung. Der Austausch über agile Themen wie Scrum, Extreme Programming, Lean oder Kanban in der Metropolregion Nürnberg-Fürth-Erlangen steht im Mittelpunkt der kreativen Sessions.

Am Anfang jedes Meetings wird Teilnehmern die Chance geboten, einen fachspezifischen Vortrag über ein aktuelles agiles Thema zu halten. Erfahrungsberichte, Praktiken, Neuigkeiten und Meetings - der Agile Monday hat die Szene im Blick.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '11',
            'series_id' => null,
            'name' => 'E://Commerce Night',
            'image' => '/img/event/event-23.jpg',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://ecommerce-night.de',
            'facebook' => 'www.facebook.com/events/1459702534308553/?ref_newsfeed_story_type=regular',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Mehrere Expertenvorträge aus den Bereichen B2B, B2C, Marken und Hersteller vs. Handel etc. Die Referenten wie z.B. Prof. Dr. Mario Fischer (Herausgeber „websiteboosting“ und Direktor tms Institut für Technik & Marktstrategien]);  Andreas Unger (stabilo Head of E-Commerce]); Steffen Griesel (CEO plentymarkets) und einige weitere diskutieren im Anschluss über die wichtigsten Trends im E-Commerce. Danach ist viel Gelegenheit für Gespräche, Networking und mehr bei Musik, Drinks und Snacks.  Die E://Commerce Night ist kostenlos (Voraussetzung für die Teilnahme ist aber eine Anmeldung unter www.ecommerce-night.de) und findet im Parks im Nürnberger Stadtpark statt. Sie wird von den Nürnberger E-Commerce Experten der shoptimax GmbH organisiert.

Specials:
Beacon-Demo - Teste Beacons im Live-Betrieb und erhalte einen Cocktail-Gutschein und E-Commerce am Point of Sale - Teste Instore-Online-Shopping mit dem OXID-POS-System.

Weitere Infos zur E://Commerce Night und Anmeldung auf www.ecommerce-night.de.

14.10.2014 ab 18 Uhr im Parks, Nürnberg
http://www.ecommerce-night.de',
            'abstract' => 'Die Zukunft des Online-Handels',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '12',
            'series_id' => null,
            'name' => 'OpenUp Meetup',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://osbf.eu/blog/osbf/einladung-zum-openup-meetup/',
            'facebook' => '',
            'twitter' => '',
            'xing' => 'xing.com/events/openup-meetup-1447581',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Die OSBF lädt alle Mitglieder und Interessierte herzlich zum offenen Austausch in Form einer Session ein. Im Fokus steht der digitale Wandel und die Konsequenzen für Unternehmen und ihre bisherigen Geschäftsmodelle. Anhand von Erfahrungen und Herausforderungen in Bereichen wie Open Education, Open Hardware oder Open Innovation wollen wir einen Anlaufpunkt bieten, um sich mit anderen Entscheidern oder Verantwortlichen auszutauschen, um sein Netzwerk zu erweitern und um Impulse für neue Herangehensweisen zu digitalen Strategien zu finden.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '13',
            'series_id' => null,
            'name' => 'Barcamp Night',
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
            'description' => 'Bei dieser Veranstaltung kannst Du erleben, was an einer Unkonferenz so besonders ist. Hier gibt es keine Teilnehmer, sondern nur Teilgeber. Das Programm des Abends, wird von den anwesenden Personen spontan gestaltet. Eine “Session” oder ein “Vortrag”, würde man üblicherweise sagen, dauert jeweils 45 Minuten. Inhalt und Format werden vom jeweiligen Initiator vorgeschlagen. Natürlich kannst Du auch eine Session vorbereiten und sie dann halten. Komm vorbei und lass Dich von dieser neuen Form des Lernens inspirieren. Du wirst begeistert sein!',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '14',
            'series_id' => null,
            'name' => 'Express Code Retreat',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'https://www.softwerkskammer.org/activities/nueww14_code_retreat',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Ein Code Retreat ist ein Veranstaltungsformat, bei dem Software-Entwickler voneinander lernen können. Statt einem klassischen Vortrag beizuwohnen, steht hier die Praxis im Vordergrund. Wir stellen anfangs ein kleines Software-Problem vor: das Game of Life. Dann finden sich die Teilnehmer in Paaren zusammen und arbeiten an der Lösung des Problems. Nach einer kurzen Session führen wir ein Retrospektive durch, jeder sucht sich einen neuen Partner und beginnt von vorne.Interessant wird das Ganze durch zusätzliche Einschränkungen (schon mal probiert ohne "if" zu Programmieren?) und Pairing-Games, wie Ping Pong, Evil Mute oder Saboteur. Normalerweise, ist ein Code Retreat ein ganztägige Veranstaltung. Diese besondere Express-Variante komprimiert die spannende Erfahrung auf gerade mal vier Stunden. Endlich können auch geplagte Familienväter und andere Wochendbeschäftigte an einem Code Retreat teilnehmen, der sonst meist Samstags oder Sonntags stattfindet.

Bring bitte ein Notebook mit lauffähiger Programmierumgebung und Testframework mit.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '15',
            'series_id' => null,
            'name' => 'WERBEBOTSCHAFT bewegt!',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://www.werbebotschaft-bewegt.de',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Stell dir vor, du hast eine geniale Idee, das passende Konzept und eine intelligente Marketingstrategie entwickelt. Alle sind von deinem Vorhaben begeistert und du sprühst vor Inspiration. Du hast deine persönliche Werbebotschaft gefunden, die die Menschen wirklich bewegt. Dann zeig es allen mit Video, Interaktion, Web, mit neuen Möglichkeiten und auf anderen Wegen. Zeig einfach alles, worauf es ankommt.  Wenn du Menschen zum kreativen Austausch über Technologien, Konzept und Design suchst, dann laden wir dich herzlich ein zu: WERBEBOTSCHAFT bewegt! Im JOSEPHS der Service-Manufaktur in Nürnberg. Anmeldungen in Kürze möglich.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '16',
            'series_id' => null,
            'name' => 'WebInsights Conference',
            'image' => '/img/event/event-28.png',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://www.webinsights.de/',
            'facebook' => 'www.facebook.com/webinsightsconference',
            'twitter' => 'WebinsightsCon',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Am Di, 14. Oktober 2014 findet in der Eventlocation „PARKS“ die Nürnberger „WebInsights Conference“ statt. Dieses Jahr steht die Online-Marketing und Web-Entwickler Konferenz unter dem Motto „Hands on Web“. Es gibt zahlreiche anschauliche Vorträge renommierter Sprecher, praxisnah und mit vielen Beispielen.Ein weiteres Highlight ist der „Secret Circle“. Eine exklusiv auserwählte Runde von Experten die ihre Insider Tricks austauschen. Egal ob Start-Up Unternehmer/in, E-Commerce Experte/in, Marketing Fachmann/frau oder Webentwickler/in. Jede/r  Web-Professional ist herzlich willkommen.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '17',
            'series_id' => null,
            'name' => 'Individuelle Vertriebsplattformen auf Magento-Basis',
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
            'description' => 'Magento als leistungsstarkes Open-Source E-Commerce System dürfte den meisten einmal begegnet sein. Zahlreiche Onlineshops sind in den letzten Jahren auf die inzwischen zur eBay Inc. gehörige Plattform umgestiegen. Als Online-Agentur mit Schwerpunkt E-Commerce betreuen wir (NETZKOLLEKTIV GmbH) seit Beginn des Systems im Jahr 2007 Kunden bei der Umsetzung, Wartung und Integration von Magento in ihre Infrastruktur.
Seit einem Jahr entwickeln und betreuen wir nunmehr auch drei Marktplätze, bei denen Magento nicht als reines Onlineshop-System genutzt wird, sondern modular zu teils stark individuellen Vertriebsplattformen ausgebaut wird, mit gutem Erfolg. Die Entwicklungs-Geschwindigkeit ist aufgrund des gegebenen Systems hoch, und kritische Teile wie Zahlung und Bestellabwicklung wurden langjährig erprobt und verbessert. Diese Vorgehensweise ist gegenüber einer kompletten Eigenentwicklung höchst kosteneffizient und besser planbar, was sie insbesondere für Neugründungen interessant macht.
Wir stellen zwei der Plattformen im Vortrag vor, und zeigen, welche Möglichkeiten in dem System Magento stecken, und wie diese interessant genutzt werden können.',
            'abstract' => 'Marktplätze mit Magento',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '18',
            'series_id' => null,
            'name' => 'Google: Mobile Boom',
            'image' => '',
            'email' => 'google_mobile@muellerverlag.de',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Der Anteil mobiler Endgeräte an der Nutzung des Internets steigt stetig an. Die meisten Menschen haben Smartphone, Tablet & Co. längst in ihren Alltag integriert. Eine mobil optimierte Webseite ist für Unternehmen daher mittlerweile erfolgsentscheidend. Informieren Sie sich über die Perspektiven der mobilen Zukunft und wie Sie für Ihr Unternehmen gezielt mobil werben.

Aufgrund der begrenzten Anzahl an Plätzen bitten wir darum, sich für die Veranstaltung vormerken zu lassen. Kontakt: google_mobile(at)muellerverlag.de',
            'abstract' => 'Sind Sie fit für die mobile Zukunft?',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '18',
            'series_id' => null,
            'name' => 'Google AdWords – Mit Suchmaschinenwerbung zum Neukunden',
            'image' => '',
            'email' => 'google_adwords@muellerverlag.de',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Der Werbemarkt bietet zahlreiche Möglichkeiten, das eigene Unternehmen zu präsentieren. Immer wichtiger wird hierbei die Onlinewerbung. Suchmaschinenwerbung bietet die idealen Voraussetzungen, um Neukunden zu gewinnen. Informieren Sie sich über die neuesten Trends und lassen Sie sich von Google zeigen, welche Chancen Suchmaschinenwerbung für Ihr Unternehmen bietet.

Aufgrund der begrenzten Anzahl an Plätzen bitten wir darum, sich für die Veranstaltung vormerken zu lassen. Kontakt: google_adwords(at)muellerverlag.de',
            'abstract' => 'Mit Suchmaschinenwerbung zum Neukunden',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '18',
            'series_id' => null,
            'name' => 'Facebook: Social Media – Präsenzen, Werbung und Monitoring',
            'image' => '',
            'email' => 'facebook@muellerverlag.de',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'An Facebook kommen wir nicht mehr vorbei. Nahezu eine Milliarde Menschen nutzen weltweit die Möglichkeit, über diese Plattform miteinander zu kommunizieren. Fast 50 Prozent der deutschen Unternehmen sind auf Facebook präsent, nutzen die Möglichkeit des interaktiven Austauschs mit ihren Kunden jedoch häufig nicht optimal. Wir zeigen Ihnen, wie Sie diese Form der Kundenbindung für Ihr Unternehmen gekonnt einsetzen können.

Aufgrund der begrenzten Anzahl an Plätzen bitten wir darum, sich für die Veranstaltung vormerken zu lassen. Kontakt: facebook(at)muellerverlag.de',
            'abstract' => 'Präsenzen, Werbung und Monitoring',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '2',
            'series_id' => null,
            'name' => 'Ignite Nürnberg',
            'image' => '',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => 'http://www.nuernberg-startups.de/2014/08/21/ignite-im-fab-lab-nuernberg-am-18-10-2014/#.VAC_r2TV9Z-',
            'facebook' => 'www.facebook.com/events/841143142563630',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Bei der Ignite finden alle Geeks und Nerds der Region ein Zuhause. Neben Ignite Talks, die ein bisschen so ablaufen wie die Talks bei Pecha Kucha, gibt es auch immer einen Hands-On-Workshop. Dieses Mal geht es dabei um das feine Schuhwerk, das uns durch den Alltag trägt: Bei der Ignite basteln wir gemeinsam an solchem Schuhwerk und werden eigene Schuhe selbst herstellen.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '2',
            'series_id' => null,
            'name' => 'Creative Monday',
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
            'description' => 'Der “CreativeMonday” ist eine neue, selbst organisierte Veranstaltung von Akteuren und für Akteure der Kultur- und Kreativwirtschaft. Interessierte sind ebenso wie Neugierige herzlich willkommen.

Zur Kultur- und Kreativwirtschaft gehören Filmproduktionsfirmen und Rundfunksender ebenso wie Journalisten- und Nachrichtenbüros oder die Hersteller von Computerspielen. Auch Werbe- und Designagenturen, Architekturbüros, Verlage sowie Museen und Galerien zählen dazu. Beim CreativeMonday geben Vertreter dieser verschiedenen Bereiche Einblick in ihre Arbeit, präsentieren Ideen und Projekte. Beiträge beim CreativeMonday sind engagiert, lebendig und kurz. In Bild und Ton. Bunt. Exemplarisch, stellvertretend, einführend. Manchmal provozierend oder irritierend und oft auch spontan.

Die Gäste des CreativeMonday dürfen sich freuen auf:

*komprimierte Darstellungen aus sehr unterschiedlichen, doch durchweg kreativen Berufs- und Arbeitsfeldern, in denen engagierte Menschen tätig sind – ob angestellt oder freiberuflich
*spannende Einblicke in verschiedene Bereiche der Kultur- und Kreativwirtschaft, mit denen wir als Konsumenten täglich in Berührung kommen: Film, Architektur, Buch, Werbung, Bildende Kunst, Musik usw.
* konstruktive Gespräche
* Vernetzung und Kooperation',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '19',
            'series_id' => null,
            'name' => 'Internet of Things-Hackathon',
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
            'description' => 'Du kennst Kinect und möchtest coole Anwendungen damit programmieren?  Du wolltest schon immer 3D-Druck in Deine App integrieren? Dann komm zum Internet-of-Things-Hackathon!

Bei diesem Hackathon, den wir in Kooperation mit der dodned Usergroup Franken durchführen, bist Du in jedem Fall richtig und kannst Deine Ideen in die Praxis umsetzen. Zusammen mit anderen Entwicklern bietet sich bei diesem Event die Möglichkeit, gemeinsam das Internet of Things zu entdecken und coole App-Ideen zu realisieren und weiterzuentwickeln. Wie immer wird das beste Projekt am Ende der Veranstaltung prämiert.

Microsoft stellt dabei die Rahmenbedingungen zur Verfügung. Für reichlich Zucker und Koffein wird also gesorgt. Außerdem werden Microsoft-Technologieberater vor Ort sein und für Fragen zur Verfügung stehen.

Das bringst Du mit:
* Laptop mit Windows 8 und Visual Studio 2013,  ggf. Windows Phone SDK (wir haben auch alle Tools dabei, falls Du sie noch nicht installiert hast)
* Dein Interesse am Internet-Of-Things und an der App-Entwicklung
* Dein Wissen zu HTML5/JS-Background oder .NET/Silverlight/XAML/C#

Agenda:
Der Hackathon startet um 18:00 Uhr und geht bis in die Nacht hinein. Essen & Getränke werden kostenfrei gestellt.

17:00 - 18:00     Ankunft, Networking, Team-Building, etc.
18:00 - 18:30     Kurze Präsentation zur App-Entwicklung auf der Microsoft Plattform
18:30 - 04:00     Hackathon – im Team oder alleine
05:00                 Abschlusspräsentation der entwickelten Apps',
            'abstract' => 'Microsoft Hackathon',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '20',
            'series_id' => null,
            'name' => 'Gamification',
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
            'description' => 'Für Neulinge und Interessierte hält Markus Neubauer und das Team von Silbury IT einen Einführungsvortrag zum Thema Gamification. Weitere Vorträge vertiefen das Thema und sollen zu einem anschließenden Gedankenaustausch anregen. Zudem soll bei diesem ersten Treffen das Interesse an einer Usergroup und einem regelmäßigen Treffen ermittelt werden.',
            'abstract' => 'Am Mittwoch, den 15.10.2014, findet um 17 Uhr das erste Treffen der Gamification-Szene Frankens statt. Veranstaltungsort ist das „Josephs – Die Service-Manufaktur“, in der Karl-Grillenberger-Straße 3, 90402 Nürnberg.',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '21',
            'series_id' => null,
            'name' => 'Recht so? Meine Website auf dem Prüfstand',
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
            'description' => 'Haben Sie ein Impressum auf Ihrer Website und wo findet man es? Ist wirklich alles drin?
Rechtsanwalt Armin Dieter Schmidt klärt Mythen und zeigt worauf es ankommt.

Datenschutz oder Datenschmutz? Ist ihre Seite konform? Wir klären, was bei der Nutzung von tracking-Software, Social-Media-Buttons und Newslettern beachtet werden muss. Linkaufbau, Unique Content, Black-Hat-SEO, externe Dienstleister – worauf muss ich achten? Welche

Rechte und Pflichten habe ich? Wir zeigen Best-Practice und gesetzliche Grundlagen.
Wir sehen uns echte Webseiten aus dem Publikum an und geben Verbesserungsvorschläge.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '22',
            'series_id' => null,
            'name' => 'Crowdfunding: Kreativität gemeinsam finanzieren',
            'image' => '',
            'email' => 'wirtschaft@stadt.nuernberg.de',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => '',
            'description' => 'Crowdfunding gibt Kreativen die Möglichkeit, ihre Ideen bekannt zu machen, ihre Projekte unabhängig zu finanzieren und eine Community für ihre Vision aufzubauen.

Anhand von erfolgreichen Crowdfunding-Projekten aus der Kultur- und Kreativwirtschaft diskutieren wir zusammen mit einem Experten der Crowdfundig-Plattform Startnext, wie Crowdfunding funktioniert, welche Budgets realistisch sind, welche Rolle die Präsentation spielt, welche Dankeschöns gut funktionieren und wie man das eigene Crowdfunding-Projekt erfolgreich bekannt machen kann.

Grundsätzlich gilt: Eine gute Vorbereitung des Crowdfunding-Projektes ist die beste Grundlage, um das Projekt erfolgreich zu finanzieren. Im Crowdfunding Workshop lernen Sie alle wichtigen Basics rund um das Thema Crowdfunding sowie die besten Tipps, worauf Sie bei der Wahl bzw. Gestaltung von Funding-Ziel, Deadline, Pitch-Video, Dankeschöns, Grafiken und Texten achten sollten.

Was sind die Inhalte?

•     Mechanismen und Funktionsweisen des Crowdfunding

•     Erfolgsfaktoren beim Crowdfunding: Projektbeschreibung, Dankeschöns, Pitch-Video, Funding-Ziel, Deadline, Grafiken, Kommunikation

•     Tipps und Tricks für die Projekterstellung

•     Kommunikationsstrategien für die eigene Crowdfunding-Kampagne

•     Diskussion von Best Cases und eigenen Projektideen

•     Ablauf einer Crowdfunding-Kampagne



Wer kann teilnehmen?

Wenn Sie ein Crowdfunding-Projekt planen, sind Sie hier genau richtig. Eine vage Vorstellung der Idee ist völlig ausreichend und auch für allgemein am Thema Crowdfunding Interessierte ist der Workshop offen.

Hinweis: Die Anmeldung zum Workshop ist verbindlich, da die Teilnehmeranzahl stark begrenzt ist. Bitte teilen Sie uns ggf. einen Rücktritt möglichst zeitnah mit, um anderen Interessierten die Möglichkeit zur Teilnahme zu gewährleisten.
Ihre Anmeldung richten Sie bitte an wirtschaft@stadt.nuernberg.de',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '22',
            'series_id' => null,
            'name' => 'Erfolgreich Crowdfunden!',
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
        Event::create([
            'organizer_id' => '22',
            'series_id' => null,
            'name' => 'Erfolgreiches Crowdfunding',
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
            'description' => 'In offener Diskussionsrunde berichten Crowdfunding-Veteranen über Ihre Erfahrungen, zeigen Probleme auf und vermitteln praktische Tipps und Tricks. Beim anschließenden Get-together besteht Gelegenheit Fragen zu stellen, sich auszutauschen und zu vernetzen.

Aktuelle Crowdfunding Projekte aus Nürnberg und verschiedene Crowdfunding-Plattformen präsentieren sich am Rande der Veranstaltung.

Zielgruppe: Akteure, die eine Crowdfunding-Kampagne starten wollen, oder bereits gestartet haben, alle an diesem Thema Interessierten und all diejenigen, die sich vorstellen können Crowdfunding-Projekte zu unterstützen.

Für das leibliche Wohl bei der Abendveranstaltung sorgt das HEIMATmobil – „Imbiss-Stand von Menschen mit geistiger Behinderung“. HEIMATmobil startete selbst mit Hilfe einer erfolgreichen Crowdfunding Kampagne.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '23',
            'series_id' => null,
            'name' => 'UX Stammtisch Franken',
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
            'description' => 'Der UX Stammtisch ist Austauschplattform für alle Professionals und Interessierten aus dem User Experience und User Interface Bereich.',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '24',
            'series_id' => null,
            'name' => 'Durchklicken war gestern, Mitmachen ist heute!',
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
            'description' => 'Mit dem App-Baukasten auf die Schnelle WebApps konfigurieren.
Im Workshop mit Ralph Göllner „Nutze den Tinder-Effect: „Wisch und Weg“-Technologie anhand von drei nicht ganz ernst gemeinte StartUp-Ideen illustriert“ erfahren wie einfach man den eigenen Kunden eine Anlaufstelle im Netz für Dienstleistungen und Support bieten kann.

Anschließend gibt Thomas Völklein einen Einblick wie Sie den Erfolg Ihrer Online-Aktivitäten mit OPI und OAI messen können: “Get Your ducks in a row - Die Online Marketing Fitness Analyse ist die Basis für die Effektivitäts- und Effizienzsteigerung während Ihrer digitalen Transformation”

Mit Fingerfood und Häppchen, Prinzenrolle und Äpfeln lassen wir den frühen Abend ausklingen.

Start 17:00 Uhr mit Workshop, ab ca. 18:30 Uhr Vortrag',
            'abstract' => 'Mit Community-Prinz(-ipien) jede noch so verschlafene Website aus dem Dornröschenschlaf wachküssen!',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '25',
            'series_id' => null,
            'name' => 'E-Entrepreneurship Flying Circus',
            'image' => '/img/event/event-43.jpg',
            'email' => '',
            'phone' => '',
            'fax' => '',
            'cell' => '',
            'web' => '',
            'facebook' => '',
            'twitter' => '',
            'xing' => '',
            'gplus' => '',
            'hashtag' => 'eefc14',
            'description' => 'Was ist der Flying Circus?
Warum gibt es eigentlich keine digitalen Weltmarktführer aus Deutschland? Wieso haben wir so wenig Gründer für die Digitale Wirtschaft? Der E-Entrepreneurship Flying Circus 2014 (#EEFC14) ist eine bundesweite Tour im Wissenschaftsjahr 2014 - Die digitale Gesellschaft, bei der in Form von einzelnen Aktionstagen an sechs deutschen Hochschulen mit Vorträge, Diskussionen und Interaktionen die Ausbildung von Gründern für die digitalen Wirtschaft motiviert und gestärkt werden soll.

Welche Gäste kommen nach Nürnberg?
Ralf Priemer (Vorstand hotel.de]); Alexander von Frankenberg (HTGF Vorsitz]); Carsten Rudolph (Netzwerk Nordbayern) sowie die Gründer von anwalt.de, streetspotr.com, stayfriends.com und amoonic.de

Wie ist der Ablauf?
10:00 Uhr - 10:30 Uhr Opening "E-Entrepreneurship Flying Circus"
10:30 Uhr - 11:00 Uhr Vorstellung "Gründerlehre/-förderung vor Ort"
11:00 Uhr - 12:00 Uhr Podium "Digitale Weltmarktführer aus Deutschland?!?" (Big Picture)
12:00 Uhr - 14:00 Uhr Mittagspause
14:00 Uhr - 14:45 Uhr Vorlesung "Was ist E-Entrepreneurship?"
14:45 Uhr - 15:00 Uhr Q&A "E-Entrepreneurship als Lehrfach?!"
15:00 Uhr - 16:00 Uhr Meetup "Digitale Startups vor Ort"
16:00 Uhr - 17:00 Uhr Podium "Chancen für digitale Startups vor Ort" (Local Picture)
Anschließend "Get Together“',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
        Event::create([
            'organizer_id' => '25',
            'series_id' => null,
            'name' => 'E-Entrepreneurship Flying Circus',
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
            'description' => 'Was ist der Flying Circus?
Warum gibt es eigentlich keine digitalen Weltmarktführer aus Deutschland? Wieso haben wir so wenig Gründer für die Digitale Wirtschaft? Der E-Entrepreneurship Flying Circus 2014 (#EEFC14) ist eine bundesweite Tour im Wissenschaftsjahr 2014 - Die digitale Gesellschaft, bei der in Form von einzelnen Aktionstagen an sechs deutschen Hochschulen mit Vorträge, Diskussionen und Interaktionen die Ausbildung von Gründern für die digitalen Wirtschaft motiviert und gestärkt werden soll.

Welche Gäste kommen nach Nürnberg?
Ralf Priemer (Vorstand hotel.de]); Alexander von Frankenberg (HTGF Vorsitz]); Carsten Rudolph (Netzwerk Nordbayern) sowie die Gründer von anwalt.de, streetspotr.com, stayfriends.com und amoonic.de

Wie ist der Ablauf?
10:00 Uhr - 10:30 Uhr Opening "E-Entrepreneurship Flying Circus"
10:30 Uhr - 11:00 Uhr Vorstellung "Gründerlehre/-förderung vor Ort"
11:00 Uhr - 12:00 Uhr Podium "Digitale Weltmarktführer aus Deutschland?!?" (Big Picture)
12:00 Uhr - 14:00 Uhr Mittagspause
14:00 Uhr - 14:45 Uhr Vorlesung "Was ist E-Entrepreneurship?"
14:45 Uhr - 15:00 Uhr Q&A "E-Entrepreneurship als Lehrfach?!"
15:00 Uhr - 16:00 Uhr Meetup "Digitale Startups vor Ort"
16:00 Uhr - 17:00 Uhr Podium "Chancen für digitale Startups vor Ort" (Local Picture)
Anschließend "Get Together“',
            'abstract' => '',
            'facebook_event' => null,
            'xing_event' => null,
            'gplus_event' => null,
            'tickets' => null,
            'lanyrd' => null
        ]);
    }
}

