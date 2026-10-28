<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\EmailContract;
use Telnyx\Services\Email\DedicatedIPsService;
use Telnyx\Services\Email\IPPoolsService;

final class EmailService implements EmailContract
{
    /**
     * @api
     */
    public EmailRawService $raw;

    /**
     * @api
     */
    public DedicatedIPsService $dedicatedIPs;

    /**
     * @api
     */
    public IPPoolsService $ipPools;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailRawService($client);
        $this->dedicatedIPs = new DedicatedIPsService($client);
        $this->ipPools = new IPPoolsService($client);
    }
}
