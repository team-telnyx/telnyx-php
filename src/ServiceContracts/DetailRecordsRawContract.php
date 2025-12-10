<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DetailRecords\DetailRecordListParams;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\RequestOptions;

interface DetailRecordsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|DetailRecordListParams $params
     *
     * @return BaseResponse<DetailRecordListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
