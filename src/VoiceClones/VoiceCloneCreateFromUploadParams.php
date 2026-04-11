<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\MinimaxClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxQwen3TtsClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxUltraClone;

/**
 * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best results, provide 5–10 seconds of clear speech. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
 *
 * @see Telnyx\Services\VoiceClonesService::createFromUpload()
 *
 * @phpstan-import-type UploadParamsVariants from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams
 * @phpstan-import-type UploadParamsShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams
 *
 * @phpstan-type VoiceCloneCreateFromUploadParamsShape = array{
 *   uploadParams: UploadParamsShape
 * }
 */
final class VoiceCloneCreateFromUploadParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateFromUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
     *
     * @var UploadParamsVariants $uploadParams
     */
    #[Required]
    public TelnyxQwen3TtsClone|TelnyxUltraClone|MinimaxClone $uploadParams;

    /**
     * `new VoiceCloneCreateFromUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateFromUploadParams::with(uploadParams: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateFromUploadParams)->withUploadParams(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UploadParamsShape $uploadParams
     */
    public static function with(
        TelnyxQwen3TtsClone|array|TelnyxUltraClone|MinimaxClone $uploadParams
    ): self {
        $self = new self;

        $self['uploadParams'] = $uploadParams;

        return $self;
    }

    /**
     * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
     *
     * @param UploadParamsShape $uploadParams
     */
    public function withUploadParams(
        TelnyxQwen3TtsClone|array|TelnyxUltraClone|MinimaxClone $uploadParams
    ): self {
        $self = clone $this;
        $self['uploadParams'] = $uploadParams;

        return $self;
    }
}
