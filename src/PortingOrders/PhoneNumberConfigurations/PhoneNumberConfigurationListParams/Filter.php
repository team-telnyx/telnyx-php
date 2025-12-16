<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][].
 *
 * @phpstan-import-type PortingOrderShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder
 *
 * @phpstan-type FilterShape = array{
 *   portingOrder?: null|PortingOrder|PortingOrderShape,
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
     * @param PortingOrderShape $portingOrder
     * @param list<string> $portingPhoneNumber
     * @param list<string> $userBundleID
     */
    public static function with(
        PortingOrder|array|null $portingOrder = null,
        ?array $portingPhoneNumber = null,
        ?array $userBundleID = null,
    ): self {
        $self = new self;

        null !== $portingOrder && $self['portingOrder'] = $portingOrder;
        null !== $portingPhoneNumber && $self['portingPhoneNumber'] = $portingPhoneNumber;
        null !== $userBundleID && $self['userBundleID'] = $userBundleID;

        return $self;
    }

    /**
     * @param PortingOrderShape $portingOrder
     */
    public function withPortingOrder(PortingOrder|array $portingOrder): self
    {
        $self = clone $this;
        $self['portingOrder'] = $portingOrder;

        return $self;
    }

    /**
     * Filter results by a list of porting phone number IDs.
     *
     * @param list<string> $portingPhoneNumber
     */
    public function withPortingPhoneNumber(array $portingPhoneNumber): self
    {
        $self = clone $this;
        $self['portingPhoneNumber'] = $portingPhoneNumber;

        return $self;
    }

    /**
     * Filter results by a list of user bundle IDs.
     *
     * @param list<string> $userBundleID
     */
    public function withUserBundleID(array $userBundleID): self
    {
        $self = clone $this;
        $self['userBundleID'] = $userBundleID;

        return $self;
    }
}
