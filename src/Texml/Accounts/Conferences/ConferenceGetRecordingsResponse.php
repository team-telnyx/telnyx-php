<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording\Source;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording\Status;

/**
 * @phpstan-type ConferenceGetRecordingsResponseShape = array{
 *   end?: int|null,
 *   firstPageUri?: string|null,
 *   nextPageUri?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   recordings?: list<Recording>|null,
 *   start?: int|null,
 *   uri?: string|null,
 * }
 */
final class ConferenceGetRecordingsResponse implements BaseModel
{
    /** @use SdkModel<ConferenceGetRecordingsResponseShape> */
    use SdkModel;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Optional]
    public ?int $end;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Recordings.json?page=0&pagesize=20.
     */
    #[Optional('first_page_uri')]
    public ?string $firstPageUri;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Recordings.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
     */
    #[Optional('next_page_uri')]
    public ?string $nextPageUri;

    /**
     * Current page number, zero-indexed.
     */
    #[Optional]
    public ?int $page;

    /**
     * The number of items on the page.
     */
    #[Optional('page_size')]
    public ?int $pageSize;

    /** @var list<Recording>|null $recordings */
    #[Optional(list: Recording::class)]
    public ?array $recordings;

    /**
     * The number of the first element on the page, zero-indexed.
     */
    #[Optional]
    public ?int $start;

    /**
     * The URI of the current page.
     */
    #[Optional]
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
     * @param list<Recording|array{
     *   accountSid?: string|null,
     *   callSid?: string|null,
     *   channels?: int|null,
     *   conferenceSid?: string|null,
     *   dateCreated?: string|null,
     *   dateUpdated?: string|null,
     *   duration?: int|null,
     *   errorCode?: string|null,
     *   mediaURL?: string|null,
     *   sid?: string|null,
     *   source?: value-of<Source>|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   subresourceUris?: array<string,mixed>|null,
     *   uri?: string|null,
     * }> $recordings
     */
    public static function with(
        ?int $end = null,
        ?string $firstPageUri = null,
        ?string $nextPageUri = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?array $recordings = null,
        ?int $start = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $end && $obj['end'] = $end;
        null !== $firstPageUri && $obj['firstPageUri'] = $firstPageUri;
        null !== $nextPageUri && $obj['nextPageUri'] = $nextPageUri;
        null !== $page && $obj['page'] = $page;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $recordings && $obj['recordings'] = $recordings;
        null !== $start && $obj['start'] = $start;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The number of the last element on the page, zero-indexed.
     */
    public function withEnd(int $end): self
    {
        $obj = clone $this;
        $obj['end'] = $end;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Recordings.json?page=0&pagesize=20.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $obj = clone $this;
        $obj['firstPageUri'] = $firstPageUri;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences/6dc6cc1a-1ba1-4351-86b8-4c22c95cd98f/Recordings.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
     */
    public function withNextPageUri(string $nextPageUri): self
    {
        $obj = clone $this;
        $obj['nextPageUri'] = $nextPageUri;

        return $obj;
    }

    /**
     * Current page number, zero-indexed.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * The number of items on the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * @param list<Recording|array{
     *   accountSid?: string|null,
     *   callSid?: string|null,
     *   channels?: int|null,
     *   conferenceSid?: string|null,
     *   dateCreated?: string|null,
     *   dateUpdated?: string|null,
     *   duration?: int|null,
     *   errorCode?: string|null,
     *   mediaURL?: string|null,
     *   sid?: string|null,
     *   source?: value-of<Source>|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   subresourceUris?: array<string,mixed>|null,
     *   uri?: string|null,
     * }> $recordings
     */
    public function withRecordings(array $recordings): self
    {
        $obj = clone $this;
        $obj['recordings'] = $recordings;

        return $obj;
    }

    /**
     * The number of the first element on the page, zero-indexed.
     */
    public function withStart(int $start): self
    {
        $obj = clone $this;
        $obj['start'] = $start;

        return $obj;
    }

    /**
     * The URI of the current page.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
