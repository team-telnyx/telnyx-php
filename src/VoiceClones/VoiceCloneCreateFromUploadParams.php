<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\MinimaxClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxQwen3TtsClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxUltraClone;

/**
 * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. Maximum file size: 20MB. Reference audio is trimmed per model: Qwen3TTS and Bayan use the first 10 seconds, Ultra uses up to 60 seconds, and Minimax accepts 10 seconds to 5 minutes. Ultra clones return `202` with status `pending`; all other models return `201` with status `active`. Bayan clones require `ref_text` (the exact transcript of the reference audio) and support `ar` (default) and `en` only.
 *
 * @see Telnyx\Services\VoiceClonesService::createFromUpload()
 *
 * @phpstan-import-type VoiceCloneUploadRequestVariants from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest
 * @phpstan-import-type VoiceCloneUploadRequestShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest
 *
 * @phpstan-type VoiceCloneCreateFromUploadParamsShape = array{
 *   voiceCloneUploadRequest: VoiceCloneUploadRequestShape
 * }
 */
final class VoiceCloneCreateFromUploadParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateFromUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 20MB.
     *
     * @var VoiceCloneUploadRequestVariants $voiceCloneUploadRequest
     */
    #[Required]
    public TelnyxQwen3TtsClone|TelnyxUltraClone|TelnyxBayanClone|MinimaxClone $voiceCloneUploadRequest;

    /**
     * `new VoiceCloneCreateFromUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateFromUploadParams::with(voiceCloneUploadRequest: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateFromUploadParams)->withVoiceCloneUploadRequest(...)
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
     * @param VoiceCloneUploadRequestShape $voiceCloneUploadRequest
     */
    public static function with(
        TelnyxQwen3TtsClone|array|TelnyxUltraClone|TelnyxBayanClone|MinimaxClone $voiceCloneUploadRequest,
    ): self {
        $self = new self;

        $self['voiceCloneUploadRequest'] = $voiceCloneUploadRequest;

        return $self;
    }

    /**
     * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 20MB.
     *
     * @param VoiceCloneUploadRequestShape $voiceCloneUploadRequest
     */
    public function withVoiceCloneUploadRequest(
        TelnyxQwen3TtsClone|array|TelnyxUltraClone|TelnyxBayanClone|MinimaxClone $voiceCloneUploadRequest,
    ): self {
        $self = clone $this;
        $self['voiceCloneUploadRequest'] = $voiceCloneUploadRequest;

        return $self;
    }
}
