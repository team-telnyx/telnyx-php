<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingOptouts\MessagingOptoutListParams;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;

interface MessagingOptoutsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingOptoutListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingOptoutListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingOptoutListResponse;
}
