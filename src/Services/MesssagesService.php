<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\MesssagesContract;

final class MesssagesService implements MesssagesContract
{
    /**
     * @api
     */
    public MesssagesRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MesssagesRawService($client);
    }
}
