<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\MeetingBotContract;
use Telnyx\Services\MeetingBot\CalendarService;

final class MeetingBotService implements MeetingBotContract
{
    /**
     * @api
     */
    public MeetingBotRawService $raw;

    /**
     * @api
     */
    public CalendarService $calendar;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MeetingBotRawService($client);
        $this->calendar = new CalendarService($client);
    }
}
