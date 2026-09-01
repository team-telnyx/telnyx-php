<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\ExternalRequirementsContract;
use Telnyx\Services\ExternalRequirements\SubNumberOrdersService;

final class ExternalRequirementsService implements ExternalRequirementsContract
{
    /**
     * @api
     */
    public ExternalRequirementsRawService $raw;

    /**
     * @api
     */
    public SubNumberOrdersService $subNumberOrders;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExternalRequirementsRawService($client);
        $this->subNumberOrders = new SubNumberOrdersService($client);
    }
}
