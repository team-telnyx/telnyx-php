<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ServiceContracts\MessagingTollfreeContract;
use Telnyx\Services\MessagingTollfree\VerificationService;

final class MessagingTollfreeService implements MessagingTollfreeContract
{
    /**
     * @api
     */
    public MessagingTollfreeRawService $raw;

    /**
     * @api
     */
    public VerificationService $verification;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingTollfreeRawService($client);
        $this->verification = new VerificationService($client);
    }
}
