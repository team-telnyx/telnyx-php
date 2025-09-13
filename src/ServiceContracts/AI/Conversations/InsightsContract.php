<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightListParams\Page;
use Telnyx\AI\Conversations\Insights\InsightListResponse;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface InsightsContract
{
    /**
     * @api
     *
     * @param string $instructions
     * @param string $name
     * @param mixed|string $jsonSchema if specified, the output will follow the JSON schema
     * @param string $webhook
     *
     * @return InsightTemplateDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $instructions,
        $name,
        $jsonSchema = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InsightTemplateDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @return InsightTemplateDetail<HasRawResponse>
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
     * @return InsightTemplateDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $insightID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param string $instructions
     * @param mixed|string $jsonSchema
     * @param string $name
     * @param string $webhook
     *
     * @return InsightTemplateDetail<HasRawResponse>
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
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InsightTemplateDetail<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $insightID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return InsightListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return InsightListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $insightID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
