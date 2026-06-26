<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TermsOfService;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TermsOfService\BrandedCalling\BrandedCallingAgreeResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandedCallingRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrandedCallingAgreeResponse>
     *
     * @throws APIException
     */
    public function agree(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
