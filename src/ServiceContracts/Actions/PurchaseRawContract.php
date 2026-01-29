<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Actions;

use Telnyx\Actions\Purchase\PurchaseCreateParams;
use Telnyx\Actions\Purchase\PurchaseNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PurchaseRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PurchaseCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PurchaseNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PurchaseCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
