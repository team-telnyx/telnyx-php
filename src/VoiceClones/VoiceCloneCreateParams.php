<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\TelnyxDesignClone;

/**
 * Creates a new voice clone by capturing the voice identity of an existing voice design. The clone can then be used for text-to-speech synthesis.
 *
 * @see Telnyx\Services\VoiceClonesService::create()
 *
 * @phpstan-import-type ParamsVariants from \Telnyx\VoiceClones\VoiceCloneCreateParams\Params
 * @phpstan-import-type ParamsShape from \Telnyx\VoiceClones\VoiceCloneCreateParams\Params
 *
 * @phpstan-type VoiceCloneCreateParamsShape = array{params: ParamsShape}
 */
final class VoiceCloneCreateParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Request body for creating a voice clone from an existing voice design.
     *
     * @var ParamsVariants $params
     */
    #[Required(union: Params::class)]
    public TelnyxDesignClone|MinimaxDesignClone $params;

    /**
     * `new VoiceCloneCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateParams::with(params: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateParams)->withParams(...)
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
        TelnyxDesignClone|array|MinimaxDesignClone $params
    ): self {
        $self = new self;

        $self['params'] = $params;

        return $self;
    }

    /**
     * Request body for creating a voice clone from an existing voice design.
     *
     * @param ParamsShape $params
     */
    public function withParams(
        TelnyxDesignClone|array|MinimaxDesignClone $params
    ): self {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }
}
