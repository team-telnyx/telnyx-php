<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\EnumContract;

final class EnumService implements EnumContract
{
    /**
     * @api
     */
    public EnumRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EnumRawService($client);
    }
}
