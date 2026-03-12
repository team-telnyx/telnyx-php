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
 * @see Telnyx\Services\VoiceDesignsService::rename()
 *
 * @phpstan-type VoiceDesignRenameParamsShape = array{name: string}
 */
final class VoiceDesignRenameParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignRenameParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New name for the voice design.
     */
    #[Required]
    public string $name;

    /**
     * `new VoiceDesignRenameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceDesignRenameParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceDesignRenameParams)->withName(...)
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
