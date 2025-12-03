<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightCreateParams;
use Telnyx\AI\Conversations\Insights\InsightListParams;
use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\AI\Conversations\Insights\InsightUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
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
     *   json_schema?: string|array<string,mixed>,
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail {
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   instructions?: string,
     *   json_schema?: string|array<string,mixed>,
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

        // @phpstan-ignore-next-line;
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
     * @param array{page_number_?: int, page_size_?: int}|InsightListParams $params
     *
     * @return DefaultFlatPagination<InsightTemplate>
     *
     * @throws APIException
     */
    public function list(
        array|InsightListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultFlatPagination {
        [$parsed, $options] = InsightListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/insights',
            query: $parsed,
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
     * @throws APIException
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/conversations/insights/%1$s', $insightID],
            options: $requestOptions,
            convert: null,
        );
    }
}
