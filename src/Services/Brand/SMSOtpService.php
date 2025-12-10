<?php

declare(strict_types=1);

namespace Telnyx\Services\Brand;

use Telnyx\Client;
use Telnyx\ServiceContracts\Brand\SMSOtpContract;

final class SMSOtpService implements SMSOtpContract
{
    /**
     * @api
     */
    public SMSOtpRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SMSOtpRawService($client);
    }
}
