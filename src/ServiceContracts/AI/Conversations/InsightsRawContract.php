<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Insights\InsightCreateParams;
use Telnyx\AI\Conversations\Insights\InsightListParams;
use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\AI\Conversations\Insights\InsightTemplateDetail;
use Telnyx\AI\Conversations\Insights\InsightUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface InsightsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InsightCreateParams $params
     *
     * @return BaseResponse<InsightTemplateDetail>
     *
     * @throws APIException
     */
    public function create(
        array|InsightCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     *
     * @return BaseResponse<InsightTemplateDetail>
     *
     * @throws APIException
     */
    public function retrieve(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param array<string,mixed>|InsightUpdateParams $params
     *
     * @return BaseResponse<InsightTemplateDetail>
     *
     * @throws APIException
     */
    public function update(
        string $insightID,
        array|InsightUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InsightListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<InsightTemplate>>
     *
     * @throws APIException
     */
    public function list(
        array|InsightListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $insightID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
