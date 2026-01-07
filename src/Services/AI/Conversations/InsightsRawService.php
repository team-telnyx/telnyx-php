<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightCreateParams;
use Telnyx\AI\Conversations\Insights\InsightListParams;
use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\AI\Conversations\Insights\InsightUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightsRawContract;

/**
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightCreateParams\JsonSchema
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightUpdateParams\JsonSchema as JsonSchemaShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InsightsRawService implements InsightsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new insight
     *
     * @param array{
     *   instructions: string,
     *   name: string,
     *   jsonSchema?: JsonSchemaShape,
     *   webhook?: string,
     * }|InsightCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateDetail>
     *
     * @throws APIException
     */
    public function create(
        array|InsightCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/conversations/insights',
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateDetail::class,
        );
    }

    /**
     * @api
     *
     * Get insight by ID
     *
     * @param string $insightID The ID of the insight
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateDetail>
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/insights/%1$s', $insightID],
            options: $requestOptions,
            convert: InsightTemplateDetail::class,
        );
    }

    /**
     * @api
     *
     * Update an insight template
     *
     * @param string $insightID The ID of the insight
     * @param array{
     *   instructions?: string,
     *   jsonSchema?: JsonSchemaShape1,
     *   name?: string,
     *   webhook?: string,
     * }|InsightUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateDetail>
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        array|InsightUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/conversations/insights/%1$s', $insightID],
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateDetail::class,
        );
    }

    /**
     * @api
     *
     * Get all insights
     *
     * @param array{pageNumber?: int, pageSize?: int}|InsightListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<InsightTemplate>>
     *
     * @throws APIException
     */
    public function list(
        array|InsightListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/insights',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: InsightTemplate::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete insight by ID
     *
     * @param string $insightID The ID of the insight
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/conversations/insights/%1$s', $insightID],
            options: $requestOptions,
            convert: null,
        );
    }
}
