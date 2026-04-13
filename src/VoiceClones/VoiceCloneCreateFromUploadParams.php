<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\MinimaxClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxQwen3TtsClone;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone;

/**
 * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best results, provide 5–10 seconds of clear speech. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
 *
 * @see Telnyx\Services\VoiceClonesService::createFromUpload()
 *
 * @phpstan-import-type ParamsVariants from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params
 * @phpstan-import-type ParamsShape from \Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params
 *
 * @phpstan-type VoiceCloneCreateFromUploadParamsShape = array{params: ParamsShape}
 */
final class VoiceCloneCreateFromUploadParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateFromUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
     *
     * @var ParamsVariants $params
     */
    #[Required]
    public TelnyxQwen3TtsClone|TelnyxUltraClone|MinimaxClone $params;

    /**
     * `new VoiceCloneCreateFromUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateFromUploadParams::with(params: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateFromUploadParams)->withParams(...)
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
     * @param ParamsShape $params
     */
    public static function with(
        TelnyxQwen3TtsClone|array|TelnyxUltraClone|MinimaxClone $params
    ): self {
        $self = new self;

        $self['params'] = $params;

        return $self;
    }

    /**
     * Multipart form data for creating a voice clone from a direct audio upload. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
     *
     * @param ParamsShape $params
     */
    public function withParams(
        TelnyxQwen3TtsClone|array|TelnyxUltraClone|MinimaxClone $params
    ): self {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }
}
