<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\LlmTokenGatewayContract;
use Telnyx\Services\LlmTokenGateway\SpendService;
use Telnyx\Services\LlmTokenGateway\TokenGroupsService;
use Telnyx\Services\LlmTokenGateway\TokenKeysService;
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
     * @api
     */
    public SpendService $spend;

    /**
     * @api
     */
    public TokenGroupsService $tokenGroups;

    /**
     * @api
     */
    public TokenKeysService $tokenKeys;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LlmTokenGatewayRawService($client);
        $this->usage = new UsageService($client);
        $this->spend = new SpendService($client);
        $this->tokenGroups = new TokenGroupsService($client);
        $this->tokenKeys = new TokenKeysService($client);
    }
}
