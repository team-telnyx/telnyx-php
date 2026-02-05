<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\NumberOrderStatusUpdate\Data;
use Telnyx\Webhooks\NumberOrderStatusUpdate\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\Webhooks\NumberOrderStatusUpdate\Data
 * @phpstan-import-type MetaShape from \Telnyx\Webhooks\NumberOrderStatusUpdate\Meta
 *
 * @phpstan-type NumberOrderStatusUpdateShape = array{
 *   data: Data|DataShape, meta: Meta|MetaShape
 * }
 */
final class NumberOrderStatusUpdate implements BaseModel
{
    /** @use SdkModel<NumberOrderStatusUpdateShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    #[Required]
    public Meta $meta;

    /**
     * `new NumberOrderStatusUpdate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberOrderStatusUpdate::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberOrderStatusUpdate)->withData(...)->withMeta(...)
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
     * @param Data|DataShape $data
     * @param Meta|MetaShape $meta
     */
    public static function with(Data|array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
