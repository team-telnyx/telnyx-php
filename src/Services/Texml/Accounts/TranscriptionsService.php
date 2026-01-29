<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\ServiceContracts\Texml\Accounts\TranscriptionsContract;
use Telnyx\Services\Texml\Accounts\Transcriptions\JsonService;

final class TranscriptionsService implements TranscriptionsContract
{
    /**
     * @api
     */
    public TranscriptionsRawService $raw;

    /**
     * @api
     */
    public JsonService $json;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TranscriptionsRawService($client);
        $this->json = new JsonService($client);
    }
}
