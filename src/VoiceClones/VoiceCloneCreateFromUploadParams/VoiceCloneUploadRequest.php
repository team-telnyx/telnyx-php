<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\MinimaxClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxQwen3TtsClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxUltraClone;

/**
 * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
 *
 * @phpstan-import-type TelnyxQwen3TtsCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxQwen3TtsClone
 * @phpstan-import-type TelnyxUltraCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxUltraClone
 * @phpstan-import-type MinimaxCloneShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\MinimaxClone
 *
 * @phpstan-type VoiceCloneUploadRequestVariants = TelnyxQwen3TtsClone|TelnyxUltraClone|MinimaxClone
 * @phpstan-type VoiceCloneUploadRequestShape = VoiceCloneUploadRequestVariants|TelnyxQwen3TtsCloneShape|TelnyxUltraCloneShape|MinimaxCloneShape
 */
final class VoiceCloneUploadRequest implements ConverterSource
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
