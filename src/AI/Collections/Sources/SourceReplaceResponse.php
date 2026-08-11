<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\AI\Collections\Sources\SourceReplaceResponse\Meta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SourceShape from \Telnyx\AI\Collections\Sources\Source
 * @phpstan-import-type MetaShape from \Telnyx\AI\Collections\Sources\SourceReplaceResponse\Meta
 *
 * @phpstan-type SourceReplaceResponseShape = array{
 *   data?: list<Source|SourceShape>|null, meta?: null|Meta|MetaShape
 * }
 */
final class SourceReplaceResponse implements BaseModel
{
    /** @use SdkModel<SourceReplaceResponseShape> */
    use SdkModel;

    /** @var list<Source>|null $data */
    #[Optional(list: Source::class)]
    public ?array $data;

    /**
     * Reports which source IDs were added, retained, and removed by a replace operation.
     */
    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Source|SourceShape>|null $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Source|SourceShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Reports which source IDs were added, retained, and removed by a replace operation.
     *
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
