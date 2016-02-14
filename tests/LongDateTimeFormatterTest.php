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
use Nia\Formatting\Time\LongDateTimeFormatter;

/**
 * Unit test for \Nia\Formatting\Time\LongDateTimeFormatter.
 */
class LongDateTimeFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Time\LongDateTimeFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $timezone, $value, $expected)
    {
        $formatter = new LongDateTimeFormatter($locale, $timezone);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;Europe/Berlin;2015-12-12 13:45:12;12. Dezember 2015 14:45:12 MEZ
de_CH;Europe/Berlin;2015-12-12 13:45:12;12. Dezember 2015 14:45:12 MEZ
en_US;Europe/Berlin;2015-12-12 13:45:12;December 12, 2015 at 2:45:12 PM GMT+1
en_GB;Europe/Berlin;2015-12-12 13:45:12;12 December 2015 14:45:12 CET
fr_FR;Europe/Berlin;2015-12-12 13:45:12;12 décembre 2015 14:45:12 UTC+1
ru_RU;Europe/Berlin;2015-12-12 13:45:12;12 декабря 2015 г., 14:45:12 GMT+1
de_DE;America/New_York;2015-12-12 13:45:12;12. Dezember 2015 08:45:12 GMT-5
de_CH;America/New_York;2015-12-12 13:45:12;12. Dezember 2015 08:45:12 GMT-5
en_US;America/New_York;2015-12-12 13:45:12;December 12, 2015 at 8:45:12 AM EST
en_GB;America/New_York;2015-12-12 13:45:12;12 December 2015 08:45:12 GMT-5
fr_FR;America/New_York;2015-12-12 13:45:12;12 décembre 2015 08:45:12 UTC−5
ru_RU;America/New_York;2015-12-12 13:45:12;12 декабря 2015 г., 8:45:12 GMT-5
de_DE;Europe/Berlin;2015-12-12 13:45:12;12. Dezember 2015 14:45:12 MEZ
de_CH;Europe/Berlin;2015-12-12 13:45:12;12. Dezember 2015 14:45:12 MEZ
en_US;Europe/Berlin;2015-12-12 13:45:12;December 12, 2015 at 2:45:12 PM GMT+1
en_GB;Europe/Berlin;2015-12-12 13:45:12;12 December 2015 14:45:12 CET
fr_FR;Europe/Berlin;2015-12-12 13:45:12;12 décembre 2015 14:45:12 UTC+1
ru_RU;Europe/Berlin;2015-12-12 13:45:12;12 декабря 2015 г., 14:45:12 GMT+1
de_DE;Australia/Sydney;2015-12-12 13:45:12;13. Dezember 2015 00:45:12 GMT+11
de_CH;Australia/Sydney;2015-12-12 13:45:12;13. Dezember 2015 00:45:12 GMT+11
en_US;Australia/Sydney;2015-12-12 13:45:12;December 13, 2015 at 12:45:12 AM GMT+11
en_GB;Australia/Sydney;2015-12-12 13:45:12;13 December 2015 00:45:12 GMT+11
fr_FR;Australia/Sydney;2015-12-12 13:45:12;13 décembre 2015 00:45:12 UTC+11
ru_RU;Australia/Sydney;2015-12-12 13:45:12;13 декабря 2015 г., 0:45:12 GMT+11
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
