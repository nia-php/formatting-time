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
namespace Nia\Formatting\Time;

use DateTime;
use DateTimeZone;
use IntlDateFormatter;

/**
 * Formats a passed UTC timestamp value in YYYY-MM-DD HH:MM:SS format into a full localized date timestamp using a timezone.
 *
 * de_DE: Sonntag, 13. Dezember 2015
 * de_CH: Sonntag, 13. Dezember 2015
 * en_US: Sunday, December 13, 2015
 * en_GB: Sunday, 13 December 2015
 * fr_FR: dimanche 13 décembre 2015
 * ru_RU: воскресенье, 13 декабря 2015 г.
 */
class FullDateFormatter implements TimeFormatterInterface
{

    /**
     * The used locale.
     *
     * @var string
     */
    private $locale = null;

    /**
     * The target timezone.
     *
     * @var string
     */
    private $timezone = null;

    /**
     * Constructor.
     *
     * @param string $locale
     *            The used locale.
     * @param string $timezone
     *            The target timezone.
     */
    public function __construct(string $locale, string $timezone)
    {
        $this->locale = $locale;
        $this->timezone = $timezone;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Nia\Formatter\FormatterInterface::format($value)
     */
    public function format(string $value): string
    {
        $formatter = new IntlDateFormatter($this->locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE, $this->timezone, IntlDateFormatter::GREGORIAN);

        return $formatter->format(new DateTime($value, new DateTimeZone('UTC')));
    }
}

