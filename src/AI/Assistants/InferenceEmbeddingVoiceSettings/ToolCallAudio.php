<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings;

use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember0;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember1;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Optional sound played to the caller while the assistant runs a tool (for example a webhook or MCP tool). It replaces the background audio until the tool responds, then the background audio resumes. Defaults to null, which plays no sound; send `null` on update to clear it. Not played in conference calls.
 *
 * @phpstan-import-type UnionMember0Shape from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember1
 *
 * @phpstan-type ToolCallAudioVariants = UnionMember0|UnionMember1
 * @phpstan-type ToolCallAudioShape = ToolCallAudioVariants|UnionMember0Shape|UnionMember1Shape
 */
final class ToolCallAudio implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class];
    }
}
