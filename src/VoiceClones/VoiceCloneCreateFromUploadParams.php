<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best results, provide 5–10 seconds of clear speech. Maximum file size: 5MB for Telnyx, 20MB for Minimax.
 *
 * @see Telnyx\Services\VoiceClonesService::createFromUpload()
 *
 * @phpstan-type VoiceCloneCreateFromUploadParamsShape = array{uploadParams: mixed}
 */
final class VoiceCloneCreateFromUploadParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateFromUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public mixed $uploadParams;

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
     */
    public static function with(mixed $uploadParams): self
    {
        $self = new self;

        $self['uploadParams'] = $uploadParams;

        return $self;
    }

    public function withUploadParams(mixed $uploadParams): self
    {
        $self = clone $this;
        $self['uploadParams'] = $uploadParams;

        return $self;
    }
}
