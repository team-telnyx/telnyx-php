<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\ServiceContracts\Texml\Accounts\RecordingsContract;
use Telnyx\Services\Texml\Accounts\Recordings\JsonService;

final class RecordingsService implements RecordingsContract
{
    /**
     * @api
     */
    public RecordingsRawService $raw;

    /**
     * @api
     */
    public JsonService $json;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecordingsRawService($client);
        $this->json = new JsonService($client);
    }
}
