<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter\PhoneNumberType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List available phone number blocks.
 *
 * @see Telnyx\Services\AvailablePhoneNumberBlocksService::list()
 *
 * @phpstan-type AvailablePhoneNumberBlockListParamsShape = array{
 *   filter?: Filter|array{
 *     country_code?: string|null,
 *     locality?: string|null,
 *     national_destination_code?: string|null,
 *     phone_number_type?: value-of<PhoneNumberType>|null,
 *   },
 * }
 */
final class AvailablePhoneNumberBlockListParams implements BaseModel
{
    /** @use SdkModel<AvailablePhoneNumberBlockListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
     */
    #[Api(optional: true)]
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
     *   country_code?: string|null,
     *   locality?: string|null,
     *   national_destination_code?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     * } $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
     *
     * @param Filter|array{
     *   country_code?: string|null,
     *   locality?: string|null,
     *   national_destination_code?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }
}
