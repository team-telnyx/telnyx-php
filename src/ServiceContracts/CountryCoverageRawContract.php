<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;
use Telnyx\CountryCoverage\CountryCoverageGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CountryCoverageRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CountryCoverageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $countryCode country ISO code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CountryCoverageGetCountryResponse>
     *
     * @throws APIException
     */
    public function retrieveCountry(
        string $countryCode,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
