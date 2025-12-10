<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface InsightsContract
{
    /**
     * @api
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
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @return DefaultFlatPagination<InsightTemplate>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

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
