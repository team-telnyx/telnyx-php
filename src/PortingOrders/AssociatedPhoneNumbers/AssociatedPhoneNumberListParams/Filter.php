<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter\Action;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action].
 *
 * @phpstan-type FilterShape = array{
 *   action?: value-of<Action>|null, phone_number?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by action type.
     *
     * @var value-of<Action>|null $action
     */
    #[Optional(enum: Action::class)]
    public ?string $action;

    /**
     * Filter results by a phone number. It should be in E.164 format.
     */
    #[Optional]
    public ?string $phone_number;

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
        Action|string|null $action = null,
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    /**
     * Filter results by action type.
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
     * Filter results by a phone number. It should be in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
