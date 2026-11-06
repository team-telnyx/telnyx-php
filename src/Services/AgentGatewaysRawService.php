<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AgentGateways\AgentGateway;
use Telnyx\AgentGateways\AgentGatewayCreateParams;
use Telnyx\AgentGateways\AgentGatewayGetModelsResponse;
use Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse;
use Telnyx\AgentGateways\AgentGatewayListParams;
use Telnyx\AgentGateways\AgentGatewayResponse;
use Telnyx\AgentGateways\AgentGatewayRetrieveSpendLogsParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGatewaysRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgentGatewaysRawService implements AgentGatewaysRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an Agent Gateway instance on one of the account's WireGuard Interfaces. The instance starts `pending`, moves to `provisioning`, and then to `ready` or `failed`. It joins the WireGuard Interface as a peer named `agw-<instance id>`, and its `gateway_url` is set when it is `ready`.
     *
     * @param array{
     *   wireguardInterfaceID: string, name?: string|null
     * }|AgentGatewayCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AgentGatewayCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgentGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'agent_gateways',
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns one of the account's Agent Gateway instances.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s', $instanceID],
            options: $requestOptions,
            convert: AgentGatewayResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the account's Agent Gateway instances, newest first, one page at a time.
     *
     * @param array{pageNumber?: int, pageSize?: int}|AgentGatewayListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AgentGateway>>
     *
     * @throws APIException
     */
    public function list(
        array|AgentGatewayListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgentGatewayListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'agent_gateways',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: AgentGateway::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an Agent Gateway instance in any status. The response shows it `deleting`; repeating the request answers the same until the instance is gone, and then `404`. The instance's engine and everything stored on it are removed.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s', $instanceID],
            options: $requestOptions,
            convert: AgentGatewayResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the models the instance serves. Each has the name a request uses, the Telnyx Inference model behind it, and its price per million tokens.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGetModelsResponse>
     *
     * @throws APIException
     */
    public function retrieveModels(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/models', $instanceID],
            options: $requestOptions,
            convert: AgentGatewayGetModelsResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the requests the instance served with its keys, newest first, one page at a time. The window defaults to the last 24 hours and spans at most 31 days. A row appears a few seconds after its request. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   end?: \DateTimeInterface,
     *   keyID?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   start?: \DateTimeInterface,
     *   teamID?: string,
     * }|AgentGatewayRetrieveSpendLogsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayGetSpendLogsResponse>
     *
     * @throws APIException
     */
    public function retrieveSpendLogs(
        string $instanceID,
        array|AgentGatewayRetrieveSpendLogsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AgentGatewayRetrieveSpendLogsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/spend_logs', $instanceID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'keyID' => 'key_id',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'teamID' => 'team_id',
                ],
            ),
            options: $options,
            convert: AgentGatewayGetSpendLogsResponse::class,
        );
    }
}
