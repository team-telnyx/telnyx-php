<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingTollfree;

use Telnyx\Client;
use Telnyx\ServiceContracts\MessagingTollfree\VerificationRawContract;

final class VerificationRawService implements VerificationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
