<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroup;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroupsContract;
use Telnyx\Services\AI\Conversations\InsightGroups\InsightsService;

/**
 * Manage historical AI assistant conversations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Returns the details of a single insight template group, including the insight templates assigned to it.
     *
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        RequestOptions|array|null $requestOptions = null
    ): InsightTemplateGroupDetail {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($groupID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified insight template group and returns the updated group.
     *
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        ?string $description = null,
        ?string $name = null,
        ?string $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): InsightTemplateGroupDetail {
        $params = Util::removeNulls(
            ['description' => $description, 'name' => $name, 'webhook' => $webhook]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($groupID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes the specified insight template group by its ID.
     *
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($groupID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates a new insight template group for organizing related insight templates, and returns the created group.
     *
     * @param string $name Body param
     * @param string $description Body param
     * @param string $webhook Body param
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function insightGroups(
        string $name,
        ?string $description = null,
        string $webhook = '',
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): InsightTemplateGroupDetail {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'description' => $description,
                'webhook' => $webhook,
                'idempotencyKey' => $idempotencyKey,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->insightGroups(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of your insight template groups. Groups organize related insight templates that are applied together when analyzing conversations.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<InsightTemplateGroup>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveInsightGroups(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
