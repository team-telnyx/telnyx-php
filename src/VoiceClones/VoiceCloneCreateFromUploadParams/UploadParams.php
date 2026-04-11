<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\MinimaxClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxQwen3TtsClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxUltraClone;

/**
 * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
 *
 * @phpstan-import-type TelnyxQwen3TtsCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxQwen3TtsClone
 * @phpstan-import-type TelnyxUltraCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxUltraClone
 * @phpstan-import-type MinimaxCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\MinimaxClone
 *
 * @phpstan-type UploadParamsVariants = TelnyxQwen3TtsClone|TelnyxUltraClone|MinimaxClone
 * @phpstan-type UploadParamsShape = UploadParamsVariants|TelnyxQwen3TtsCloneShape|TelnyxUltraCloneShape|MinimaxCloneShape
 */
final class UploadParams implements ConverterSource
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
