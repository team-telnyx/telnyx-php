<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfileMetrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\MessagingPaginationMeta;

/**
 * @phpstan-import-type MessagingPaginationMetaShape from \Telnyx\MessagingPaginationMeta
 *
 * @phpstan-type MessagingProfileMetricListResponseShape = array{
 *   data?: list<array<string,mixed>>|null,
 *   meta?: null|MessagingPaginationMeta|MessagingPaginationMetaShape,
 * }
 */
final class MessagingProfileMetricListResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileMetricListResponseShape> */
    use SdkModel;

    /** @var list<array<string,mixed>>|null $data */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $data;

    #[Optional]
    public ?MessagingPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<array<string,mixed>>|null $data
     * @param MessagingPaginationMeta|MessagingPaginationMetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        MessagingPaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingPaginationMeta|MessagingPaginationMetaShape $meta
     */
    public function withMeta(MessagingPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
