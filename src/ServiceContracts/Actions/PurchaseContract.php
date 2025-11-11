<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Actions;

use Telnyx\Actions\Purchase\PurchaseCreateParams;
use Telnyx\Actions\Purchase\PurchaseNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface PurchaseContract
{
    /**
     * @api
     *
     * @param array<mixed>|PurchaseCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PurchaseCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PurchaseNewResponse;
}
