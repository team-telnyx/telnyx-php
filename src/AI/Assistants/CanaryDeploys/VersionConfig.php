<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for a single version in canary deploy.
 *
 * @phpstan-type VersionConfigShape = array{percentage: float, versionID: string}
 */
final class VersionConfig implements BaseModel
{
    /** @use SdkModel<VersionConfigShape> */
    use SdkModel;

    /**
     * Percentage of traffic for this version [1-99].
     */
    #[Required]
    public float $percentage;

    /**
     * Version ID string that references assistant_versions.version_id.
     */
    #[Required('version_id')]
    public string $versionID;

    /**
     * `new VersionConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionConfig::with(percentage: ..., versionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionConfig)->withPercentage(...)->withVersionID(...)
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
    public static function with(float $percentage, string $versionID): self
    {
        $self = new self;

        $self['percentage'] = $percentage;
        $self['versionID'] = $versionID;

        return $self;
    }

    /**
     * Percentage of traffic for this version [1-99].
     */
    public function withPercentage(float $percentage): self
    {
        $self = clone $this;
        $self['percentage'] = $percentage;

        return $self;
    }

    /**
     * Version ID string that references assistant_versions.version_id.
     */
    public function withVersionID(string $versionID): self
    {
        $self = clone $this;
        $self['versionID'] = $versionID;

        return $self;
    }
}
