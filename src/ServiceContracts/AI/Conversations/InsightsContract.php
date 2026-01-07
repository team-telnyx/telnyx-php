<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightCreateParams\JsonSchema
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightUpdateParams\JsonSchema as JsonSchemaShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InsightsContract
{
    /**
     * @api
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
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        RequestOptions|array|null $requestOptions = null
    ): InsightTemplateDetail;

    /**
     * @api
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
    ): InsightTemplateDetail;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
