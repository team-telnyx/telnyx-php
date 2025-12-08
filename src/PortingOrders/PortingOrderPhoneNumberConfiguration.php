<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderPhoneNumberConfigurationShape = array{
 *   billing_group_id?: string|null,
 *   connection_id?: string|null,
 *   emergency_address_id?: string|null,
 *   messaging_profile_id?: string|null,
 *   tags?: list<string>|null,
 * }
 */
final class PortingOrderPhoneNumberConfiguration implements BaseModel
{
    /** @use SdkModel<PortingOrderPhoneNumberConfigurationShape> */
    use SdkModel;

    /**
     * identifies the billing group to set on the numbers when ported.
     */
    #[Optional(nullable: true)]
    public ?string $billing_group_id;

    /**
     * identifies the connection to set on the numbers when ported.
     */
    #[Optional(nullable: true)]
    public ?string $connection_id;

    /**
     * identifies the emergency address to set on the numbers when ported.
     */
    #[Optional(nullable: true)]
    public ?string $emergency_address_id;

    /**
     * identifies the messaging profile to set on the numbers when ported.
     */
    #[Optional(nullable: true)]
    public ?string $messaging_profile_id;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
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
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?string $emergency_address_id = null,
        ?string $messaging_profile_id = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $emergency_address_id && $obj['emergency_address_id'] = $emergency_address_id;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $tags && $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * identifies the billing group to set on the numbers when ported.
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

        return $obj;
    }

    /**
     * identifies the connection to set on the numbers when ported.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * identifies the emergency address to set on the numbers when ported.
     */
    public function withEmergencyAddressID(?string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergency_address_id'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * identifies the messaging profile to set on the numbers when ported.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }
}
