<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OtaUpdates\OtaUpdateGetResponse;
use Telnyx\OtaUpdates\OtaUpdateListParams;
use Telnyx\OtaUpdates\OtaUpdateListResponse;
use Telnyx\RequestOptions;

interface OtaUpdatesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|OtaUpdateListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|OtaUpdateListParams $params,
        ?RequestOptions $requestOptions = null
    ): OtaUpdateListResponse;
}
