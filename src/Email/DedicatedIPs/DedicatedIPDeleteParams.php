<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Release the dedicated IP to Telnyx. The IP stops carrying mail immediately, leaves its pool, and moves to `released`. Telnyx sets `quarantine_until` to 30 days after release. Release requests that the MRC stop asynchronously. Check `billing`: `stopping` means the stop is pending, `stopped` means it completed, and `stop_failed` means the charge remains. If the charge was never created or its creation has not completed, `billing` keeps showing the creation status (`not_started`, `pending`, `in_progress`, or `failed`). Any status except `released` can be released. Releasing the last IP in a pool requires `force=true` and `drain=true`.
 *
 * @see Telnyx\Services\Email\DedicatedIPsService::delete()
 *
 * @phpstan-type DedicatedIPDeleteParamsShape = array{
 *   drain?: bool|null, force?: bool|null, reason?: string|null
 * }
 */
final class DedicatedIPDeleteParams implements BaseModel
{
    /** @use SdkModel<DedicatedIPDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set together with `force: true` to release the last IP in a pool. Acknowledges that mail routed to the emptied pool is held until the pool has a sendable IP again.
     */
    #[Optional]
    public ?bool $drain;

    /**
     * Set together with `drain: true` to release the last IP in a pool. Either flag alone has no effect.
     */
    #[Optional]
    public ?bool $force;

    /**
     * Free-text reason recorded with the release.
     */
    #[Optional]
    public ?string $reason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $drain = null,
        ?bool $force = null,
        ?string $reason = null
    ): self {
        $self = new self;

        null !== $drain && $self['drain'] = $drain;
        null !== $force && $self['force'] = $force;
        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * Set together with `force: true` to release the last IP in a pool. Acknowledges that mail routed to the emptied pool is held until the pool has a sendable IP again.
     */
    public function withDrain(bool $drain): self
    {
        $self = clone $this;
        $self['drain'] = $drain;

        return $self;
    }

    /**
     * Set together with `drain: true` to release the last IP in a pool. Either flag alone has no effect.
     */
    public function withForce(bool $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }

    /**
     * Free-text reason recorded with the release.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
