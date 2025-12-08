<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MobileNetworkOperatorsPreferenceShape = array{
 *   mobile_network_operator_id?: string|null,
 *   mobile_network_operator_name?: string|null,
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
    #[Optional]
    public ?string $mobile_network_operator_id;

    /**
     * The mobile network operator resource name.
     */
    #[Optional]
    public ?string $mobile_network_operator_name;

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
        ?string $mobile_network_operator_id = null,
        ?string $mobile_network_operator_name = null,
        ?int $priority = null,
    ): self {
        $obj = new self;

        null !== $mobile_network_operator_id && $obj['mobile_network_operator_id'] = $mobile_network_operator_id;
        null !== $mobile_network_operator_name && $obj['mobile_network_operator_name'] = $mobile_network_operator_name;
        null !== $priority && $obj['priority'] = $priority;

        return $obj;
    }

    /**
     * The mobile network operator resource identification UUID.
     */
    public function withMobileNetworkOperatorID(
        string $mobileNetworkOperatorID
    ): self {
        $obj = clone $this;
        $obj['mobile_network_operator_id'] = $mobileNetworkOperatorID;

        return $obj;
    }

    /**
     * The mobile network operator resource name.
     */
    public function withMobileNetworkOperatorName(
        string $mobileNetworkOperatorName
    ): self {
        $obj = clone $this;
        $obj['mobile_network_operator_name'] = $mobileNetworkOperatorName;

        return $obj;
    }

    /**
     * It determines what is the priority of a specific network operator that should be assumed by a SIM card when connecting to a network. The highest priority is 0, the second highest is 1 and so on.
     */
    public function withPriority(int $priority): self
    {
        $obj = clone $this;
        $obj['priority'] = $priority;

        return $obj;
    }
}
