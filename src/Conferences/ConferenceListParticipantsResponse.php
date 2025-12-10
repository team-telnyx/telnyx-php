<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\Conference;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\RecordType;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceListParticipantsResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class ConferenceListParticipantsResponse implements BaseModel
{
    /** @use SdkModel<ConferenceListParticipantsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   id: string,
     *   callControlID: string,
     *   callLegID: string,
     *   conference: Conference,
     *   createdAt: string,
     *   endConferenceOnExit: bool,
     *   muted: bool,
     *   onHold: bool,
     *   recordType: value-of<RecordType>,
     *   softEndConferenceOnExit: bool,
     *   status: value-of<Status>,
     *   updatedAt: string,
     *   whisperCallControlIDs: list<string>,
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
     * @param list<Data|array{
     *   id: string,
     *   callControlID: string,
     *   callLegID: string,
     *   conference: Conference,
     *   createdAt: string,
     *   endConferenceOnExit: bool,
     *   muted: bool,
     *   onHold: bool,
     *   recordType: value-of<RecordType>,
     *   softEndConferenceOnExit: bool,
     *   status: value-of<Status>,
     *   updatedAt: string,
     *   whisperCallControlIDs: list<string>,
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
