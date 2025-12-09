<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][].
 *
 * @phpstan-type FilterShape = array{
 *   portingOrder?: PortingOrder|null,
 *   portingPhoneNumber?: list<string>|null,
 *   userBundleID?: list<string>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('porting_order')]
    public ?PortingOrder $portingOrder;

    /**
     * Filter results by a list of porting phone number IDs.
     *
     * @var list<string>|null $portingPhoneNumber
     */
    #[Optional('porting_phone_number', list: 'string')]
    public ?array $portingPhoneNumber;

    /**
     * Filter results by a list of user bundle IDs.
     *
     * @var list<string>|null $userBundleID
     */
    #[Optional('user_bundle_id', list: 'string')]
    public ?array $userBundleID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrder|array{status?: list<value-of<Status>>|null} $portingOrder
     * @param list<string> $portingPhoneNumber
     * @param list<string> $userBundleID
     */
    public static function with(
        PortingOrder|array|null $portingOrder = null,
        ?array $portingPhoneNumber = null,
        ?array $userBundleID = null,
    ): self {
        $obj = new self;

        null !== $portingOrder && $obj['portingOrder'] = $portingOrder;
        null !== $portingPhoneNumber && $obj['portingPhoneNumber'] = $portingPhoneNumber;
        null !== $userBundleID && $obj['userBundleID'] = $userBundleID;

        return $obj;
    }

    /**
     * @param PortingOrder|array{status?: list<value-of<Status>>|null} $portingOrder
     */
    public function withPortingOrder(PortingOrder|array $portingOrder): self
    {
        $obj = clone $this;
        $obj['portingOrder'] = $portingOrder;

        return $obj;
    }

    /**
     * Filter results by a list of porting phone number IDs.
     *
     * @param list<string> $portingPhoneNumber
     */
    public function withPortingPhoneNumber(array $portingPhoneNumber): self
    {
        $obj = clone $this;
        $obj['portingPhoneNumber'] = $portingPhoneNumber;

        return $obj;
    }

    /**
     * Filter results by a list of user bundle IDs.
     *
     * @param list<string> $userBundleID
     */
    public function withUserBundleID(array $userBundleID): self
    {
        $obj = clone $this;
        $obj['userBundleID'] = $userBundleID;

        return $obj;
    }
}
