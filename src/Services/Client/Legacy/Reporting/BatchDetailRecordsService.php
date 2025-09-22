<?php

declare(strict_types=1);

namespace Telnyx\Services\Client\Legacy\Reporting;

use Telnyx\Client;
use Telnyx\ServiceContracts\Client\Legacy\Reporting\BatchDetailRecordsContract;
use Telnyx\Services\Client\Legacy\Reporting\BatchDetailRecords\MessagingService;
use Telnyx\Services\Client\Legacy\Reporting\BatchDetailRecords\SpeechToTextService;
use Telnyx\Services\Client\Legacy\Reporting\BatchDetailRecords\VoiceService;

final class BatchDetailRecordsService implements BatchDetailRecordsContract
{
    /**
     * @@api
     */
    public MessagingService $messaging;

    /**
     * @@api
     */
    public SpeechToTextService $speechToText;

    /**
     * @@api
     */
    public VoiceService $voice;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->messaging = new MessagingService($client);
        $this->speechToText = new SpeechToTextService($client);
        $this->voice = new VoiceService($client);
    }
}
