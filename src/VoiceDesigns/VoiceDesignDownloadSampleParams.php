<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Downloads the WAV audio sample for the voice design. Returns the latest version's sample by default, or a specific version when `?version=N` is provided. The `id` parameter accepts either a UUID or the design name.
 *
 * @see Telnyx\Services\VoiceDesignsService::downloadSample()
 *
 * @phpstan-type VoiceDesignDownloadSampleParamsShape = array{version?: int|null}
 */
final class VoiceDesignDownloadSampleParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignDownloadSampleParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specific version number to download the sample for. Defaults to the latest version.
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
     * Specific version number to download the sample for. Defaults to the latest version.
     */
    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
