<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BulkSimCardActionsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BulkSimCardActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BulkSimCardActionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<BulkSimCardActionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|BulkSimCardActionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
