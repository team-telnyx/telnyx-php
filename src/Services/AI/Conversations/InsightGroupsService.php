<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupGetInsightGroupsResponse;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroupsContract;
use Telnyx\Services\AI\Conversations\InsightGroups\InsightsService;

final class InsightGroupsService implements InsightGroupsContract
{
    /**
     * @api
     */
    public InsightGroupsRawService $raw;

    /**
     * @api
     */
    public InsightsService $insights;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InsightGroupsRawService($client);
        $this->insights = new InsightsService($client);
    }

    /**
     * @api
     *
     * Get insight group by ID
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($groupID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an insight template group
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        ?string $description = null,
        ?string $name = null,
        ?string $webhook = null,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail {
        $params = [
            'description' => $description, 'name' => $name, 'webhook' => $webhook,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($groupID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete insight group by ID
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($groupID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new insight group
     *
     * @throws APIException
     */
    public function insightGroups(
        string $name,
        ?string $description = null,
        string $webhook = '',
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail {
        $params = [
            'name' => $name, 'description' => $description, 'webhook' => $webhook,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->insightGroups(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all insight groups
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): InsightGroupGetInsightGroupsResponse {
        $params = ['page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveInsightGroups(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
