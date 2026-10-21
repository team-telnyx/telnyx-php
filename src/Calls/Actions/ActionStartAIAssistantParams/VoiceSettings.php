<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\CommunityVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\SonioxVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\InworldVoiceSettings;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\ResembleVoiceSettings;
use Telnyx\XaiVoiceSettings;

/**
 * The settings of `voice`. A community engine voice requires `api_key_ref`; the other keys are the engine's own settings.
 *
 * @phpstan-import-type ElevenLabsVoiceSettingsShape from \Telnyx\Calls\Actions\ElevenLabsVoiceSettings
 * @phpstan-import-type TelnyxVoiceSettingsShape from \Telnyx\Calls\Actions\TelnyxVoiceSettings
 * @phpstan-import-type AwsVoiceSettingsShape from \Telnyx\Calls\Actions\AwsVoiceSettings
 * @phpstan-import-type MinimaxVoiceSettingsShape from \Telnyx\MinimaxVoiceSettings
 * @phpstan-import-type AzureVoiceSettingsShape from \Telnyx\AzureVoiceSettings
 * @phpstan-import-type ResembleVoiceSettingsShape from \Telnyx\ResembleVoiceSettings
 * @phpstan-import-type InworldVoiceSettingsShape from \Telnyx\InworldVoiceSettings
 * @phpstan-import-type XaiVoiceSettingsShape from \Telnyx\XaiVoiceSettings
 * @phpstan-import-type SonioxVoiceSettingsShape from \Telnyx\Calls\Actions\SonioxVoiceSettings
 * @phpstan-import-type CommunityVoiceSettingsShape from \Telnyx\Calls\Actions\CommunityVoiceSettings
 *
 * @phpstan-type VoiceSettingsVariants = ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings|SonioxVoiceSettings|CommunityVoiceSettings
 * @phpstan-type VoiceSettingsShape = VoiceSettingsVariants|ElevenLabsVoiceSettingsShape|TelnyxVoiceSettingsShape|AwsVoiceSettingsShape|MinimaxVoiceSettingsShape|AzureVoiceSettingsShape|ResembleVoiceSettingsShape|InworldVoiceSettingsShape|XaiVoiceSettingsShape|SonioxVoiceSettingsShape|CommunityVoiceSettingsShape
 */
final class VoiceSettings implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ElevenLabsVoiceSettings::class,
            TelnyxVoiceSettings::class,
            AwsVoiceSettings::class,
            MinimaxVoiceSettings::class,
            AzureVoiceSettings::class,
            ResembleVoiceSettings::class,
            InworldVoiceSettings::class,
            XaiVoiceSettings::class,
            SonioxVoiceSettings::class,
            CommunityVoiceSettings::class,
        ];
    }
}
