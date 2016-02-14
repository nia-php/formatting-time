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
 * Formats a passed UTC timestamp value in YYYY-MM-DD HH:MM:SS format into a medium localized timestamp using a timezone.
 *
 * de_DE: 13.12.2015 00:45:12
 * de_CH: 13.12.2015 00:45:12
 * en_US: Dec 13, 2015, 12:45:12 AM
 * en_GB: 13 Dec 2015 00:45:12
 * fr_FR: 13 déc. 2015 00:45:12
 * ru_RU: 13 дек. 2015 г., 0:45:12
 */
class MediumDateTimeFormatter implements TimeFormatterInterface
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
        $formatter = new IntlDateFormatter($this->locale, IntlDateFormatter::MEDIUM, IntlDateFormatter::MEDIUM, $this->timezone, IntlDateFormatter::GREGORIAN);

        return $formatter->format(new DateTime($value, new DateTimeZone('UTC')));
    }
}
