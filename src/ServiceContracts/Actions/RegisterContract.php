<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Actions;

use Telnyx\Actions\Register\RegisterCreateParams;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface RegisterContract
{
    /**
     * @api
     *
     * @param array<mixed>|RegisterCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RegisterCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): RegisterNewResponse;
}
