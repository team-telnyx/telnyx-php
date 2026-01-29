<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\OperatorConnectContract;
use Telnyx\Services\OperatorConnect\ActionsService;

final class OperatorConnectService implements OperatorConnectContract
{
    /**
     * @api
     */
    public OperatorConnectRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OperatorConnectRawService($client);
        $this->actions = new ActionsService($client);
    }
}
