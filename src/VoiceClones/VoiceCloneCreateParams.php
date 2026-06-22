<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest;
use Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\MinimaxDesignClone;
use Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\TelnyxDesignClone;

/**
 * Creates a new voice clone by capturing the voice identity of an existing voice design. The clone can then be used for text-to-speech synthesis.
 *
 * @see Telnyx\Services\VoiceClonesService::create()
 *
 * @phpstan-import-type VoiceCloneRequestVariants from \Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest
 * @phpstan-import-type VoiceCloneRequestShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest
 *
 * @phpstan-type VoiceCloneCreateParamsShape = array{
 *   voiceCloneRequest: VoiceCloneRequestShape
 * }
 */
final class VoiceCloneCreateParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Request body for creating a voice clone from an existing voice design.
     *
     * @var VoiceCloneRequestVariants $voiceCloneRequest
     */
    #[Required(union: VoiceCloneRequest::class)]
    public TelnyxDesignClone|MinimaxDesignClone $voiceCloneRequest;

    /**
     * `new VoiceCloneCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateParams::with(voiceCloneRequest: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateParams)->withVoiceCloneRequest(...)
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
     * @param VoiceCloneRequestShape $voiceCloneRequest
     */
    public static function with(
        TelnyxDesignClone|array|MinimaxDesignClone $voiceCloneRequest
    ): self {
        $self = new self;

        $self['voiceCloneRequest'] = $voiceCloneRequest;

        return $self;
    }

    /**
     * Request body for creating a voice clone from an existing voice design.
     *
     * @param VoiceCloneRequestShape $voiceCloneRequest
     */
    public function withVoiceCloneRequest(
        TelnyxDesignClone|array|MinimaxDesignClone $voiceCloneRequest
    ): self {
        $self = clone $this;
        $self['voiceCloneRequest'] = $voiceCloneRequest;

        return $self;
    }
}
