<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightsContract;

/**
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightCreateParams\JsonSchema
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightUpdateParams\JsonSchema as JsonSchemaShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InsightsService implements InsightsContract
{
    /**
     * @api
     */
    public InsightsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InsightsRawService($client);
    }

    /**
     * @api
     *
     * Create a new insight
     *
     * @param JsonSchemaShape $jsonSchema if specified, the output will follow the JSON schema
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instructions,
        string $name,
        string|array|null $jsonSchema = null,
        string $webhook = '',
        RequestOptions|array|null $requestOptions = null,
    ): InsightTemplateDetail {
        $params = Util::removeNulls(
            [
                'instructions' => $instructions,
                'name' => $name,
                'jsonSchema' => $jsonSchema,
                'webhook' => $webhook,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get insight by ID
     *
     * @param string $insightID The ID of the insight
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        RequestOptions|array|null $requestOptions = null
    ): InsightTemplateDetail {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($insightID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an insight template
     *
     * @param string $insightID The ID of the insight
     * @param JsonSchemaShape1 $jsonSchema
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        ?string $instructions = null,
        string|array|null $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): InsightTemplateDetail {
        $params = Util::removeNulls(
            [
                'instructions' => $instructions,
                'jsonSchema' => $jsonSchema,
                'name' => $name,
                'webhook' => $webhook,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($insightID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all insights
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<InsightTemplate>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete insight by ID
     *
     * @param string $insightID The ID of the insight
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($insightID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
