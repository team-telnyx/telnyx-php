<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\RequestOptions;

interface MesssagesContract
{
    /**
     * @api
     *
     * @param array<mixed>|MesssageRcsParams $params
     *
     * @throws APIException
     */
    public function rcs(
        array|MesssageRcsParams $params,
        ?RequestOptions $requestOptions = null
    ): MesssageRcsResponse;
}
