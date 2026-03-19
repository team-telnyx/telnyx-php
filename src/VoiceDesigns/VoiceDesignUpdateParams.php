<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the name of a voice design. All versions retain their other properties.
 *
 * @see Telnyx\Services\VoiceDesignsService::update()
 *
 * @phpstan-type VoiceDesignUpdateParamsShape = array{name: string}
 */
final class VoiceDesignUpdateParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New name for the voice design.
     */
    #[Required]
    public string $name;

    /**
     * `new VoiceDesignUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceDesignUpdateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceDesignUpdateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * New name for the voice design.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
