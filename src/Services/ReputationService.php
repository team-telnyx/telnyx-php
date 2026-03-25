<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\ReputationContract;
use Telnyx\Services\Reputation\NumbersService;

final class ReputationService implements ReputationContract
{
    /**
     * @api
     */
    public ReputationRawService $raw;

    /**
     * @api
     */
    public NumbersService $numbers;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReputationRawService($client);
        $this->numbers = new NumbersService($client);
    }
}
