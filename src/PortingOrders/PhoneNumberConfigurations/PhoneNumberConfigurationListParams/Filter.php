<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][].
 *
 * @phpstan-type FilterShape = array{
 *   porting_order?: PortingOrder|null,
 *   porting_phone_number?: list<string>|null,
 *   user_bundle_id?: list<string>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PortingOrder $porting_order;

    /**
     * Filter results by a list of porting phone number IDs.
     *
     * @var list<string>|null $porting_phone_number
     */
    #[Api(list: 'string', optional: true)]
    public ?array $porting_phone_number;

    /**
     * Filter results by a list of user bundle IDs.
     *
     * @var list<string>|null $user_bundle_id
     */
    #[Api(list: 'string', optional: true)]
    public ?array $user_bundle_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrder|array{status?: list<value-of<Status>>|null} $porting_order
     * @param list<string> $porting_phone_number
     * @param list<string> $user_bundle_id
     */
    public static function with(
        PortingOrder|array|null $porting_order = null,
        ?array $porting_phone_number = null,
        ?array $user_bundle_id = null,
    ): self {
        $obj = new self;

        null !== $porting_order && $obj['porting_order'] = $porting_order;
        null !== $porting_phone_number && $obj['porting_phone_number'] = $porting_phone_number;
        null !== $user_bundle_id && $obj['user_bundle_id'] = $user_bundle_id;

        return $obj;
    }

    /**
     * @param PortingOrder|array{status?: list<value-of<Status>>|null} $portingOrder
     */
    public function withPortingOrder(PortingOrder|array $portingOrder): self
    {
        $obj = clone $this;
        $obj['porting_order'] = $portingOrder;

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
        $obj['porting_phone_number'] = $portingPhoneNumber;

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
        $obj['user_bundle_id'] = $userBundleID;

        return $obj;
    }
}
