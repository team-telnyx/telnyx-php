<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IPPoolShape from \Telnyx\Email\IPPools\IPPool
 *
 * @phpstan-type IPPoolListResponseShape = array{data: list<IPPool|IPPoolShape>}
 */
final class IPPoolListResponse implements BaseModel
{
    /** @use SdkModel<IPPoolListResponseShape> */
    use SdkModel;

    /** @var list<IPPool> $data */
    #[Required(list: IPPool::class)]
    public array $data;

    /**
     * `new IPPoolListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPPoolListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPPoolListResponse)->withData(...)
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
     * @param list<IPPool|IPPoolShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<IPPool|IPPoolShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
