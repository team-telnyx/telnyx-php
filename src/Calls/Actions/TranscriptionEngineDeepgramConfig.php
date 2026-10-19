<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxConfig;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxMultiConfig;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2SpecialtyConfig;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3MedicalConfig;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Deepgram Nova-2 specialty models: `deepgram/nova-2-medical` (medical vocabulary) and `deepgram/nova-2-phonecall` (low-bandwidth phone audio). English only.
 *
 * @phpstan-import-type DeepgramNova2ConfigShape from \Telnyx\Calls\Actions\DeepgramNova2Config
 * @phpstan-import-type DeepgramNova2SpecialtyConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2SpecialtyConfig
 * @phpstan-import-type DeepgramNova3ConfigShape from \Telnyx\Calls\Actions\DeepgramNova3Config
 * @phpstan-import-type DeepgramNova3MedicalConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3MedicalConfig
 * @phpstan-import-type DeepgramFluxConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxConfig
 * @phpstan-import-type DeepgramFluxMultiConfigShape from \Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxMultiConfig
 *
 * @phpstan-type TranscriptionEngineDeepgramConfigVariants = DeepgramNova2Config|DeepgramNova2SpecialtyConfig|DeepgramNova3Config|DeepgramNova3MedicalConfig|DeepgramFluxConfig|DeepgramFluxMultiConfig
 * @phpstan-type TranscriptionEngineDeepgramConfigShape = TranscriptionEngineDeepgramConfigVariants|DeepgramNova2ConfigShape|DeepgramNova2SpecialtyConfigShape|DeepgramNova3ConfigShape|DeepgramNova3MedicalConfigShape|DeepgramFluxConfigShape|DeepgramFluxMultiConfigShape
 */
final class TranscriptionEngineDeepgramConfig implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'transcriptionModel';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            DeepgramNova2SpecialtyConfig::class,
            'deepgram/nova-2' => DeepgramNova2Config::class,
            'deepgram/nova-3' => DeepgramNova3Config::class,
            'deepgram/nova-3-medical' => DeepgramNova3MedicalConfig::class,
            'deepgram/flux' => DeepgramFluxConfig::class,
            'deepgram/flux-multi' => DeepgramFluxMultiConfig::class,
        ];
    }
}
