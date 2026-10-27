<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DedicatedIPShape from \Telnyx\Email\DedicatedIPs\DedicatedIP
 *
 * @phpstan-type DedicatedIPShowResponseShape = array{
 *   data: DedicatedIP|DedicatedIPShape
 * }
 */
final class DedicatedIPShowResponse implements BaseModel
{
    /** @use SdkModel<DedicatedIPShowResponseShape> */
    use SdkModel;

    /**
     * A dedicated sending IP address owned by the account.
     */
    #[Required]
    public DedicatedIP $data;

    /**
     * `new DedicatedIPShowResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DedicatedIPShowResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DedicatedIPShowResponse)->withData(...)
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
     * @param DedicatedIP|DedicatedIPShape $data
     */
    public static function with(DedicatedIP|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A dedicated sending IP address owned by the account.
     *
     * @param DedicatedIP|DedicatedIPShape $data
     */
    public function withData(DedicatedIP|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
