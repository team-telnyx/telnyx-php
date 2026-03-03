<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams;

use Telnyx\Calls\Actions\DeepgramNova2Config;
use Telnyx\Calls\Actions\DeepgramNova3Config;
use Telnyx\Calls\Actions\TranscriptionEngineAConfig;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig;
use Telnyx\Calls\Actions\TranscriptionEngineGoogleConfig;
use Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type TranscriptionEngineGoogleConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineGoogleConfig
 * @phpstan-import-type TranscriptionEngineTelnyxConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig
 * @phpstan-import-type TranscriptionEngineAzureConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineAzureConfig
 * @phpstan-import-type TranscriptionEngineAConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineAConfig
 * @phpstan-import-type TranscriptionEngineBConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineBConfig
 * @phpstan-import-type DeepgramNova2ConfigShape from \Telnyx\Calls\Actions\DeepgramNova2Config
 * @phpstan-import-type DeepgramNova3ConfigShape from \Telnyx\Calls\Actions\DeepgramNova3Config
 *
 * @phpstan-type TranscriptionEngineConfigVariants = TranscriptionEngineGoogleConfig|TranscriptionEngineTelnyxConfig|TranscriptionEngineAzureConfig|TranscriptionEngineAConfig|TranscriptionEngineBConfig|DeepgramNova2Config|DeepgramNova3Config
 * @phpstan-type TranscriptionEngineConfigShape = TranscriptionEngineConfigVariants|TranscriptionEngineGoogleConfigShape|TranscriptionEngineTelnyxConfigShape|TranscriptionEngineAzureConfigShape|TranscriptionEngineAConfigShape|TranscriptionEngineBConfigShape|DeepgramNova2ConfigShape|DeepgramNova3ConfigShape
 */
final class TranscriptionEngineConfig implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'transcriptionEngine';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'Google' => TranscriptionEngineGoogleConfig::class,
            'Telnyx' => TranscriptionEngineTelnyxConfig::class,
            'Azure' => TranscriptionEngineAzureConfig::class,
            'A' => TranscriptionEngineAConfig::class,
            'B' => TranscriptionEngineBConfig::class,
            'deepgram/nova-2' => DeepgramNova2Config::class,
            'deepgram/nova-3' => DeepgramNova3Config::class,
        ];
    }
}
