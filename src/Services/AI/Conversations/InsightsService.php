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
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        $instructions,
        $name,
        $jsonSchema = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail {
        $params = [
            'instructions' => $instructions,
            'name' => $name,
            'jsonSchema' => $jsonSchema,
            'webhook' => $webhook,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail {
        [$parsed, $options] = InsightCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $instructions
     * @param mixed|string $jsonSchema
     * @param string $name
     * @param string $webhook
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        $instructions = omit,
        $jsonSchema = omit,
        $name = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail {
        $params = [
            'instructions' => $instructions,
            'jsonSchema' => $jsonSchema,
            'name' => $name,
            'webhook' => $webhook,
        ];

        return $this->updateRaw($insightID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $insightID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail {
        [$parsed, $options] = InsightUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse {
        [$parsed, $options] = InsightListParams::parseRequest(
            $params,
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
            convert: 'mixed',
        );
    }
}
