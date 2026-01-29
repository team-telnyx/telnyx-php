<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting;

use Telnyx\Client;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecordsRawContract;

final class BatchDetailRecordsRawService implements BatchDetailRecordsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
