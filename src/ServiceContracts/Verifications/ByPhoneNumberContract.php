<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

interface ByPhoneNumberContract
{
    /**
     * @api
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): ByPhoneNumberListResponse;
}
