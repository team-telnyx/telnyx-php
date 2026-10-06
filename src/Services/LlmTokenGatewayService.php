<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\LlmTokenGatewayContract;
use Telnyx\Services\LlmTokenGateway\UsageService;

final class LlmTokenGatewayService implements LlmTokenGatewayContract
{
    /**
     * @api
     */
    public LlmTokenGatewayRawService $raw;

    /**
     * @api
     */
    public UsageService $usage;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LlmTokenGatewayRawService($client);
        $this->usage = new UsageService($client);
    }
}
