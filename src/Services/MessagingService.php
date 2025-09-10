<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\MessagingContract;
use Telnyx\Services\Messaging\RcsService;

final class MessagingService implements MessagingContract
{
    /**
     * @@api
     */
    public RcsService $rcs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->rcs = new RcsService($this->client);
    }
}
