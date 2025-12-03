<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightCreateParams;
use Telnyx\AI\Conversations\Insights\InsightListParams;
use Telnyx\AI\Conversations\Insights\InsightListResponse;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\AI\Conversations\Insights\InsightUpdateParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface InsightsContract
{
    /**
     * @api
     *
     * @param array<mixed>|InsightCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InsightCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateDetail;

    /**
     * @api
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
     * @param array<mixed>|InsightUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        array|InsightUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateDetail;

    /**
     * @api
     *
     * @param array<mixed>|InsightListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InsightListParams $params,
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
}
