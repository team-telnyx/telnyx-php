<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Integrations\IntegrationGetResponse;
use Telnyx\AI\Integrations\IntegrationListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\IntegrationsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IntegrationsRawService implements IntegrationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve integration details
     *
     * @param string $integrationID The integration id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegrationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $integrationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/integrations/%1$s', $integrationID],
            options: $requestOptions,
            convert: IntegrationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all available integrations.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegrationListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/integrations',
            options: $requestOptions,
            convert: IntegrationListResponse::class,
        );
    }
}
