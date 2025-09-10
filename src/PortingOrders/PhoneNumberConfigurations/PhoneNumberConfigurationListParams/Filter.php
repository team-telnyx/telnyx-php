<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrderStatus;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][].
 *
 * @phpstan-type filter_alias = array{
 *   portingOrderStatus?: list<value-of<PortingOrderStatus>>|null,
 *   portingPhoneNumber?: list<string>|null,
 *   userBundleID?: list<string>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter results by specific porting order statuses.
     *
     * @var list<value-of<PortingOrderStatus>>|null $portingOrderStatus
     */
    #[Api(
        'porting_order.status',
        list: PortingOrderStatus::class,
        optional: true
    )]
    public ?array $portingOrderStatus;

    /**
     * Filter results by a list of porting phone number IDs.
     *
     * @var list<string>|null $portingPhoneNumber
     */
    #[Api('porting_phone_number', list: 'string', optional: true)]
    public ?array $portingPhoneNumber;

    /**
     * Filter results by a list of user bundle IDs.
     *
     * @var list<string>|null $userBundleID
     */
    #[Api('user_bundle_id', list: 'string', optional: true)]
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
     * @param list<PortingOrderStatus|value-of<PortingOrderStatus>> $portingOrderStatus
     * @param list<string> $portingPhoneNumber
     * @param list<string> $userBundleID
     */
    public static function with(
        ?array $portingOrderStatus = null,
        ?array $portingPhoneNumber = null,
        ?array $userBundleID = null,
    ): self {
        $obj = new self;

        null !== $portingOrderStatus && $obj->portingOrderStatus = array_map(fn ($v) => $v instanceof PortingOrderStatus ? $v->value : $v, $portingOrderStatus);
        null !== $portingPhoneNumber && $obj->portingPhoneNumber = $portingPhoneNumber;
        null !== $userBundleID && $obj->userBundleID = $userBundleID;

        return $obj;
    }

    /**
     * Filter results by specific porting order statuses.
     *
     * @param list<PortingOrderStatus|value-of<PortingOrderStatus>> $portingOrderStatus
     */
    public function withPortingOrderStatus(array $portingOrderStatus): self
    {
        $obj = clone $this;
        $obj->portingOrderStatus = array_map(fn ($v) => $v instanceof PortingOrderStatus ? $v->value : $v, $portingOrderStatus);

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
        $obj->portingPhoneNumber = $portingPhoneNumber;

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
        $obj->userBundleID = $userBundleID;

        return $obj;
    }
}
