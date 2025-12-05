<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SubNumberOrders\SubNumberOrder\PhoneNumberType;
use Telnyx\SubNumberOrders\SubNumberOrder\Status;

/**
 * @phpstan-type SubNumberOrderUpdateResponseShape = array{
 *   data?: SubNumberOrder|null
 * }
 */
final class SubNumberOrderUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SubNumberOrderUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?SubNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SubNumberOrder|array{
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   is_block_sub_number_order?: bool|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     * } $data
     */
    public static function with(SubNumberOrder|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SubNumberOrder|array{
     *   id?: string|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   is_block_sub_number_order?: bool|null,
     *   order_request_id?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   phone_numbers_count?: int|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirements_met?: bool|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     * } $data
     */
    public function withData(SubNumberOrder|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
