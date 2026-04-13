<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\MinimaxClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxQwen3TtsClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone;

/**
 * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
 *
 * @phpstan-import-type TelnyxQwen3TtsCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxQwen3TtsClone
 * @phpstan-import-type TelnyxUltraCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone
 * @phpstan-import-type MinimaxCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\MinimaxClone
 *
 * @phpstan-type ParamsVariants = TelnyxQwen3TtsClone|TelnyxUltraClone|MinimaxClone
 * @phpstan-type ParamsShape = ParamsVariants|TelnyxQwen3TtsCloneShape|TelnyxUltraCloneShape|MinimaxCloneShape
 */
final class Params implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            TelnyxQwen3TtsClone::class, TelnyxUltraClone::class, MinimaxClone::class,
        ];
    }
}
