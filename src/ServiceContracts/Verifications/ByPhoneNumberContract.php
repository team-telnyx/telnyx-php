<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Verifications;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

interface ByPhoneNumberContract
{
    /**
     * @api
     *
     * @return ByPhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): ByPhoneNumberListResponse;

    /**
     * @api
     *
     * @return ByPhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): ByPhoneNumberListResponse;
}
