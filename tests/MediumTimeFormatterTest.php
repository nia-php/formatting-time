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
use Nia\Formatting\Time\MediumTimeFormatter;

/**
 * Unit test for \Nia\Formatting\Time\MediumTimeFormatter.
 */
class MediumTimeFormatterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Formatting\Time\MediumTimeFormatter::format
     *
     * @dataProvider formatProvider
     */
    public function testFormat($locale, $timezone, $value, $expected)
    {
        $formatter = new MediumTimeFormatter($locale, $timezone);

        $this->assertSame($expected, $formatter->format($value));
    }

    public function formatProvider()
    {
        $content = <<<EOL
de_DE;Europe/Berlin;2015-12-12 13:45:12;14:45:12
de_CH;Europe/Berlin;2015-12-12 13:45:12;14:45:12
en_US;Europe/Berlin;2015-12-12 13:45:12;2:45:12 PM
en_GB;Europe/Berlin;2015-12-12 13:45:12;14:45:12
fr_FR;Europe/Berlin;2015-12-12 13:45:12;14:45:12
ru_RU;Europe/Berlin;2015-12-12 13:45:12;14:45:12
de_DE;America/New_York;2015-12-12 13:45:12;08:45:12
de_CH;America/New_York;2015-12-12 13:45:12;08:45:12
en_US;America/New_York;2015-12-12 13:45:12;8:45:12 AM
en_GB;America/New_York;2015-12-12 13:45:12;08:45:12
fr_FR;America/New_York;2015-12-12 13:45:12;08:45:12
ru_RU;America/New_York;2015-12-12 13:45:12;8:45:12
de_DE;Europe/Berlin;2015-12-12 13:45:12;14:45:12
de_CH;Europe/Berlin;2015-12-12 13:45:12;14:45:12
en_US;Europe/Berlin;2015-12-12 13:45:12;2:45:12 PM
en_GB;Europe/Berlin;2015-12-12 13:45:12;14:45:12
fr_FR;Europe/Berlin;2015-12-12 13:45:12;14:45:12
ru_RU;Europe/Berlin;2015-12-12 13:45:12;14:45:12
de_DE;Australia/Sydney;2015-12-12 13:45:12;00:45:12
de_CH;Australia/Sydney;2015-12-12 13:45:12;00:45:12
en_US;Australia/Sydney;2015-12-12 13:45:12;12:45:12 AM
en_GB;Australia/Sydney;2015-12-12 13:45:12;00:45:12
fr_FR;Australia/Sydney;2015-12-12 13:45:12;00:45:12
ru_RU;Australia/Sydney;2015-12-12 13:45:12;0:45:12
EOL;

        // convert CSV to result set
        $result = [];
        foreach (explode("\n", $content) as $line) {
            $result[] = explode(';', $line);
        }

        return $result;
    }
}
