<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function run(
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null
    ): PortabilityCheckRunResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortabilityCheckRunResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function runRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortabilityCheckRunResponse;
}
