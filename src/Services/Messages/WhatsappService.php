<?php

declare(strict_types=1);

namespace Telnyx\Services\Messages;

use Telnyx\Client;
use Telnyx\ServiceContracts\Messages\WhatsappContract;

final class WhatsappService implements WhatsappContract
{
    /**
     * @api
     */
    public WhatsappRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WhatsappRawService($client);
    }
}
