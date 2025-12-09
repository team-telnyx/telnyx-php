<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortabilityChecks\PortabilityCheckRunParams;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortabilityChecksContract;

final class PortabilityChecksService implements PortabilityChecksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Runs a portability check, returning the results immediately.
     *
     * @param array{phoneNumbers?: list<string>}|PortabilityCheckRunParams $params
     *
     * @throws APIException
     */
    public function run(
        array|PortabilityCheckRunParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortabilityCheckRunResponse {
        [$parsed, $options] = PortabilityCheckRunParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PortabilityCheckRunResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'portability_checks',
            body: (object) $parsed,
            options: $options,
            convert: PortabilityCheckRunResponse::class,
        );

        return $response->parse();
    }
}
