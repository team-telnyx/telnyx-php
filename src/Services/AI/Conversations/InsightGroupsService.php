<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupGetInsightGroupsResponse;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams\Page;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupUpdateParams;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroupsContract;
use Telnyx\Services\AI\Conversations\InsightGroups\InsightsService;

use const Telnyx\Core\OMIT as omit;

final class InsightGroupsService implements InsightGroupsContract
{
    /**
     * @@api
     */
    public InsightsService $insights;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->insights = new InsightsService($client);
    }

    /**
     * @api
     *
     * Get insight group by ID
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail {
        $params = [];

        return $this->retrieveRaw($groupID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $groupID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/insight-groups/%1$s', $groupID],
            options: $requestOptions,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Update an insight template group
     *
     * @param string $description
     * @param string $name
     * @param string $webhook
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        $description = omit,
        $name = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail {
        $params = [
            'description' => $description, 'name' => $name, 'webhook' => $webhook,
        ];

        return $this->updateRaw($groupID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $groupID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail {
        [$parsed, $options] = InsightGroupUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['ai/conversations/insight-groups/%1$s', $groupID],
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Delete insight group by ID
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($groupID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $groupID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/conversations/insight-groups/%1$s', $groupID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Create a new insight group
     *
     * @param string $name
     * @param string $description
     * @param string $webhook
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function insightGroups(
        $name,
        $description = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail {
        $params = [
            'name' => $name, 'description' => $description, 'webhook' => $webhook,
        ];

        return $this->insightGroupsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function insightGroupsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail {
        [$parsed, $options] = InsightGroupInsightGroupsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/conversations/insight-groups',
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Get all insight groups
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return InsightGroupGetInsightGroupsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): InsightGroupGetInsightGroupsResponse {
        $params = ['page' => $page];

        return $this->retrieveInsightGroupsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InsightGroupGetInsightGroupsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveInsightGroupsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightGroupGetInsightGroupsResponse {
        [$parsed, $options] = InsightGroupRetrieveInsightGroupsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/insight-groups',
            query: $parsed,
            options: $options,
            convert: InsightGroupGetInsightGroupsResponse::class,
        );
    }
}
