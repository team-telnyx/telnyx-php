<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionSpeakParams;

use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\AzureVoiceSettings;
use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\ResembleVoiceSettings;
use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\RimeVoiceSettings;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\MinimaxVoiceSettings;

/**
 * The settings associated with the voice selected.
 *
 * @phpstan-import-type ElevenLabsVoiceSettingsShape from \Telnyx\Calls\Actions\ElevenLabsVoiceSettings
 * @phpstan-import-type TelnyxVoiceSettingsShape from \Telnyx\Calls\Actions\TelnyxVoiceSettings
 * @phpstan-import-type AwsVoiceSettingsShape from \Telnyx\Calls\Actions\AwsVoiceSettings
 * @phpstan-import-type MinimaxVoiceSettingsShape from \Telnyx\MinimaxVoiceSettings
 * @phpstan-import-type AzureVoiceSettingsShape from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\AzureVoiceSettings
 * @phpstan-import-type RimeVoiceSettingsShape from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\RimeVoiceSettings
 * @phpstan-import-type ResembleVoiceSettingsShape from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\ResembleVoiceSettings
 *
 * @phpstan-type VoiceSettingsVariants = ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings
 * @phpstan-type VoiceSettingsShape = VoiceSettingsVariants|ElevenLabsVoiceSettingsShape|TelnyxVoiceSettingsShape|AwsVoiceSettingsShape|MinimaxVoiceSettingsShape|AzureVoiceSettingsShape|RimeVoiceSettingsShape|ResembleVoiceSettingsShape
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
            'rime' => RimeVoiceSettings::class,
            'resemble' => ResembleVoiceSettings::class,
        ];
    }
}
