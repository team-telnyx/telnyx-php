<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\Client;
use Telnyx\ServiceContracts\AI\ChatContract;

final class ChatService implements ChatContract
{
    /**
     * @api
     */
    public ChatRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ChatRawService($client);
    }
}
