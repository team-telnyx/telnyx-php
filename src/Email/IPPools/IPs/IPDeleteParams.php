<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Remove the dedicated IP from the pool. The IP is kept but carries no mail until added to a pool again. Removing the last IP requires `force=true` and `drain=true`.
 *
 * @see Telnyx\Services\Email\IPPools\IPsService::delete()
 *
 * @phpstan-type IPDeleteParamsShape = array{
 *   id: string, drain?: bool|null, force?: bool|null
 * }
 */
final class IPDeleteParams implements BaseModel
{
    /** @use SdkModel<IPDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * Set together with `force=true` to remove the last IP in the pool. Acknowledges that mail routed to the emptied pool is held until the pool has a sendable IP again.
     */
    #[Optional]
    public ?bool $drain;

    /**
     * Set together with `drain=true` to remove the last IP in the pool. Either flag alone has no effect.
     */
    #[Optional]
    public ?bool $force;

    /**
     * `new IPDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPDeleteParams)->withID(...)
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
    public static function with(
        string $id,
        ?bool $drain = null,
        ?bool $force = null
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $drain && $self['drain'] = $drain;
        null !== $force && $self['force'] = $force;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Set together with `force=true` to remove the last IP in the pool. Acknowledges that mail routed to the emptied pool is held until the pool has a sendable IP again.
     */
    public function withDrain(bool $drain): self
    {
        $self = clone $this;
        $self['drain'] = $drain;

        return $self;
    }

    /**
     * Set together with `drain=true` to remove the last IP in the pool. Either flag alone has no effect.
     */
    public function withForce(bool $force): self
    {
        $self = clone $this;
        $self['force'] = $force;

        return $self;
    }
}
