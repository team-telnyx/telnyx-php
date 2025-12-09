<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderPhoneNumberConfigurationShape = array{
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   emergencyAddressID?: string|null,
 *   messagingProfileID?: string|null,
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
    #[Optional('billing_group_id', nullable: true)]
    public ?string $billingGroupID;

    /**
     * identifies the connection to set on the numbers when ported.
     */
    #[Optional('connection_id', nullable: true)]
    public ?string $connectionID;

    /**
     * identifies the emergency address to set on the numbers when ported.
     */
    #[Optional('emergency_address_id', nullable: true)]
    public ?string $emergencyAddressID;

    /**
     * identifies the messaging profile to set on the numbers when ported.
     */
    #[Optional('messaging_profile_id', nullable: true)]
    public ?string $messagingProfileID;

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
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $emergencyAddressID = null,
        ?string $messagingProfileID = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * identifies the billing group to set on the numbers when ported.
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * identifies the connection to set on the numbers when ported.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * identifies the emergency address to set on the numbers when ported.
     */
    public function withEmergencyAddressID(?string $emergencyAddressID): self
    {
        $self = clone $this;
        $self['emergencyAddressID'] = $emergencyAddressID;

        return $self;
    }

    /**
     * identifies the messaging profile to set on the numbers when ported.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
