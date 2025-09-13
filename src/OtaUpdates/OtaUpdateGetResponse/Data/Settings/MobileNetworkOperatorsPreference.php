<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type mobile_network_operators_preference = array{
 *   mobileNetworkOperatorID?: string,
 *   mobileNetworkOperatorName?: string,
 *   priority?: int,
 * }
 */
final class MobileNetworkOperatorsPreference implements BaseModel
{
    /** @use SdkModel<mobile_network_operators_preference> */
    use SdkModel;

    /**
     * The mobile network operator resource identification UUID.
     */
    #[Api('mobile_network_operator_id', optional: true)]
    public ?string $mobileNetworkOperatorID;

    /**
     * The mobile network operator resource name.
     */
    #[Api('mobile_network_operator_name', optional: true)]
    public ?string $mobileNetworkOperatorName;

    /**
     * It determines what is the priority of a specific network operator that should be assumed by a SIM card when connecting to a network. The highest priority is 0, the second highest is 1 and so on.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $mobileNetworkOperatorID && $obj->mobileNetworkOperatorID = $mobileNetworkOperatorID;
        null !== $mobileNetworkOperatorName && $obj->mobileNetworkOperatorName = $mobileNetworkOperatorName;
        null !== $priority && $obj->priority = $priority;

        return $obj;
    }

    /**
     * The mobile network operator resource identification UUID.
     */
    public function withMobileNetworkOperatorID(
        string $mobileNetworkOperatorID
    ): self {
        $obj = clone $this;
        $obj->mobileNetworkOperatorID = $mobileNetworkOperatorID;

        return $obj;
    }

    /**
     * The mobile network operator resource name.
     */
    public function withMobileNetworkOperatorName(
        string $mobileNetworkOperatorName
    ): self {
        $obj = clone $this;
        $obj->mobileNetworkOperatorName = $mobileNetworkOperatorName;

        return $obj;
    }

    /**
     * It determines what is the priority of a specific network operator that should be assumed by a SIM card when connecting to a network. The highest priority is 0, the second highest is 1 and so on.
     */
    public function withPriority(int $priority): self
    {
        $obj = clone $this;
        $obj->priority = $priority;

        return $obj;
    }
}
