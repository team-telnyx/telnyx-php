<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightListParams\Page;
use Telnyx\AI\Conversations\Insights\InsightListResponse;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
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
     * @return InsightTemplateDetail<HasRawResponse>
     */
    public function retrieve(
        string $insightID,
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return InsightListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): InsightListResponse;

    /**
     * @api
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
