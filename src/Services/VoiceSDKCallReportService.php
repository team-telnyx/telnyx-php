<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\VoiceSDKCallReportContract;

final class VoiceSDKCallReportService implements VoiceSDKCallReportContract
{
    /**
     * @api
     */
    public VoiceSDKCallReportRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceSDKCallReportRawService($client);
    }
}
