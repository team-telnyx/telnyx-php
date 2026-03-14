<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the latest version of a voice design, or a specific version when `?version=N` is provided. The `id` parameter accepts either a UUID or the design name.
 *
 * @see Telnyx\Services\VoiceDesignsService::retrieve()
 *
 * @phpstan-type VoiceDesignRetrieveParamsShape = array{version?: int|null}
 */
final class VoiceDesignRetrieveParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specific version number to retrieve. Defaults to the latest version.
     */
    #[Optional]
    public ?int $version;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $version = null): self
    {
        $self = new self;

        null !== $version && $self['version'] = $version;

        return $self;
    }

    /**
     * Specific version number to retrieve. Defaults to the latest version.
     */
    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
