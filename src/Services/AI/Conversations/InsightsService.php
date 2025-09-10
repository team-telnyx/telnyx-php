<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightCreateParams;
use Telnyx\AI\Conversations\Insights\InsightListParams;
use Telnyx\AI\Conversations\Insights\InsightListParams\Page;
use Telnyx\AI\Conversations\Insights\InsightListResponse;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\AI\Conversations\Insights\InsightUpdateParams;
use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $instructions
     * @param string $name
     * @param mixed|string $jsonSchema if specified, the output will follow the JSON schema
     * @param string $webhook
     */
    public function create(
        $instructions,
        $name,
        $jsonSchema = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail {
        [$parsed, $options] = InsightCreateParams::parseRequest(
            [
                'instructions' => $instructions,
                'name' => $name,
                'jsonSchema' => $jsonSchema,
                'webhook' => $webhook,
            ],
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
     * @param string $instructions
     * @param mixed|string $jsonSchema
     * @param string $name
     * @param string $webhook
     */
    public function update(
        string $insightID,
        $instructions = omit,
        $jsonSchema = omit,
        $name = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail {
        [$parsed, $options] = InsightUpdateParams::parseRequest(
            [
                'instructions' => $instructions,
                'jsonSchema' => $jsonSchema,
                'name' => $name,
                'webhook' => $webhook,
            ],
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse {
        [$parsed, $options] = InsightListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/insights',
            query: $parsed,
            options: $options,
            convert: InsightListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete insight by ID
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
            convert: 'mixed',
        );
    }
}
