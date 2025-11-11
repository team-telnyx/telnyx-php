<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Calls\CallDialParams;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CallsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallDialParams $params
     *
     * @throws APIException
     */
    public function dial(
        array|CallDialParams $params,
        ?RequestOptions $requestOptions = null
    ): CallDialResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $callControlID,
        ?RequestOptions $requestOptions = null
    ): CallGetStatusResponse;
}
