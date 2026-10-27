<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DedicatedIPShape from \Telnyx\Email\DedicatedIPs\DedicatedIP
 *
 * @phpstan-type DedicatedIPListResponseShape = array{
 *   data: list<DedicatedIP|DedicatedIPShape>
 * }
 */
final class DedicatedIPListResponse implements BaseModel
{
    /** @use SdkModel<DedicatedIPListResponseShape> */
    use SdkModel;

    /** @var list<DedicatedIP> $data */
    #[Required(list: DedicatedIP::class)]
    public array $data;

    /**
     * `new DedicatedIPListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DedicatedIPListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DedicatedIPListResponse)->withData(...)
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
     * @param list<DedicatedIP|DedicatedIPShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<DedicatedIP|DedicatedIPShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
