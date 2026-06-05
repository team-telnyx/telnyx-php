<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Dir;

use Telnyx\Client;
use Telnyx\ServiceContracts\Enterprises\Dir\PhoneNumbersContract;

final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @api
     */
    public PhoneNumbersRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumbersRawService($client);
    }
}
