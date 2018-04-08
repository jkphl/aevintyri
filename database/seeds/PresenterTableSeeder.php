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

use App\Models\Presenter;
use Illuminate\Database\Seeder;

class PresenterTableSeeder extends Seeder
{
    public function run()
    {
        Presenter::create([
            'name'        => 'Jeremy Keith',
            'email'       => 'jeremy@adactio.com',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '+44 7792 069292',
            'web'         => 'http://adactio.com',
            'facebook'    => 'www.facebook.com/adactio',
            'twitter'     => 'adactio',
            'xing'        => '',
            'gplus'       => 'plus.google.com/+JeremyKeithAdactio',
            'image'       => '/img/presenter/presenter-1.jpg',
            'hashtag'     => '',
            'description' => 'Jeremy Keith is an Irish web developer living in Brighton, England where he works with the web consultancy firm [Clearleft](http://clearleft.com/ "Clearleft"). He wrote the books DOM Scripting, Bulletproof Ajax, and most recently, HTML5 For Web Designers. His latest project is [Huffduffer](http://huffduffer.com/ "Huffduffer"]); a service for creating podcasts of found sounds. When he\'s not making websites, Jeremy plays bouzouki in the band [Salter Cane](http://saltercane.com/ "Salter Cane").',
            'abstract'    => 'An Irish web developer working with @Clearleft curating @dConstruct, playing music with @SalterCane, and guy behind the curtain of @Huffduffer & @SessionUpdates'
        ]);
        Presenter::create([
            'name'        => 'Kerstin Probiesch',
            'email'       => 'mail@barrierefreie-informationskultur.de',
            'phone'       => '+49 6421 167002',
            'fax'         => '',
            'cell'        => '+49 170 9097560',
            'web'         => 'http://www.barrierefreie-informationskultur.de',
            'facebook'    => 'www.facebook.com/kerstin.probiesch',
            'twitter'     => 'kprobiesch',
            'xing'        => 'www.xing.com/profile/Kerstin_Probiesch',
            'gplus'       => 'plus.google.com/+KerstinProbiesch',
            'image'       => '/img/presenter/presenter-2.jpg',
            'hashtag'     => '',
            'description' => 'Kerstin Probiesch berät und schult seit mehr als zehn Jahren Accessibility im Web. Sie prüft Websites auf Konformität mit der deutschen BITV 2.0 und/oder nach WCAG 2.0, ist Ansprechpartnerin in Deutschland für Zertifizierungen nach WCAG 2.0 der schweizerischen Stiftung Zugang für alle und bearbeitet PDF-Dateien. Frau Probiesch engagiert sich bei den Webkrauts für mehr Qualität im Web und gibt ihr Wissen u.a. auf Tagungen und über Fachliteratur weiter.',
            'abstract'    => 'Beraterin für Barrierefreiheit und Social Media, Mitglied der WCAG Working Group des World Wide Web Consortium (W3C) und Autorin zahlreicher Publikationen'
        ]);
        Presenter::create([
            'name'        => 'Marco Zehe',
            'email'       => 'marco.zehe@googlemail.com',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://www.zehe-edv.de',
            'facebook'    => 'www.facebook.com/marco.zehe.hamburg',
            'twitter'     => 'MarcoZehe',
            'xing'        => '',
            'gplus'       => 'plus.google.com/+MarcoZehe',
            'image'       => '/img/presenter/presenter-3.jpg',
            'hashtag'     => '',
            'description' => 'Marco Zehe arbeitet seit 2007 bei der Mozilla Corporation als Beauftragter für die Bearrierefreiheit in allen Projekten rund um Firefox. Er berät in diesem Zusammenhang auch Webentwickler dabei, Code zu schreiben, der von verschiedenen Zugangstechnologien verstanden werden kann und so Menschen mit Behinderung hilft. Herr Zehe ist selbst blind und hat aus einer früheren Anstellung detailliertes Wissen über die Funktionsweise solcher Technologien.',
            'abstract'    => 'Beauftragter des Mozilla-Accessibility-Teams rund um Firefox, Barrierefreiheits- und Technik-Geek, blind von Geburt an'
        ]);
        Presenter::create([
            'name'        => 'Michael Niqué',
            'email'       => 'michael@fabfolk.com',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://www.fablab-nuernberg.de',
            'facebook'    => '',
            'twitter'     => 'micha_N',
            'xing'        => 'www.xing.com/profile/Michael_Nique',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-4.jpg',
            'hashtag'     => '',
            'description' => 'Michael ist die treibende Kraft hinter vielen Aktivitäten des Fab Lab. Er ist Lab Manager und kennt sich wie kein anderer mit den Details der digitalen Produktionstechnik aus. Als Teil der Open Design und Maker-Community bringt er viele inspirierende Ideen in seine Arbeit im Lab ein. Wenn er nicht gerade im Fab Lab ist, entwickelt der ausgebildete Wirtschaftsingenieur erfolgreiche Geschäftsmodelle rund um die Themengebiete Open Source, Digitale Fabrikation und Webtechnologie. Michael startete bereits 2010 eine regelmäßige Maker-Night in Nürnberg und ist Initiator des Creative Co-Working Festivals.',
            'abstract'    => 'Michael Niqué ist Lab Manager im Nürnberger Fab Lab'
        ]);
        Presenter::create([
            'name'        => 'Dr. Heinz Raufer',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => 'www.xing.com/profile/Heinz_Raufer',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-5.jpg',
            'hashtag'     => '',
            'description' => 'Investor bei der Fernbus-Suchmaschine CheckMyBus.de',
            'abstract'    => 'CheckMyBus'
        ]);
        Presenter::create([
            'name'        => 'Stefan Kremer',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'Mitgründer WP-Meetup Franken'
        ]);
        Presenter::create([
            'name'        => 'Prof. Dr. Mario Fischer',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'Herausgeber "websiteboosting" | Direktor tms Institut für Technik & Marktstrategien'
        ]);
        Presenter::create([
            'name'        => 'Andreas Unger',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'Head of E-Commerce | stabilo GmbH'
        ]);
        Presenter::create([
            'name'        => 'Wolfgang Rosenthal',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'E-Commerce Manager | Sindopower GmbH / Semikron Group'
        ]);
        Presenter::create([
            'name'        => 'Steffen Griesel',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'Geschäftsführer | plentymarkets GmbH'
        ]);
        Presenter::create([
            'name'        => 'Carsten Szameitat',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'Geschäftsführer LOC Place GmbH, Österreich'
        ]);
        Presenter::create([
            'name'        => 'Friedrich Schreieck',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => 'Geschäftsführer shoptimax GmbH'
        ]);
        Presenter::create([
            'name'        => 'Dominik Krebs',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => 'www.xing.com/app/signup?op=form;private_profile=1',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-13.jpg',
            'hashtag'     => '',
            'description' => 'Dominik Krebs, der die technische Leitung bei NETZKOLLEKTIV verantwortet, wird über die Möglichkeiten und Vorteile beim Einsatz von Magento für individuelle Vertriebsplattformen berichten.',
            'abstract'    => ''
        ]);
        Presenter::create([
            'name'        => 'Michael Gelhaus',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://nearbees.de/',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => 'www.xing.com/profile/Michael_Gelhaus',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => 'Michael Gelhaus, Mitgründer der Plattform www.nearbees.de, über die Imker ihren Honig zum Verkauf anbieten können, wird über die Idee sowie die Plattform berichten. Diese wurde von NETZKOLLEKTIV auf Magento-Basis umgesetzt.',
            'abstract'    => ''
        ]);
        Presenter::create([
            'name'        => 'Ralph Göllner',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => '',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => ''
        ]);
        Presenter::create([
            'name'        => 'Thomas Völklein',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://www.i-fom.de/institut/ifom-team',
            'facebook'    => '',
            'twitter'     => '',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '',
            'hashtag'     => '',
            'description' => '',
            'abstract'    => ''
        ]);
        Presenter::create([
            'name'        => 'Aaron Parecki',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://aaronparecki.com',
            'facebook'    => '',
            'twitter'     => 'aaronpk',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-17.jpg',
            'hashtag'     => '',
            'description' => 'Aaron Parecki is CTO of the [Esri R&D Center](http://developers.arcgis.com "Esri"]); Portland, and the co-founder of [IndieWebCamp](http://indiewebcamp.com). He is known for having tracked his location at 5 second intervals since 2008, and for co-founding [Geoloqi](https://geoloqi.com]); a location-based software company acquired by Esri in 2012. His work has been featured in Wired, Fast Company and more. He made Inc. Magazine\'s 30 Under 30 for his work on Geoloqi.',
            'abstract'    => 'CTO @EsriPDX R&D Center • Cofounder of #indieweb/@indiewebcamp • Maintains http://oauth.net • Creator of http://micropub.net'
        ]);
        Presenter::create([
            'name'        => 'Laura Kalbag',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://laurakalbag.com',
            'facebook'    => '',
            'twitter'     => 'laurakalbag',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-18.jpg',
            'hashtag'     => '',
            'description' => 'Laura Kalbag is a designer with a thing for the web. She works at [ind.ie](https://ind.ie "ind.ie — Designing Hope"]); creating design-led, free and open alternatives to technologies that are funded through the exploitation of users\' data. She tends to harp on about web development, design theory, web fonts, responsiveness and walks with her big fluffy dog, Oskar.',
            'abstract'    => 'Chatty 27yo freelance designer with a thing for the web. Mostly going on about development, design theory, web fonts, responsiveness, and dog walks'
        ]);
        Presenter::create([
            'name'        => 'Curtis Wallen',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'http://curtiswallen.com',
            'facebook'    => '',
            'twitter'     => 'curtiswallen',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-19.jpg',
            'hashtag'     => '',
            'description' => 'Curtis Wallen is a visual artist, journalist, and researcher with a diverse practice that explores identity, memory, surveillance, and the cultural implications of their intersections.

In 2013, Wallen began working on a digital and physical alias called Aaron Brown as part of an ongoing project: «In God We Trust, All Others We Monitor: The Story of Aaron Brown.» The Story of Aaron Brown has been featured internationally by the BBC, The Atlantic, and&nbsp;[Süddeutsche Zeitung](http://www.sueddeutsche.de/digital/neue-identitaet-im-internet-mein-zweites-ich-1.2121936 "Neue Identität im Internet — Mein zweites Ich").

Wallen lives and works in Brooklyn, New York.',
            'abstract'    => 'Visual artist, journalist, and researcher with a diverse practice that explores identity, memory, surveillance. Living and working in in Brooklyn, New York'
        ]);
        Presenter::create([
            'name'        => 'Mario Heiderich',
            'email'       => '',
            'phone'       => '',
            'fax'         => '',
            'cell'        => '',
            'web'         => 'https://cure53.de',
            'facebook'    => '',
            'twitter'     => '0x6D6172696F',
            'xing'        => '',
            'gplus'       => '',
            'image'       => '/img/presenter/presenter-20.jpg',
            'hashtag'     => '',
            'description' => 'Dr.-Ing. Mario Heiderich is leading [Cure53](https://cure53.de "Cure53 – Fine penetration tests for fine websites"]); a Berlin based security company that is specialized on attack and defense of modern JavaScript-heavy websites and applications.',
            'abstract'    => 'Experte für IT-Sicherheit und Penetrationstests für Websites und Anwendungen'
        ]);
    }
}
