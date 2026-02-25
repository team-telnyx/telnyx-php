<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingAIParams;

use Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings\AzureVoiceSettings;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings\ResembleVoiceSettings;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings\RimeVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * The settings associated with the voice selected.
 *
 * @phpstan-import-type ElevenLabsVoiceSettingsShape from \Telnyx\Calls\Actions\ElevenLabsVoiceSettings
 * @phpstan-import-type TelnyxVoiceSettingsShape from \Telnyx\Calls\Actions\TelnyxVoiceSettings
 * @phpstan-import-type AwsVoiceSettingsShape from \Telnyx\Calls\Actions\AwsVoiceSettings
 * @phpstan-import-type AzureVoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings\AzureVoiceSettings
 * @phpstan-import-type RimeVoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings\RimeVoiceSettings
 * @phpstan-import-type ResembleVoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings\ResembleVoiceSettings
 *
 * @phpstan-type VoiceSettingsVariants = ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings
 * @phpstan-type VoiceSettingsShape = VoiceSettingsVariants|ElevenLabsVoiceSettingsShape|TelnyxVoiceSettingsShape|AwsVoiceSettingsShape|AzureVoiceSettingsShape|RimeVoiceSettingsShape|ResembleVoiceSettingsShape
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
            'azure' => AzureVoiceSettings::class,
            'rime' => RimeVoiceSettings::class,
            'resemble' => ResembleVoiceSettings::class,
        ];
    }
}
