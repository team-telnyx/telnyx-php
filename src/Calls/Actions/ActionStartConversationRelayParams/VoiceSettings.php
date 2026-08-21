<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\InworldVoiceSettings;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\ResembleVoiceSettings;
use Telnyx\XaiVoiceSettings;

/**
 * The settings associated with the voice selected.
 *
 * @phpstan-import-type ElevenLabsVoiceSettingsShape from \Telnyx\Calls\Actions\ElevenLabsVoiceSettings
 * @phpstan-import-type TelnyxVoiceSettingsShape from \Telnyx\Calls\Actions\TelnyxVoiceSettings
 * @phpstan-import-type AwsVoiceSettingsShape from \Telnyx\Calls\Actions\AwsVoiceSettings
 * @phpstan-import-type MinimaxVoiceSettingsShape from \Telnyx\MinimaxVoiceSettings
 * @phpstan-import-type AzureVoiceSettingsShape from \Telnyx\AzureVoiceSettings
 * @phpstan-import-type ResembleVoiceSettingsShape from \Telnyx\ResembleVoiceSettings
 * @phpstan-import-type InworldVoiceSettingsShape from \Telnyx\InworldVoiceSettings
 * @phpstan-import-type XaiVoiceSettingsShape from \Telnyx\XaiVoiceSettings
 *
 * @phpstan-type VoiceSettingsVariants = ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings
 * @phpstan-type VoiceSettingsShape = VoiceSettingsVariants|ElevenLabsVoiceSettingsShape|TelnyxVoiceSettingsShape|AwsVoiceSettingsShape|MinimaxVoiceSettingsShape|AzureVoiceSettingsShape|ResembleVoiceSettingsShape|InworldVoiceSettingsShape|XaiVoiceSettingsShape
 */
final class VoiceSettings implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'elevenlabs' => ElevenLabsVoiceSettings::class,
            'telnyx' => TelnyxVoiceSettings::class,
            'aws' => AwsVoiceSettings::class,
            'minimax' => MinimaxVoiceSettings::class,
            'azure' => AzureVoiceSettings::class,
            'resemble' => ResembleVoiceSettings::class,
            'inworld' => InworldVoiceSettings::class,
            'xai' => XaiVoiceSettings::class,
        ];
    }
}
