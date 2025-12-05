<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberType;

/**
 * @phpstan-type AssociatedPhoneNumberDeleteResponseShape = array{
 *   data?: PortingAssociatedPhoneNumber|null
 * }
 */
final class AssociatedPhoneNumberDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssociatedPhoneNumberDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortingAssociatedPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   phone_number_range?: PhoneNumberRange|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingAssociatedPhoneNumber|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   phone_number_range?: PhoneNumberRange|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingAssociatedPhoneNumber|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
