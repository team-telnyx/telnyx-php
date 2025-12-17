<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2Config;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3Config;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type DeepgramNova2ConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2Config
 * @phpstan-import-type DeepgramNova3ConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3Config
 *
 * @phpstan-type TranscriptionEngineDeepgramConfigShape = DeepgramNova2ConfigShape|DeepgramNova3ConfigShape
 */
final class TranscriptionEngineDeepgramConfig implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [DeepgramNova2Config::class, DeepgramNova3Config::class];
    }
}
