<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Dir;

use Telnyx\Client;
use Telnyx\ServiceContracts\Enterprises\Dir\PhoneNumberBatchesRawContract;

final class PhoneNumberBatchesRawService implements PhoneNumberBatchesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
