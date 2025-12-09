<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy;

use Telnyx\Client;
use Telnyx\ServiceContracts\Legacy\ReportingRawContract;

final class ReportingRawService implements ReportingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
