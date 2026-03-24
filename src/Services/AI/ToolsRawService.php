<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Tools\ToolCreateParams;
use Telnyx\AI\Tools\ToolGetResponse;
use Telnyx\AI\Tools\ToolListParams;
use Telnyx\AI\Tools\ToolListResponse;
use Telnyx\AI\Tools\ToolNewResponse;
use Telnyx\AI\Tools\ToolUpdateParams;
use Telnyx\AI\Tools\ToolUpdateResponse;
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
     * Create Tool
     *
     * @param array{
     *   displayName: string,
     *   type: string,
     *   function?: array<string,mixed>,
     *   handoff?: array<string,mixed>,
     *   invite?: array<string,mixed>,
     *   retrieval?: array<string,mixed>,
     *   timeoutMs?: int,
     *   webhook?: array<string,mixed>,
     * }|ToolCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ToolNewResponse>
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tools',
            body: (object) $parsed,
            options: $options,
            convert: ToolNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Tool
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ToolGetResponse>
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
            convert: ToolGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update Tool
     *
     * @param array{
     *   displayName?: string,
     *   function?: array<string,mixed>,
     *   handoff?: array<string,mixed>,
     *   invite?: array<string,mixed>,
     *   retrieval?: array<string,mixed>,
     *   timeoutMs?: int,
     *   type?: string,
     *   webhook?: array<string,mixed>,
     * }|ToolUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ToolUpdateResponse>
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
            convert: ToolUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List Tools
     *
     * @param array{
     *   filterName?: string, filterType?: string, pageNumber?: int, pageSize?: int
     * }|ToolListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ToolListResponse>>
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
            convert: ToolListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete Tool
     *
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
