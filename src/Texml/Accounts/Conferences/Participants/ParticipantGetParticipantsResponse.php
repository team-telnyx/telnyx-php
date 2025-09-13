<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetParticipantsResponse\Participant;

/**
 * @phpstan-type participant_get_participants_response = array{
 *   end?: int,
 *   firstPageUri?: string,
 *   nextPageUri?: string,
 *   page?: int,
 *   pageSize?: int,
 *   participants?: list<Participant>,
 *   start?: int,
 *   uri?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ParticipantGetParticipantsResponse implements BaseModel
{
    /** @use SdkModel<participant_get_participants_response> */
    use SdkModel;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $end;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Participants.json?page=0&pagesize=20.
     */
    #[Api('first_page_uri', optional: true)]
    public ?string $firstPageUri;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Participants.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
     */
    #[Api('next_page_uri', optional: true)]
    public ?string $nextPageUri;

    /**
     * Current page number, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * The number of items on the page.
     */
    #[Api('page_size', optional: true)]
    public ?int $pageSize;

    /** @var list<Participant>|null $participants */
    #[Api(list: Participant::class, optional: true)]
    public ?array $participants;

    /**
     * The number of the first element on the page, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $start;

    /**
     * The URI of the current page.
     */
    #[Api(optional: true)]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Participant> $participants
     */
    public static function with(
        ?int $end = null,
        ?string $firstPageUri = null,
        ?string $nextPageUri = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?array $participants = null,
        ?int $start = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $end && $obj->end = $end;
        null !== $firstPageUri && $obj->firstPageUri = $firstPageUri;
        null !== $nextPageUri && $obj->nextPageUri = $nextPageUri;
        null !== $page && $obj->page = $page;
        null !== $pageSize && $obj->pageSize = $pageSize;
        null !== $participants && $obj->participants = $participants;
        null !== $start && $obj->start = $start;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The number of the last element on the page, zero-indexed.
     */
    public function withEnd(int $end): self
    {
        $obj = clone $this;
        $obj->end = $end;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Participants.json?page=0&pagesize=20.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $obj = clone $this;
        $obj->firstPageUri = $firstPageUri;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Participants.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
     */
    public function withNextPageUri(string $nextPageUri): self
    {
        $obj = clone $this;
        $obj->nextPageUri = $nextPageUri;

        return $obj;
    }

    /**
     * Current page number, zero-indexed.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * The number of items on the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * @param list<Participant> $participants
     */
    public function withParticipants(array $participants): self
    {
        $obj = clone $this;
        $obj->participants = $participants;

        return $obj;
    }

    /**
     * The number of the first element on the page, zero-indexed.
     */
    public function withStart(int $start): self
    {
        $obj = clone $this;
        $obj->start = $start;

        return $obj;
    }

    /**
     * The URI of the current page.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
