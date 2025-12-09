<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\CountryCode;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\Feature;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\GroupBy;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\PhoneNumberType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;

interface InventoryCoverageContract
{
    /**
     * @api
     *
     * @param array{
     *   administrativeArea?: string,
     *   count?: bool,
     *   countryCode?: 'AT'|'AU'|'BE'|'BG'|'CA'|'CH'|'CN'|'CY'|'CZ'|'DE'|'DK'|'EE'|'ES'|'FI'|'FR'|'GB'|'GR'|'HU'|'HR'|'IE'|'IT'|'LT'|'LU'|'LV'|'NL'|'NZ'|'MX'|'NO'|'PL'|'PT'|'RO'|'SE'|'SG'|'SI'|'SK'|'US'|CountryCode,
     *   features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|Feature>,
     *   groupBy?: 'locality'|'npa'|'national_destination_code'|GroupBy,
     *   npa?: int,
     *   nxx?: int,
     *   phoneNumberType?: 'local'|'toll_free'|'national'|'mobile'|'landline'|'shared_cost'|PhoneNumberType,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): InventoryCoverageListResponse;
}
