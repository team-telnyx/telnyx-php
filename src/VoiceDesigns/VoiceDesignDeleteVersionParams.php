<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently deletes a specific version of a voice design. The version number must be a positive integer.
 *
 * @see Telnyx\Services\VoiceDesignsService::deleteVersion()
 *
 * @phpstan-type VoiceDesignDeleteVersionParamsShape = array{id: string}
 */
final class VoiceDesignDeleteVersionParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignDeleteVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new VoiceDesignDeleteVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceDesignDeleteVersionParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceDesignDeleteVersionParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
