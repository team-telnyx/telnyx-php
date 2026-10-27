<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete the pool. Member IPs are kept but leave the pool, so they carry no mail until added to another pool. Deleting a pool changes routing for subsequently resolved messages. It does not reroute messages already assigned to the deleted pool. Deleting a pool that still has IPs requires `force=true` and `drain=true`.
 *
 * @see Telnyx\Services\Email\IPPoolsService::delete()
 *
 * @phpstan-type IPPoolDeleteParamsShape = array{
 *   drain?: bool|null, force?: bool|null
 * }
 */
final class IPPoolDeleteParams implements BaseModel
{
    /** @use SdkModel<IPPoolDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set together with `force=true` to delete a pool that still has IPs. Acknowledges deletion while the pool still has members; this flag does not reroute already queued messages.
     */
    #[Optional]
    public ?bool $drain;

    /**
     * Set together with `drain=true` to delete a pool that still has IPs. Either flag alone has no effect.
     */
    #[Optional]
    public ?bool $force;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $drain = null, ?bool $force = null): self
    {
        $self = new self;

        null !== $drain && $self['drain'] = $drain;
        null !== $force && $self['force'] = $force;

        return $self;
    }

    /**
     * Set together with `force=true` to delete a pool that still has IPs. Acknowledges deletion while the pool still has members; this flag does not reroute already queued messages.
     */
    public function withDrain(bool $drain): self
    {
        $self = clone $this;
        $self['drain'] = $drain;

        return $self;
    }

    /**
     * Set together with `drain=true` to delete a pool that still has IPs. Either flag alone has no effect.
     */
    public function withForce(bool $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }
}
