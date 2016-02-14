<?php
/*
 * This file is part of the nia framework architecture.
 *
 * (c) Patrick Ullmann <patrick.ullmann@nat-software.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);
namespace Test\Nia\Formatting\Time;

use PHPUnit_Framework_TestCase;
use Nia\Formatting\Time\FullTimeFormatter;

/**
 * Unit test for \Nia\Formatting\Time\FullTimeFormatter.
 */
class FullTimeFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Time\FullTimeFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $timezone, $value, $expected)
    {
        $formatter = new FullTimeFormatter($locale, $timezone);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Mitteleuropäische Normalzeit
de_CH;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Mitteleuropäische Normalzeit
en_US;Europe/Berlin;2015-12-12 13:45:12;2:45:12 PM Central European Standard Time
en_GB;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Central European Standard Time
fr_FR;Europe/Berlin;2015-12-12 13:45:12;14:45:12 heure normale d’Europe centrale
ru_RU;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Центральная Европа, стандартное время
de_DE;America/New_York;2015-12-12 13:45:12;08:45:12 Nordamerikanische Ostküsten-Normalzeit
de_CH;America/New_York;2015-12-12 13:45:12;08:45:12 Nordamerikanische Ostküsten-Normalzeit
en_US;America/New_York;2015-12-12 13:45:12;8:45:12 AM Eastern Standard Time
en_GB;America/New_York;2015-12-12 13:45:12;08:45:12 Eastern Standard Time
fr_FR;America/New_York;2015-12-12 13:45:12;08:45:12 heure normale de l’Est nord-américain
ru_RU;America/New_York;2015-12-12 13:45:12;8:45:12 Восточная Америка, стандартное время
de_DE;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Mitteleuropäische Normalzeit
de_CH;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Mitteleuropäische Normalzeit
en_US;Europe/Berlin;2015-12-12 13:45:12;2:45:12 PM Central European Standard Time
en_GB;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Central European Standard Time
fr_FR;Europe/Berlin;2015-12-12 13:45:12;14:45:12 heure normale d’Europe centrale
ru_RU;Europe/Berlin;2015-12-12 13:45:12;14:45:12 Центральная Европа, стандартное время
de_DE;Australia/Sydney;2015-12-12 13:45:12;00:45:12 Ostaustralische Sommerzeit
de_CH;Australia/Sydney;2015-12-12 13:45:12;00:45:12 Ostaustralische Sommerzeit
en_US;Australia/Sydney;2015-12-12 13:45:12;12:45:12 AM Australian Eastern Daylight Time
en_GB;Australia/Sydney;2015-12-12 13:45:12;00:45:12 Australian Eastern Daylight Time
fr_FR;Australia/Sydney;2015-12-12 13:45:12;00:45:12 heure avancée de l’Est de l’Australie
ru_RU;Australia/Sydney;2015-12-12 13:45:12;0:45:12 Восточная Австралия, летнее время
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
