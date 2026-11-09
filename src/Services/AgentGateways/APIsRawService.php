<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\APIs\AgentGatewayAPIResponse;
use Telnyx\AgentGateways\APIs\APICreateParams;
use Telnyx\AgentGateways\APIs\APIDeleteParams;
use Telnyx\AgentGateways\APIs\APIListResponse;
use Telnyx\AgentGateways\APIs\APIUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\APIsRawContract;

/**
 * REST APIs on an instance, served to agents as tools.
 *
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APICreateParams\Auth
 * @phpstan-import-type AuthShape from \Telnyx\AgentGateways\APIs\APIUpdateParams\Auth as AuthShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class APIsRawService implements APIsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds a REST API by its OpenAPI description. Each operation becomes a tool at `{gateway_url}/mcp`, named with the API's `name`, a hyphen, and the lowercased `operationId`. A description the gateway cannot fetch yields an API with no tools. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   name: string,
     *   specURL: string,
     *   auth?: AuthShape,
     *   baseURL?: string|null,
     *   forwardedHeaders?: list<string>,
     *   openToEveryKey?: bool,
     *   staticHeaders?: array<string,string>,
     *   tools?: list<string>,
     * }|APICreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayAPIResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|APICreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = APICreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/apis', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayAPIResponse::class,
        );
    }

    /**
     * @api
     *
     * Changes an API's settings. A field left out stays as it is, `"base_url": null` clears the base URL, and `auth` is replaced whole. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $apiID path param: The API's `id`
     * @param array{
     *   instanceID: string,
     *   auth?: AuthShape1,
     *   baseURL?: string|null,
     *   forwardedHeaders?: list<string>,
     *   name?: string,
     *   openToEveryKey?: bool,
     *   specURL?: string,
     *   staticHeaders?: array<string,string>,
     *   tools?: list<string>,
     * }|APIUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayAPIResponse>
     *
     * @throws APIException
     */
    public function update(
        string $apiID,
        array|APIUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = APIUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['agent_gateways/%1$s/apis/%2$s', $instanceID, $apiID],
            body: (object) array_diff_key($parsed, array_flip(['instanceID'])),
            options: $options,
            convert: AgentGatewayAPIResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the REST APIs the instance serves as tools, without their credentials. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<APIListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/apis', $instanceID],
            options: $requestOptions,
            convert: APIListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes an API and returns it as it was. An MCP server's `id` answers `404`. The instance must be `ready`; otherwise the request answers `409`.
     *
     * @param string $apiID the API's `id`
     * @param array{instanceID: string}|APIDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayAPIResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $apiID,
        array|APIDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = APIDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['agent_gateways/%1$s/apis/%2$s', $instanceID, $apiID],
            options: $options,
            convert: AgentGatewayAPIResponse::class,
        );
    }
}
