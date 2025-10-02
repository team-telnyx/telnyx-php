<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest;

use Telnyx\Calls\Actions\TranscriptionEngineAConfig;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Telnyx;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineDeepgramConfig;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

final class TranscriptionEngineConfig implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'transcriptionEngine';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            TranscriptionEngineDeepgramConfig::class,
            'Google' => Google::class,
            'Telnyx' => Telnyx::class,
            'A' => TranscriptionEngineAConfig::class,
            'B' => TranscriptionEngineBConfig::class,
        ];
    }
}
