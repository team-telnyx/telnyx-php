<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightCreateParams;
use Telnyx\AI\Conversations\Insights\InsightListParams;
use Telnyx\AI\Conversations\Insights\InsightListResponse;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\AI\Conversations\Insights\InsightUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightsContract;

final class InsightsService implements InsightsContract
{
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
     *   jsonSchema?: mixed|string,
     *   webhook?: string,
     * }|InsightCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InsightCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail {
        [$parsed, $options] = InsightCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InsightTemplateDetail> */
        $response = $this->client->request(
            method: 'post',
            path: 'ai/conversations/insights',
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateDetail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get insight by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail {
        /** @var BaseResponse<InsightTemplateDetail> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/conversations/insights/%1$s', $insightID],
            options: $requestOptions,
            convert: InsightTemplateDetail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an insight template
     *
     * @param array{
     *   instructions?: string,
     *   jsonSchema?: mixed|string,
     *   name?: string,
     *   webhook?: string,
     * }|InsightUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        array|InsightUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail {
        [$parsed, $options] = InsightUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InsightTemplateDetail> */
        $response = $this->client->request(
            method: 'put',
            path: ['ai/conversations/insights/%1$s', $insightID],
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateDetail::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all insights
     *
     * @param array{page?: array{number?: int, size?: int}}|InsightListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InsightListParams $params,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse {
        [$parsed, $options] = InsightListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InsightListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ai/conversations/insights',
            query: $parsed,
            options: $options,
            convert: InsightListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete insight by ID
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ai/conversations/insights/%1$s', $insightID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
