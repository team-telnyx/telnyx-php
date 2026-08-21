<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Tools\PayToolParams;
use Telnyx\AI\Tools\SharedToolResponse;
use Telnyx\AI\Tools\ToolCreateParams;
use Telnyx\AI\Tools\ToolListParams;
use Telnyx\AI\Tools\ToolUpdateParams;
use Telnyx\AI\Tools\UpdateDynamicVariablesToolParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ToolsRawContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 * @phpstan-import-type UpdateDynamicVariablesToolParamsShape from \Telnyx\AI\Tools\UpdateDynamicVariablesToolParams
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ToolsRawService implements ToolsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new custom AI tool that can be attached to AI assistants.
     *
     * @param array{
     *   displayName: string,
     *   type: string,
     *   clientSideTool?: array<string,mixed>,
     *   function?: array<string,mixed>,
     *   handoff?: array<string,mixed>,
     *   invite?: array<string,mixed>,
     *   pay?: PayToolParams|PayToolParamsShape,
     *   retrieval?: array<string,mixed>,
     *   timeoutMs?: int,
     *   updateDynamicVariables?: UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape,
     *   webhook?: array<string,mixed>,
     *   idempotencyKey?: string,
     * }|ToolCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedToolResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ToolCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ToolCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tools',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: SharedToolResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details of a specific AI tool.
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedToolResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/tools/%1$s', $toolID],
            options: $requestOptions,
            convert: SharedToolResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the configuration of an existing AI tool.
     *
     * @param string $toolID unique identifier of the tool
     * @param array{
     *   clientSideTool?: array<string,mixed>,
     *   displayName?: string,
     *   function?: array<string,mixed>,
     *   handoff?: array<string,mixed>,
     *   invite?: array<string,mixed>,
     *   pay?: PayToolParams|PayToolParamsShape,
     *   retrieval?: array<string,mixed>,
     *   timeoutMs?: int,
     *   type?: string,
     *   updateDynamicVariables?: UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape,
     *   webhook?: array<string,mixed>,
     * }|ToolUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedToolResponse>
     *
     * @throws APIException
     */
    public function update(
        string $toolID,
        array|ToolUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ToolUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ai/tools/%1$s', $toolID],
            body: (object) $parsed,
            options: $options,
            convert: SharedToolResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of the custom AI tools configured on your account.
     *
     * @param array{
     *   filterName?: string, filterType?: string, pageNumber?: int, pageSize?: int
     * }|ToolListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SharedToolResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ToolListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ToolListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tools',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterName' => 'filter[name]',
                    'filterType' => 'filter[type]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: SharedToolResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes the specified custom AI tool from your account.
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/tools/%1$s', $toolID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
