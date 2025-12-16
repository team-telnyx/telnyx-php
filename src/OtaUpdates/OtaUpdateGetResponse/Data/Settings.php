<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings\MobileNetworkOperatorsPreference;

/**
 * A JSON object representation of the operation. The information present here will relate directly to the source of the OTA request.
 *
 * @phpstan-import-type MobileNetworkOperatorsPreferenceShape from \Telnyx\OtaUpdates\OtaUpdateGetResponse\Data\Settings\MobileNetworkOperatorsPreference
 *
 * @phpstan-type SettingsShape = array{
 *   mobileNetworkOperatorsPreferences?: list<MobileNetworkOperatorsPreferenceShape>|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * A list of mobile network operators and the priority that should be applied when the SIM is connecting to the network.
     *
     * @var list<MobileNetworkOperatorsPreference>|null $mobileNetworkOperatorsPreferences
     */
    #[Optional(
        'mobile_network_operators_preferences',
        list: MobileNetworkOperatorsPreference::class,
    )]
    public ?array $mobileNetworkOperatorsPreferences;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MobileNetworkOperatorsPreferenceShape> $mobileNetworkOperatorsPreferences
     */
    public static function with(
        ?array $mobileNetworkOperatorsPreferences = null
    ): self {
        $self = new self;

        null !== $mobileNetworkOperatorsPreferences && $self['mobileNetworkOperatorsPreferences'] = $mobileNetworkOperatorsPreferences;

        return $self;
    }

    /**
     * A list of mobile network operators and the priority that should be applied when the SIM is connecting to the network.
     *
     * @param list<MobileNetworkOperatorsPreferenceShape> $mobileNetworkOperatorsPreferences
     */
    public function withMobileNetworkOperatorsPreferences(
        array $mobileNetworkOperatorsPreferences
    ): self {
        $self = clone $this;
        $self['mobileNetworkOperatorsPreferences'] = $mobileNetworkOperatorsPreferences;

        return $self;
    }
}
