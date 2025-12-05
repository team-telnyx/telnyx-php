<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\PhoneNumberType;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\RequirementsStatus;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementsResponseShape = array{
 *   data?: NumberOrderPhoneNumber|null
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementsResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?NumberOrderPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   is_block_number?: bool|null,
     *   locality?: string|null,
     *   order_request_id?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   sub_number_order_id?: string|null,
     * } $data
     */
    public static function with(NumberOrderPhoneNumber|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   is_block_number?: bool|null,
     *   locality?: string|null,
     *   order_request_id?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   sub_number_order_id?: string|null,
     * } $data
     */
    public function withData(NumberOrderPhoneNumber|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
