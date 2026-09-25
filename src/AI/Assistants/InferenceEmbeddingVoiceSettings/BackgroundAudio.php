<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings;

use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember0;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember1;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember2;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Optional background audio to play on the call. Use a predefined media bed, or supply a looped MP3 URL. If a media URL is chosen in the portal, customers can preview it before saving.
 *
 * @phpstan-import-type UnionMember0Shape from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember1
 * @phpstan-import-type UnionMember2Shape from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember2
 *
 * @phpstan-type BackgroundAudioVariants = UnionMember0|UnionMember1|UnionMember2
 * @phpstan-type BackgroundAudioShape = BackgroundAudioVariants|UnionMember0Shape|UnionMember1Shape|UnionMember2Shape
 */
final class BackgroundAudio implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class, UnionMember2::class];
    }
}
