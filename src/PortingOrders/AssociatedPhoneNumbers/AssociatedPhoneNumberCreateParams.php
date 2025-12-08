<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;

/**
 * Creates a new associated phone number for a porting order. This is used for partial porting in GB to specify which phone numbers should be kept or disconnected.
 *
 * @see Telnyx\Services\PortingOrders\AssociatedPhoneNumbersService::create()
 *
 * @phpstan-type AssociatedPhoneNumberCreateParamsShape = array{
 *   action: Action|value-of<Action>,
 *   phone_number_range: PhoneNumberRange|array{
 *     end_at?: string|null, start_at?: string|null
 *   },
 * }
 */
final class AssociatedPhoneNumberCreateParams implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the action to take with this phone number during partial porting.
     *
     * @var value-of<Action> $action
     */
    #[Required(enum: Action::class)]
    public string $action;

    #[Required]
    public PhoneNumberRange $phone_number_range;

    /**
     * `new AssociatedPhoneNumberCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociatedPhoneNumberCreateParams::with(action: ..., phone_number_range: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociatedPhoneNumberCreateParams)
     *   ->withAction(...)
     *   ->withPhoneNumberRange(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Action|value-of<Action> $action
     * @param PhoneNumberRange|array{
     *   end_at?: string|null, start_at?: string|null
     * } $phone_number_range
     */
    public static function with(
        Action|string $action,
        PhoneNumberRange|array $phone_number_range
    ): self {
        $obj = new self;

        $obj['action'] = $action;
        $obj['phone_number_range'] = $phone_number_range;

        return $obj;
    }

    /**
     * Specifies the action to take with this phone number during partial porting.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * @param PhoneNumberRange|array{
     *   end_at?: string|null, start_at?: string|null
     * } $phoneNumberRange
     */
    public function withPhoneNumberRange(
        PhoneNumberRange|array $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj['phone_number_range'] = $phoneNumberRange;

        return $obj;
    }
}
