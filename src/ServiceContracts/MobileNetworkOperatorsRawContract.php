<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobileNetworkOperatorsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MobileNetworkOperatorListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MobileNetworkOperatorListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileNetworkOperatorListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
