<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter\PhoneNumberType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AvailablePhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param array{
     *   countryCode?: string,
     *   locality?: string,
     *   nationalDestinationCode?: string,
     *   phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): AvailablePhoneNumberBlockListResponse;
}
