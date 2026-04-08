<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateResponse\Data;
use Telnyx\MetaInfo;

/**
 * @phpstan-import-type DataShape from \Telnyx\Enterprises\Reputation\Numbers\NumberAssociateResponse\Data
 * @phpstan-import-type MetaInfoShape from \Telnyx\MetaInfo
 *
 * @phpstan-type NumberAssociateResponseShape = array{
 *   data?: list<Data|DataShape>|null, meta?: null|MetaInfo|MetaInfoShape
 * }
 */
final class NumberAssociateResponse implements BaseModel
{
    /** @use SdkModel<NumberAssociateResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?MetaInfo $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|DataShape>|null $data
     * @param MetaInfo|MetaInfoShape|null $meta
     */
    public static function with(
        ?array $data = null,
        MetaInfo|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MetaInfo|MetaInfoShape $meta
     */
    public function withMeta(MetaInfo|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
