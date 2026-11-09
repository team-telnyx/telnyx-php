<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\CalendarConnection;

/**
 * Calendar provider: Google Calendar or Microsoft Outlook.
 */
enum Platform: string
{
    case GOOGLE_CALENDAR = 'google_calendar';

    case MICROSOFT_OUTLOOK = 'microsoft_outlook';
}
