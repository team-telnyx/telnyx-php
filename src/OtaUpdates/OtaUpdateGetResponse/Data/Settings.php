<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings\MobileNetworkOperatorsPreference;

/**
 * A JSON object representation of the operation. The information present here will relate directly to the source of the OTA request.
 *
 * @phpstan-type SettingsShape = array{
 *   mobile_network_operators_preferences?: list<MobileNetworkOperatorsPreference>|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * A list of mobile network operators and the priority that should be applied when the SIM is connecting to the network.
     *
     * @var list<MobileNetworkOperatorsPreference>|null $mobile_network_operators_preferences
     */
    #[Api(list: MobileNetworkOperatorsPreference::class, optional: true)]
    public ?array $mobile_network_operators_preferences;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MobileNetworkOperatorsPreference|array{
     *   mobile_network_operator_id?: string|null,
     *   mobile_network_operator_name?: string|null,
     *   priority?: int|null,
     * }> $mobile_network_operators_preferences
     */
    public static function with(
        ?array $mobile_network_operators_preferences = null
    ): self {
        $obj = new self;

        null !== $mobile_network_operators_preferences && $obj['mobile_network_operators_preferences'] = $mobile_network_operators_preferences;

        return $obj;
    }

    /**
     * A list of mobile network operators and the priority that should be applied when the SIM is connecting to the network.
     *
     * @param list<MobileNetworkOperatorsPreference|array{
     *   mobile_network_operator_id?: string|null,
     *   mobile_network_operator_name?: string|null,
     *   priority?: int|null,
     * }> $mobileNetworkOperatorsPreferences
     */
    public function withMobileNetworkOperatorsPreferences(
        array $mobileNetworkOperatorsPreferences
    ): self {
        $obj = clone $this;
        $obj['mobile_network_operators_preferences'] = $mobileNetworkOperatorsPreferences;

        return $obj;
    }
}
