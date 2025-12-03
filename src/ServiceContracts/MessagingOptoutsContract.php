<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<MessagingOptoutListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingOptoutListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
