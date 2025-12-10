<?php

declare(strict_types=1);

namespace Telnyx\Services\Public\Brand;

use Telnyx\Client;
use Telnyx\ServiceContracts\Public\Brand\SMSOtpRawContract;

final class SMSOtpRawService implements SMSOtpRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
