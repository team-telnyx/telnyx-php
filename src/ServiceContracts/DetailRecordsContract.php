<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DetailRecords\DetailRecordListParams;
use Telnyx\DetailRecords\DetailRecordListResponse;
use Telnyx\RequestOptions;

interface DetailRecordsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DetailRecordListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordListResponse;
}
