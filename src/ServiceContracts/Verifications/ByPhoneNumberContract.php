<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

interface ByPhoneNumberContract
{
    /**
     * @api
     *
     * @return ByPhoneNumberListResponse<HasRawResponse>
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): ByPhoneNumberListResponse;
}
