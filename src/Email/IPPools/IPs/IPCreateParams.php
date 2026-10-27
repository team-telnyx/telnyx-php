<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools\IPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Add a dedicated IP to the pool with an optional routing weight. An IP can belong to one pool; to move an IP that is already in a pool, use `PATCH /email/dedicated_ips/{id}` with `pool_id`.
 *
 * @see Telnyx\Services\Email\IPPools\IPsService::create()
 *
 * @phpstan-type IPCreateParamsShape = array{
 *   dedicatedIPID: string, weight?: int|null
 * }
 */
final class IPCreateParams implements BaseModel
{
    /** @use SdkModel<IPCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The dedicated IP to add. It must belong to the account, must not be released, and must not already be in a pool.
     */
    #[Required('dedicated_ip_id')]
    public string $dedicatedIPID;

    /**
     * Relative routing weight for this IP in the pool. Positive integer; defaults to 100.
     */
    #[Optional]
    public ?int $weight;

    /**
     * `new IPCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPCreateParams::with(dedicatedIPID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPCreateParams)->withDedicatedIpid(...)
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
    public static function with(string $dedicatedIPID, ?int $weight = null): self
    {
        $self = new self;

        $self['dedicatedIPID'] = $dedicatedIPID;

        null !== $weight && $self['weight'] = $weight;

        return $self;
    }

    /**
     * The dedicated IP to add. It must belong to the account, must not be released, and must not already be in a pool.
     */
    public function withDedicatedIpid(string $dedicatedIPID): self
    {
        $self = clone $this;
        $self['dedicatedIPID'] = $dedicatedIPID;

        return $self;
    }

    /**
     * Relative routing weight for this IP in the pool. Positive integer; defaults to 100.
     */
    public function withWeight(int $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}
