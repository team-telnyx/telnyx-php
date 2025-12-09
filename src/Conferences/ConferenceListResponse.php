<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Conferences\Conference\EndedBy;
use Telnyx\Conferences\Conference\EndReason;
use Telnyx\Conferences\Conference\RecordType;
use Telnyx\Conferences\Conference\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceListResponseShape = array{
 *   data?: list<Conference>|null, meta?: PaginationMeta|null
 * }
 */
final class ConferenceListResponse implements BaseModel
{
    /** @use SdkModel<ConferenceListResponseShape> */
    use SdkModel;

    /** @var list<Conference>|null $data */
    #[Optional(list: Conference::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Conference|array{
     *   id: string,
     *   createdAt: string,
     *   expiresAt: string,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   connectionID?: string|null,
     *   endReason?: value-of<EndReason>|null,
     *   endedBy?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Conference|array{
     *   id: string,
     *   createdAt: string,
     *   expiresAt: string,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   connectionID?: string|null,
     *   endReason?: value-of<EndReason>|null,
     *   endedBy?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
