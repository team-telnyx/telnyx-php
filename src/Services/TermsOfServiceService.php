<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\TermsOfServiceContract;
use Telnyx\Services\TermsOfService\NumberReputationService;

final class TermsOfServiceService implements TermsOfServiceContract
{
    /**
     * @api
     */
    public TermsOfServiceRawService $raw;

    /**
     * @api
     */
    public NumberReputationService $numberReputation;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TermsOfServiceRawService($client);
        $this->numberReputation = new NumberReputationService($client);
    }
}
