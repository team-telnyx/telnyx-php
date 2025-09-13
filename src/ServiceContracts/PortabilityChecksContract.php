<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PortabilityChecksContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers to check for portability
     *
     * @return PortabilityCheckRunResponse<HasRawResponse>
     */
    public function run(
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null
    ): PortabilityCheckRunResponse;
}
