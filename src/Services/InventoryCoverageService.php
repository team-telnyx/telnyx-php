<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InventoryCoverage\InventoryCoverageListParams;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InventoryCoverageContract;

final class InventoryCoverageService implements InventoryCoverageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an inventory coverage request. If locality, npa or national_destination_code is used in groupBy, and no region or locality filters are used, the whole paginated set is returned.
     *
     * @param array{
     *   filter?: array{
     *     administrative_area?: string,
     *     count?: bool,
     *     country_code?: 'AT'|'AU'|'BE'|'BG'|'CA'|'CH'|'CN'|'CY'|'CZ'|'DE'|'DK'|'EE'|'ES'|'FI'|'FR'|'GB'|'GR'|'HU'|'HR'|'IE'|'IT'|'LT'|'LU'|'LV'|'NL'|'NZ'|'MX'|'NO'|'PL'|'PT'|'RO'|'SE'|'SG'|'SI'|'SK'|'US',
     *     features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'>,
     *     groupBy?: 'locality'|'npa'|'national_destination_code',
     *     npa?: int,
     *     nxx?: int,
     *     phone_number_type?: 'local'|'toll_free'|'national'|'mobile'|'landline'|'shared_cost',
     *   },
     * }|InventoryCoverageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InventoryCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): InventoryCoverageListResponse {
        [$parsed, $options] = InventoryCoverageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'inventory_coverage',
            query: $parsed,
            options: $options,
            convert: InventoryCoverageListResponse::class,
        );
    }
}
