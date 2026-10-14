<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse;
use Telnyx\LlmTokenGateway\Usage\UsageRetrieveExportParams;
use Telnyx\LlmTokenGateway\Usage\UsageRetrieveSummaryParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UsageRetrieveExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageGetExportResponse>
     *
     * @throws APIException
     */
    public function retrieveExport(
        array|UsageRetrieveExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UsageRetrieveSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UsageGetSummaryResponse>
     *
     * @throws APIException
     */
    public function retrieveSummary(
        array|UsageRetrieveSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
