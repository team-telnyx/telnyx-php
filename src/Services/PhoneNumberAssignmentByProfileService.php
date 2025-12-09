<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PhoneNumberAssignmentByProfileContract;

final class PhoneNumberAssignmentByProfileService implements PhoneNumberAssignmentByProfileContract
{
    /**
     * @api
     */
    public PhoneNumberAssignmentByProfileRawService $raw;

    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberAssignmentByProfileRawService($client);
    }
}
