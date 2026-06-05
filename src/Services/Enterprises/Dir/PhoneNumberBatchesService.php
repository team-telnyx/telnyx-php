<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Dir;

use Telnyx\Client;
use Telnyx\ServiceContracts\Enterprises\Dir\PhoneNumberBatchesContract;

final class PhoneNumberBatchesService implements PhoneNumberBatchesContract
{
    /**
     * @api
     */
    public PhoneNumberBatchesRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberBatchesRawService($client);
    }
}
