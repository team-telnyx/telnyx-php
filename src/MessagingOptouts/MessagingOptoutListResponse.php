<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse\Data;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse\Meta;

/**
 * @phpstan-type MessagingOptoutListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class MessagingOptoutListResponse implements BaseModel
{
    /** @use SdkModel<MessagingOptoutListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

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
     * @param list<Data|array{
     *   createdAt?: \DateTimeInterface|null,
     *   from?: string|null,
     *   keyword?: string|null,
     *   messagingProfileID?: string|null,
     *   to?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   createdAt?: \DateTimeInterface|null,
     *   from?: string|null,
     *   keyword?: string|null,
     *   messagingProfileID?: string|null,
     *   to?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
