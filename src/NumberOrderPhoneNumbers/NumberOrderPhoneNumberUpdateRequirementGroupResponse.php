<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementGroupResponseShape = array{
 *   data?: Data|null
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementGroupResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementGroupResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   is_block_number?: bool|null,
     *   locality?: string|null,
     *   order_request_id?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: string|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<RegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: string|null,
     *   status?: string|null,
     *   sub_number_order_id?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   is_block_number?: bool|null,
     *   locality?: string|null,
     *   order_request_id?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: string|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<RegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: string|null,
     *   status?: string|null,
     *   sub_number_order_id?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
