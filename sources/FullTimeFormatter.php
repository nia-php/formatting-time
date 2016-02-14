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
 * Formats a passed UTC timestamp value in YYYY-MM-DD HH:MM:SS format into a full localized timestamp using a timezone.
 *
 * de_DE: 00:45:12 Ostaustralische Sommerzeit
 * de_CH: 00:45:12 Ostaustralische Sommerzeit
 * en_US: 12:45:12 AM Australian Eastern Daylight Time
 * en_GB: 00:45:12 Australian Eastern Daylight Time
 * fr_FR: 00:45:12 heure avancée de l’Est de l’Australie
 * ru_RU: 0:45:12 Восточная Австралия, летнее время
 */
class FullTimeFormatter implements TimeFormatterInterface
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
        $formatter = new IntlDateFormatter($this->locale, IntlDateFormatter::NONE, IntlDateFormatter::FULL, $this->timezone, IntlDateFormatter::GREGORIAN);

        return $formatter->format(new DateTime($value, new DateTimeZone('UTC')));
    }
}

