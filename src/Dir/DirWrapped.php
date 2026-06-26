<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DirShape from \Telnyx\Dir\Dir
 *
 * @phpstan-type DirWrappedShape = array{data: Dir|DirShape}
 */
final class DirWrapped implements BaseModel
{
    /** @use SdkModel<DirWrappedShape> */
    use SdkModel;

    #[Required]
    public Dir $data;

    /**
     * `new DirWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirWrapped)->withData(...)
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
     * @param Dir|DirShape $data
     */
    public static function with(Dir|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Dir|DirShape $data
     */
    public function withData(Dir|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
