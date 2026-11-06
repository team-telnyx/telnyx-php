<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingAIParams;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\AssemblyAIVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\SonioxVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\ResembleVoiceSettings;
use Telnyx\XaiVoiceSettings;

/**
 * The settings associated with the voice selected.
 *
 * @phpstan-import-type ElevenLabsVoiceSettingsShape from \Telnyx\Calls\Actions\ElevenLabsVoiceSettings
 * @phpstan-import-type TelnyxVoiceSettingsShape from \Telnyx\Calls\Actions\TelnyxVoiceSettings
 * @phpstan-import-type AwsVoiceSettingsShape from \Telnyx\Calls\Actions\AwsVoiceSettings
 * @phpstan-import-type AzureVoiceSettingsShape from \Telnyx\AzureVoiceSettings
 * @phpstan-import-type ResembleVoiceSettingsShape from \Telnyx\ResembleVoiceSettings
 * @phpstan-import-type XaiVoiceSettingsShape from \Telnyx\XaiVoiceSettings
 * @phpstan-import-type SonioxVoiceSettingsShape from \Telnyx\Calls\Actions\SonioxVoiceSettings
 * @phpstan-import-type AssemblyAIVoiceSettingsShape from \Telnyx\Calls\Actions\AssemblyAIVoiceSettings
 *
 * @phpstan-type VoiceSettingsVariants = ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|AzureVoiceSettings|ResembleVoiceSettings|XaiVoiceSettings|SonioxVoiceSettings|AssemblyAIVoiceSettings
 * @phpstan-type VoiceSettingsShape = VoiceSettingsVariants|ElevenLabsVoiceSettingsShape|TelnyxVoiceSettingsShape|AwsVoiceSettingsShape|AzureVoiceSettingsShape|ResembleVoiceSettingsShape|XaiVoiceSettingsShape|SonioxVoiceSettingsShape|AssemblyAIVoiceSettingsShape
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
            'resemble' => ResembleVoiceSettings::class,
            'xai' => XaiVoiceSettings::class,
            'soniox' => SonioxVoiceSettings::class,
            'assemblyai' => AssemblyAIVoiceSettings::class,
        ];
    }
}
