<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightListResponse;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface InsightsContract
{
    /**
     * @api
     *
     * @param mixed|string $jsonSchema if specified, the output will follow the JSON schema
     *
     * @throws APIException
     */
    public function create(
        string $instructions,
        string $name,
        mixed $jsonSchema = null,
        string $webhook = '',
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param mixed|string $jsonSchema
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        ?string $instructions = null,
        mixed $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
