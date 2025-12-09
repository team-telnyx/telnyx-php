<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingTollfree;

use Telnyx\Client;
use Telnyx\ServiceContracts\MessagingTollfree\VerificationContract;
use Telnyx\Services\MessagingTollfree\Verification\RequestsService;

final class VerificationService implements VerificationContract
{
    /**
     * @api
     */
    public VerificationRawService $raw;

    /**
     * @api
     */
    public RequestsService $requests;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerificationRawService($client);
        $this->requests = new RequestsService($client);
    }
}
