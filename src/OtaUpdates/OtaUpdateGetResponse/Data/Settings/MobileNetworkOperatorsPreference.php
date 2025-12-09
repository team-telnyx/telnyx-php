<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MobileNetworkOperatorsPreferenceShape = array{
 *   mobileNetworkOperatorID?: string|null,
 *   mobileNetworkOperatorName?: string|null,
 *   priority?: int|null,
 * }
 */
final class MobileNetworkOperatorsPreference implements BaseModel
{
    /** @use SdkModel<MobileNetworkOperatorsPreferenceShape> */
    use SdkModel;

    /**
     * The mobile network operator resource identification UUID.
     */
    #[Optional('mobile_network_operator_id')]
    public ?string $mobileNetworkOperatorID;

    /**
     * The mobile network operator resource name.
     */
    #[Optional('mobile_network_operator_name')]
    public ?string $mobileNetworkOperatorName;

    /**
     * It determines what is the priority of a specific network operator that should be assumed by a SIM card when connecting to a network. The highest priority is 0, the second highest is 1 and so on.
     */
    #[Optional]
    public ?int $priority;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $mobileNetworkOperatorID = null,
        ?string $mobileNetworkOperatorName = null,
        ?int $priority = null,
    ): self {
        $self = new self;

        null !== $mobileNetworkOperatorID && $self['mobileNetworkOperatorID'] = $mobileNetworkOperatorID;
        null !== $mobileNetworkOperatorName && $self['mobileNetworkOperatorName'] = $mobileNetworkOperatorName;
        null !== $priority && $self['priority'] = $priority;

        return $self;
    }

    /**
     * The mobile network operator resource identification UUID.
     */
    public function withMobileNetworkOperatorID(
        string $mobileNetworkOperatorID
    ): self {
        $self = clone $this;
        $self['mobileNetworkOperatorID'] = $mobileNetworkOperatorID;

        return $self;
    }

    /**
     * The mobile network operator resource name.
     */
    public function withMobileNetworkOperatorName(
        string $mobileNetworkOperatorName
    ): self {
        $self = clone $this;
        $self['mobileNetworkOperatorName'] = $mobileNetworkOperatorName;

        return $self;
    }

    /**
     * It determines what is the priority of a specific network operator that should be assumed by a SIM card when connecting to a network. The highest priority is 0, the second highest is 1 and so on.
     */
    public function withPriority(int $priority): self
    {
        $self = clone $this;
        $self['priority'] = $priority;

        return $self;
    }
}
