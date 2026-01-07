<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Integrations;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse;
use Telnyx\AI\Integrations\Connections\ConnectionListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Integrations\ConnectionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConnectionsRawService implements ConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get user setup integrations
     *
     * @param string $userConnectionID The connection id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/integrations/connections/%1$s', $userConnectionID],
            options: $requestOptions,
            convert: ConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List user setup integrations
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/integrations/connections',
            options: $requestOptions,
            convert: ConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific integration connection.
     *
     * @param string $userConnectionID The user integration connection identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/integrations/connections/%1$s', $userConnectionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
