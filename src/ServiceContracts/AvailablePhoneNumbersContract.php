<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\PhoneNumberType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AvailablePhoneNumbersContract
{
    /**
     * @api
     *
     * @param array{
     *   administrativeArea?: string,
     *   bestEffort?: bool,
     *   countryCode?: string,
     *   excludeHeldNumbers?: bool,
     *   features?: list<'sms'|'mms'|'voice'|'fax'|'emergency'|'hd_voice'|'international_sms'|'local_calling'|Feature>,
     *   limit?: int,
     *   locality?: string,
     *   nationalDestinationCode?: string,
     *   phoneNumber?: array{
     *     contains?: string, endsWith?: string, startsWith?: string
     *   },
     *   phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     *   quickship?: bool,
     *   rateCenter?: string,
     *   reservable?: bool,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): AvailablePhoneNumberListResponse;
}
