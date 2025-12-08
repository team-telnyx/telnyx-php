<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type SubNumberOrderUpdateRequirementGroupResponseShape = array{
 *   data?: Data|null
 * }
 */
final class SubNumberOrderUpdateRequirementGroupResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderUpdateRequirementGroupResponseShape> */
    use SdkModel;

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
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   is_block_sub_number_order?: bool|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: string|null,
     *   phone_numbers?: list<PhoneNumber>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<RegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   is_block_sub_number_order?: bool|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: string|null,
     *   phone_numbers?: list<PhoneNumber>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<RegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
