<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AvailablePhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param array<mixed>|AvailablePhoneNumberBlockListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AvailablePhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AvailablePhoneNumberBlockListResponse;
}
