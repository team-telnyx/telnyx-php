<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderMisc\RemainingNumbersAction;

/**
 * @phpstan-type PortingOrderMiscShape = array{
 *   new_billing_phone_number?: string|null,
 *   remaining_numbers_action?: value-of<RemainingNumbersAction>|null,
 *   type?: value-of<PortingOrderType>|null,
 * }
 */
final class PortingOrderMisc implements BaseModel
{
    /** @use SdkModel<PortingOrderMiscShape> */
    use SdkModel;

    /**
     * New billing phone number for the remaining numbers. Used in case the current billing phone number is being ported to Telnyx. This will be set on your account with your current service provider and should be one of the numbers remaining on that account.
     */
    #[Optional(nullable: true)]
    public ?string $new_billing_phone_number;

    /**
     * Remaining numbers can be either kept with their current service provider or disconnected. 'new_billing_telephone_number' is required when 'remaining_numbers_action' is 'keep'.
     *
     * @var value-of<RemainingNumbersAction>|null $remaining_numbers_action
     */
    #[Optional(enum: RemainingNumbersAction::class, nullable: true)]
    public ?string $remaining_numbers_action;

    /**
     * A port can be either 'full' or 'partial'. When type is 'full' the other attributes should be omitted.
     *
     * @var value-of<PortingOrderType>|null $type
     */
    #[Optional(enum: PortingOrderType::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RemainingNumbersAction|value-of<RemainingNumbersAction>|null $remaining_numbers_action
     * @param PortingOrderType|value-of<PortingOrderType> $type
     */
    public static function with(
        ?string $new_billing_phone_number = null,
        RemainingNumbersAction|string|null $remaining_numbers_action = null,
        PortingOrderType|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $new_billing_phone_number && $obj['new_billing_phone_number'] = $new_billing_phone_number;
        null !== $remaining_numbers_action && $obj['remaining_numbers_action'] = $remaining_numbers_action;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * New billing phone number for the remaining numbers. Used in case the current billing phone number is being ported to Telnyx. This will be set on your account with your current service provider and should be one of the numbers remaining on that account.
     */
    public function withNewBillingPhoneNumber(
        ?string $newBillingPhoneNumber
    ): self {
        $obj = clone $this;
        $obj['new_billing_phone_number'] = $newBillingPhoneNumber;

        return $obj;
    }

    /**
     * Remaining numbers can be either kept with their current service provider or disconnected. 'new_billing_telephone_number' is required when 'remaining_numbers_action' is 'keep'.
     *
     * @param RemainingNumbersAction|value-of<RemainingNumbersAction>|null $remainingNumbersAction
     */
    public function withRemainingNumbersAction(
        RemainingNumbersAction|string|null $remainingNumbersAction
    ): self {
        $obj = clone $this;
        $obj['remaining_numbers_action'] = $remainingNumbersAction;

        return $obj;
    }

    /**
     * A port can be either 'full' or 'partial'. When type is 'full' the other attributes should be omitted.
     *
     * @param PortingOrderType|value-of<PortingOrderType> $type
     */
    public function withType(PortingOrderType|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
