<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortabilityChecksContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers to check for portability
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function run(
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortabilityCheckRunResponse;
}
