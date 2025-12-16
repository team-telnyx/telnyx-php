<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;

interface OtaUpdatesRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<OtaUpdateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OtaUpdateListParams $params
     *
     * @return BaseResponse<DefaultPagination<OtaUpdateListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|OtaUpdateListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
