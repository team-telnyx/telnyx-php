<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\PhoneNumber;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter\PhoneNumberType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List available phone numbers.
 *
 * @see Telnyx\Services\AvailablePhoneNumbersService::list()
 *
 * @phpstan-type AvailablePhoneNumberListParamsShape = array{
 *   filter?: Filter|array{
 *     administrativeArea?: string|null,
 *     bestEffort?: bool|null,
 *     countryCode?: string|null,
 *     excludeHeldNumbers?: bool|null,
 *     features?: list<value-of<Feature>>|null,
 *     limit?: int|null,
 *     locality?: string|null,
 *     nationalDestinationCode?: string|null,
 *     phoneNumber?: PhoneNumber|null,
 *     phoneNumberType?: value-of<PhoneNumberType>|null,
 *     quickship?: bool|null,
 *     rateCenter?: string|null,
 *     reservable?: bool|null,
 *   },
 * }
 */
final class AvailablePhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<AvailablePhoneNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   administrativeArea?: string|null,
     *   bestEffort?: bool|null,
     *   countryCode?: string|null,
     *   excludeHeldNumbers?: bool|null,
     *   features?: list<value-of<Feature>>|null,
     *   limit?: int|null,
     *   locality?: string|null,
     *   nationalDestinationCode?: string|null,
     *   phoneNumber?: PhoneNumber|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   quickship?: bool|null,
     *   rateCenter?: string|null,
     *   reservable?: bool|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers].
     *
     * @param Filter|array{
     *   administrativeArea?: string|null,
     *   bestEffort?: bool|null,
     *   countryCode?: string|null,
     *   excludeHeldNumbers?: bool|null,
     *   features?: list<value-of<Feature>>|null,
     *   limit?: int|null,
     *   locality?: string|null,
     *   nationalDestinationCode?: string|null,
     *   phoneNumber?: PhoneNumber|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   quickship?: bool|null,
     *   rateCenter?: string|null,
     *   reservable?: bool|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
