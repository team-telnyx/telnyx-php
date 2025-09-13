<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type porting_order_phone_number_configuration = array{
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   emergencyAddressID?: string,
 *   messagingProfileID?: string,
 *   tags?: list<string>,
 * }
 */
final class PortingOrderPhoneNumberConfiguration implements BaseModel
{
    /** @use SdkModel<porting_order_phone_number_configuration> */
    use SdkModel;

    /**
     * identifies the billing group to set on the numbers when ported.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * identifies the connection to set on the numbers when ported.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * identifies the emergency address to set on the numbers when ported.
     */
    #[Api('emergency_address_id', optional: true)]
    public ?string $emergencyAddressID;

    /**
     * identifies the messaging profile to set on the numbers when ported.
     */
    #[Api('messaging_profile_id', optional: true)]
    public ?string $messagingProfileID;

    /** @var list<string>|null $tags */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $tags
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $emergencyAddressID = null,
        ?string $messagingProfileID = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $emergencyAddressID && $obj->emergencyAddressID = $emergencyAddressID;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    /**
     * identifies the billing group to set on the numbers when ported.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * identifies the connection to set on the numbers when ported.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * identifies the emergency address to set on the numbers when ported.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj->emergencyAddressID = $emergencyAddressID;

        return $obj;
    }

    /**
     * identifies the messaging profile to set on the numbers when ported.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }
}
