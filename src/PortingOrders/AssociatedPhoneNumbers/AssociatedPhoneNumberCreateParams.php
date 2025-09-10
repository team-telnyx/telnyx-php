<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AssociatedPhoneNumberCreateParams); // set properties as needed
 * $client->portingOrders.associatedPhoneNumbers->create(...$params->toArray());
 * ```
 * Creates a new associated phone number for a porting order. This is used for partial porting in GB to specify which phone numbers should be kept or disconnected.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.associatedPhoneNumbers->create(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\AssociatedPhoneNumbers->create
 *
 * @phpstan-type associated_phone_number_create_params = array{
 *   action: Action|value-of<Action>, phoneNumberRange: PhoneNumberRange
 * }
 */
final class AssociatedPhoneNumberCreateParams implements BaseModel
{
    /** @use SdkModel<associated_phone_number_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the action to take with this phone number during partial porting.
     *
     * @var value-of<Action> $action
     */
    #[Api(enum: Action::class)]
    public string $action;

    #[Api('phone_number_range')]
    public PhoneNumberRange $phoneNumberRange;

    /**
     * `new AssociatedPhoneNumberCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociatedPhoneNumberCreateParams::with(action: ..., phoneNumberRange: ...)
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
     */
    public static function with(
        Action|string $action,
        PhoneNumberRange $phoneNumberRange
    ): self {
        $obj = new self;

        $obj->action = $action instanceof Action ? $action->value : $action;
        $obj->phoneNumberRange = $phoneNumberRange;

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
        $obj->action = $action instanceof Action ? $action->value : $action;

        return $obj;
    }

    public function withPhoneNumberRange(
        PhoneNumberRange $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj->phoneNumberRange = $phoneNumberRange;

        return $obj;
    }
}
