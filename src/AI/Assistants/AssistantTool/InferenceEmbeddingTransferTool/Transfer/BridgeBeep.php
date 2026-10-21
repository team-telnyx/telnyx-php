<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\BridgeBeep\TargetLegs;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Plays a short beep once the transfer completes and the calls are bridged, so the transfer destination knows the caller is now on the line. The warm transfer message plays before the bridge; this marks the moment the caller actually joins. Works with and without `warm_transfer_acceptance`.
 *
 * @phpstan-type BridgeBeepShape = array{
 *   enabled?: bool|null, targetLegs?: null|TargetLegs|value-of<TargetLegs>
 * }
 */
final class BridgeBeep implements BaseModel
{
    /** @use SdkModel<BridgeBeepShape> */
    use SdkModel;

    /**
     * Whether to play the beep when the calls are bridged.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Who hears the beep. `self` plays it to the transfer destination only; `both` plays it to the destination and the original caller.
     *
     * @var value-of<TargetLegs>|null $targetLegs
     */
    #[Optional('target_legs', enum: TargetLegs::class)]
    public ?string $targetLegs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TargetLegs|value-of<TargetLegs>|null $targetLegs
     */
    public static function with(
        ?bool $enabled = null,
        TargetLegs|string|null $targetLegs = null
    ): self {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;
        null !== $targetLegs && $self['targetLegs'] = $targetLegs;

        return $self;
    }

    /**
     * Whether to play the beep when the calls are bridged.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Who hears the beep. `self` plays it to the transfer destination only; `both` plays it to the destination and the original caller.
     *
     * @param TargetLegs|value-of<TargetLegs> $targetLegs
     */
    public function withTargetLegs(TargetLegs|string $targetLegs): self
    {
        $self = clone $this;
        $self['targetLegs'] = $targetLegs;

        return $self;
    }
}
