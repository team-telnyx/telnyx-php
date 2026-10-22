<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\TtsIntegrationsContract;
use Telnyx\Services\TtsIntegrations\ActionsService;

final class TtsIntegrationsService implements TtsIntegrationsContract
{
    /**
     * @api
     */
    public TtsIntegrationsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TtsIntegrationsRawService($client);
        $this->actions = new ActionsService($client);
    }
}
