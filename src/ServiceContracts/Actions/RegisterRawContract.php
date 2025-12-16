<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Actions;

use Telnyx\Actions\Register\RegisterCreateParams;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface RegisterRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RegisterCreateParams $params
     *
     * @return BaseResponse<RegisterNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RegisterCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
