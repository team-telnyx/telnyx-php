<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\Keys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Kvs\Keys\KeyListResponse\Data;
use Telnyx\Storage\Kvs\Keys\KeyListResponse\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\Storage\Kvs\Keys\KeyListResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\Storage\Kvs\Keys\KeyListResponse\Meta
 *
 * @phpstan-type KeyListResponseShape = array{
 *   data?: list<Data|DataShape>|null,
 *   meta?: null|Meta|MetaShape,
 *   recordType?: string|null,
 * }
 */
final class KeyListResponse implements BaseModel
{
    /** @use SdkModel<KeyListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    #[Optional('record_type')]
    public ?string $recordType;

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
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null,
        ?string $recordType = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;
        null !== $recordType && $self['recordType'] = $recordType;

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
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
