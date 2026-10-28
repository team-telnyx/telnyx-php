<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IPPoolShape from \Telnyx\Email\IPPools\IPPool
 *
 * @phpstan-type IPPoolShowResponseShape = array{data: IPPool|IPPoolShape}
 */
final class IPPoolShowResponse implements BaseModel
{
    /** @use SdkModel<IPPoolShowResponseShape> */
    use SdkModel;

    /**
     * An account-scoped pool of dedicated IPs. Mail uses a pool only when the pool is scoped to the sending domain (`domain_id`) or is the account default (`is_default`).
     */
    #[Required]
    public IPPool $data;

    /**
     * `new IPPoolShowResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPPoolShowResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPPoolShowResponse)->withData(...)
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
     *
     * @param IPPool|IPPoolShape $data
     */
    public static function with(IPPool|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * An account-scoped pool of dedicated IPs. Mail uses a pool only when the pool is scoped to the sending domain (`domain_id`) or is the account default (`is_default`).
     *
     * @param IPPool|IPPoolShape $data
     */
    public function withData(IPPool|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
