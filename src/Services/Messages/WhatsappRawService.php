<?php

declare(strict_types=1);

namespace Telnyx\Services\Messages;

use Telnyx\Client;
use Telnyx\ServiceContracts\Messages\WhatsappRawContract;

final class WhatsappRawService implements WhatsappRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
