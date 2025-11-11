<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\PhoneNumberBlocksContract;
use Telnyx\Services\PhoneNumberBlocks\JobsService;

final class PhoneNumberBlocksService implements PhoneNumberBlocksContract
{
    /**
     * @api
     */
    public JobsService $jobs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->jobs = new JobsService($client);
    }
}
