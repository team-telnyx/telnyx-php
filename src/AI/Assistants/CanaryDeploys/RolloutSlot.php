<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One slot in a percentage rollout.
 *
 * @phpstan-type RolloutSlotShape = array{versionID: string, weight: float}
 */
final class RolloutSlot implements BaseModel
{
    /** @use SdkModel<RolloutSlotShape> */
    use SdkModel;

    #[Required('version_id')]
    public string $versionID;

    #[Required]
    public float $weight;

    /**
     * `new RolloutSlot()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RolloutSlot::with(versionID: ..., weight: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RolloutSlot)->withVersionID(...)->withWeight(...)
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
    public static function with(string $versionID, float $weight): self
    {
        $self = new self;

        $self['versionID'] = $versionID;
        $self['weight'] = $weight;

        return $self;
    }

    public function withVersionID(string $versionID): self
    {
        $self = clone $this;
        $self['versionID'] = $versionID;

        return $self;
    }

    public function withWeight(float $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}
