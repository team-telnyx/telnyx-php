<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts;

use Telnyx\Client;
use Telnyx\ServiceContracts\Texml\Accounts\TranscriptionsRawContract;

final class TranscriptionsRawService implements TranscriptionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
