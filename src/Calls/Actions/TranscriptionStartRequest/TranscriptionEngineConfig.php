<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest;

use Telnyx\Calls\Actions\TranscriptionEngineAConfig;
use Telnyx\Calls\Actions\TranscriptionEngineAzureConfig;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig;
use Telnyx\Calls\Actions\TranscriptionEngineGoogleConfig;
use Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type TranscriptionEngineGoogleConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineGoogleConfig
 * @phpstan-import-type TranscriptionEngineTelnyxConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig
 * @phpstan-import-type DeepgramNova2ConfigShape from \Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config
 * @phpstan-import-type DeepgramNova3ConfigShape from \Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config
 * @phpstan-import-type TranscriptionEngineAzureConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineAzureConfig
 * @phpstan-import-type TranscriptionEngineAConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineAConfig
 * @phpstan-import-type TranscriptionEngineBConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineBConfig
 *
 * @phpstan-type TranscriptionEngineConfigShape = TranscriptionEngineGoogleConfigShape|TranscriptionEngineTelnyxConfigShape|DeepgramNova2ConfigShape|DeepgramNova3ConfigShape|TranscriptionEngineAzureConfigShape|TranscriptionEngineAConfigShape|TranscriptionEngineBConfigShape
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
            DeepgramNova2Config::class,
            DeepgramNova3Config::class,
            'Google' => TranscriptionEngineGoogleConfig::class,
            'Telnyx' => TranscriptionEngineTelnyxConfig::class,
            'Azure' => TranscriptionEngineAzureConfig::class,
            'A' => TranscriptionEngineAConfig::class,
            'B' => TranscriptionEngineBConfig::class,
        ];
    }
}
