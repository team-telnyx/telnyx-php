<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup;

/**
 * Move the IP to another pool, or pause/resume its warm-up ramp. One change applies per request. `pool_id` takes precedence over warm-up changes. Otherwise, use `warmup_paused` or `warmup.paused`; a Boolean `warmup_paused` takes precedence. Moving the last IP out of a pool requires `force: true` and `drain: true`. The PTR hostname is managed by Telnyx: a request that includes `ptr_hostname` returns `422` unless `pool_id` or a warm-up field is present, in which case `ptr_hostname` is ignored.
 *
 * @see Telnyx\Services\Email\DedicatedIPsService::update()
 *
 * @phpstan-import-type WarmupShape from \Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup
 *
 * @phpstan-type DedicatedIPUpdateParamsShape = array{
 *   drain?: bool|null,
 *   force?: bool|null,
 *   poolID?: string|null,
 *   warmup?: null|Warmup|WarmupShape,
 *   warmupPaused?: bool|null,
 *   weight?: int|null,
 * }
 */
final class DedicatedIPUpdateParams implements BaseModel
{
    /** @use SdkModel<DedicatedIPUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set together with `force: true` to move the last IP out of its current pool. Acknowledges that mail routed to the emptied pool is held. Used only with `pool_id`.
     */
    #[Optional]
    public ?bool $drain;

    /**
     * Set together with `drain: true` to move the last IP out of its current pool. Used only with `pool_id`.
     */
    #[Optional]
    public ?bool $force;

    /**
     * Move the IP to this pool, replacing its current membership. Use the IP's current pool to change only its weight. To take an IP out of a pool, use `DELETE /email/ip_pools/{id}/ips/{ip_id}`.
     */
    #[Optional('pool_id')]
    public ?string $poolID;

    /**
     * Alias for `warmup_paused`.
     */
    #[Optional]
    public ?Warmup $warmup;

    /**
     * Pause (`true`) or resume (`false`) the warm-up ramp; equivalent to the `pause_warmup` and `resume_warmup` actions. A Boolean value takes precedence over `warmup.paused`. When a pause field is present and `pool_id` is absent, supplying neither pause field as a Boolean invokes resume.
     */
    #[Optional('warmup_paused')]
    public ?bool $warmupPaused;

    /**
     * Routing weight in the target pool. Used only with `pool_id`.
     */
    #[Optional]
    public ?int $weight;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Warmup|WarmupShape|null $warmup
     */
    public static function with(
        ?bool $drain = null,
        ?bool $force = null,
        ?string $poolID = null,
        Warmup|array|null $warmup = null,
        ?bool $warmupPaused = null,
        ?int $weight = null,
    ): self {
        $self = new self;

        null !== $drain && $self['drain'] = $drain;
        null !== $force && $self['force'] = $force;
        null !== $poolID && $self['poolID'] = $poolID;
        null !== $warmup && $self['warmup'] = $warmup;
        null !== $warmupPaused && $self['warmupPaused'] = $warmupPaused;
        null !== $weight && $self['weight'] = $weight;

        return $self;
    }

    /**
     * Set together with `force: true` to move the last IP out of its current pool. Acknowledges that mail routed to the emptied pool is held. Used only with `pool_id`.
     */
    public function withDrain(bool $drain): self
    {
        $self = clone $this;
        $self['drain'] = $drain;

        return $self;
    }

    /**
     * Set together with `drain: true` to move the last IP out of its current pool. Used only with `pool_id`.
     */
    public function withForce(bool $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }

    /**
     * Move the IP to this pool, replacing its current membership. Use the IP's current pool to change only its weight. To take an IP out of a pool, use `DELETE /email/ip_pools/{id}/ips/{ip_id}`.
     */
    public function withPoolID(string $poolID): self
    {
        $self = clone $this;
        $self['poolID'] = $poolID;

        return $self;
    }

    /**
     * Alias for `warmup_paused`.
     *
     * @param Warmup|WarmupShape $warmup
     */
    public function withWarmup(Warmup|array $warmup): self
    {
        $self = clone $this;
        $self['warmup'] = $warmup;

        return $self;
    }

    /**
     * Pause (`true`) or resume (`false`) the warm-up ramp; equivalent to the `pause_warmup` and `resume_warmup` actions. A Boolean value takes precedence over `warmup.paused`. When a pause field is present and `pool_id` is absent, supplying neither pause field as a Boolean invokes resume.
     */
    public function withWarmupPaused(bool $warmupPaused): self
    {
        $self = clone $this;
        $self['warmupPaused'] = $warmupPaused;

        return $self;
    }

    /**
     * Routing weight in the target pool. Used only with `pool_id`.
     */
    public function withWeight(int $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}
