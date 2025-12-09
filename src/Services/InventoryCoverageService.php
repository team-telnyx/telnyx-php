<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\CountryCode;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\Feature;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\GroupBy;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\PhoneNumberType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InventoryCoverageContract;

final class InventoryCoverageService implements InventoryCoverageContract
{
    /**
     * @api
     */
    public InventoryCoverageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InventoryCoverageRawService($client);
    }

    /**
     * @api
     *
     * Creates an inventory coverage request. If locality, npa or national_destination_code is used in groupBy, and no region or locality filters are used, the whole paginated set is returned.
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
    ): InventoryCoverageListResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
