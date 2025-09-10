<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderMisc\RemainingNumbersAction;

/**
 * @phpstan-type porting_order_misc = array{
 *   newBillingPhoneNumber?: string|null,
 *   remainingNumbersAction?: value-of<RemainingNumbersAction>|null,
 *   type?: value-of<PortingOrderType>|null,
 * }
 */
final class PortingOrderMisc implements BaseModel
{
    /** @use SdkModel<porting_order_misc> */
    use SdkModel;

    /**
     * New billing phone number for the remaining numbers. Used in case the current billing phone number is being ported to Telnyx. This will be set on your account with your current service provider and should be one of the numbers remaining on that account.
     */
    #[Api('new_billing_phone_number', optional: true)]
    public ?string $newBillingPhoneNumber;

    /**
     * Remaining numbers can be either kept with their current service provider or disconnected. 'new_billing_telephone_number' is required when 'remaining_numbers_action' is 'keep'.
     *
     * @var value-of<RemainingNumbersAction>|null $remainingNumbersAction
     */
    #[Api(
        'remaining_numbers_action',
        enum: RemainingNumbersAction::class,
        optional: true,
    )]
    public ?string $remainingNumbersAction;

    /**
     * A port can be either 'full' or 'partial'. When type is 'full' the other attributes should be omitted.
     *
     * @var value-of<PortingOrderType>|null $type
     */
    #[Api(enum: PortingOrderType::class, optional: true)]
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
     * @param RemainingNumbersAction|value-of<RemainingNumbersAction> $remainingNumbersAction
     * @param PortingOrderType|value-of<PortingOrderType> $type
     */
    public static function with(
        ?string $newBillingPhoneNumber = null,
        RemainingNumbersAction|string|null $remainingNumbersAction = null,
        PortingOrderType|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $newBillingPhoneNumber && $obj->newBillingPhoneNumber = $newBillingPhoneNumber;
        null !== $remainingNumbersAction && $obj->remainingNumbersAction = $remainingNumbersAction instanceof RemainingNumbersAction ? $remainingNumbersAction->value : $remainingNumbersAction;
        null !== $type && $obj->type = $type instanceof PortingOrderType ? $type->value : $type;

        return $obj;
    }

    /**
     * New billing phone number for the remaining numbers. Used in case the current billing phone number is being ported to Telnyx. This will be set on your account with your current service provider and should be one of the numbers remaining on that account.
     */
    public function withNewBillingPhoneNumber(
        string $newBillingPhoneNumber
    ): self {
        $obj = clone $this;
        $obj->newBillingPhoneNumber = $newBillingPhoneNumber;

        return $obj;
    }

    /**
     * Remaining numbers can be either kept with their current service provider or disconnected. 'new_billing_telephone_number' is required when 'remaining_numbers_action' is 'keep'.
     *
     * @param RemainingNumbersAction|value-of<RemainingNumbersAction> $remainingNumbersAction
     */
    public function withRemainingNumbersAction(
        RemainingNumbersAction|string $remainingNumbersAction
    ): self {
        $obj = clone $this;
        $obj->remainingNumbersAction = $remainingNumbersAction instanceof RemainingNumbersAction ? $remainingNumbersAction->value : $remainingNumbersAction;

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
        $obj->type = $type instanceof PortingOrderType ? $type->value : $type;

        return $obj;
    }
}
