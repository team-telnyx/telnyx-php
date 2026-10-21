<?php

declare(strict_types=1);

namespace Telnyx\Services\TtsIntegrations;

use Telnyx\Client;
use Telnyx\ServiceContracts\TtsIntegrations\ActionsRawContract;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
