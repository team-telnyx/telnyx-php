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
     * @param string|array<string,mixed> $jsonSchema if specified, the output will follow the JSON schema
     *
     * @throws APIException
     */
    public function create(
        string $instructions,
        string $name,
        string|array|null $jsonSchema = null,
        string $webhook = '',
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        ?RequestOptions $requestOptions = null
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
     * @param string|array<string,mixed> $jsonSchema
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        ?string $instructions = null,
        string|array|null $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
        ?RequestOptions $requestOptions = null,
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
     * @return DefaultFlatPagination<InsightTemplate>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($insightID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
