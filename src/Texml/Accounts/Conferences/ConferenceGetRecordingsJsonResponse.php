<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Source;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Status;
use Telnyx\Texml\Accounts\TexmlRecordingSubresourcesUris;

/**
 * @phpstan-type ConferenceGetRecordingsJsonResponseShape = array{
 *   end?: int|null,
 *   firstPageUri?: string|null,
 *   nextPageUri?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   previousPageUri?: string|null,
 *   recordings?: list<TexmlGetCallRecordingResponseBody>|null,
 *   start?: int|null,
 *   uri?: string|null,
 * }
 */
final class ConferenceGetRecordingsJsonResponse implements BaseModel
{
    /** @use SdkModel<ConferenceGetRecordingsJsonResponseShape> */
    use SdkModel;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Optional]
    public ?int $end;

    /**
     * Relative uri to the first page of the query results.
     */
    #[Optional('first_page_uri')]
    public ?string $firstPageUri;

    /**
     * Relative uri to the next page of the query results.
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

    /**
     * Relative uri to the previous page of the query results.
     */
    #[Optional('previous_page_uri')]
    public ?string $previousPageUri;

    /** @var list<TexmlGetCallRecordingResponseBody>|null $recordings */
    #[Optional(list: TexmlGetCallRecordingResponseBody::class)]
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
     * @param list<TexmlGetCallRecordingResponseBody|array{
     *   accountSid?: string|null,
     *   callSid?: string|null,
     *   channels?: 1|2|null,
     *   conferenceSid?: string|null,
     *   dateCreated?: \DateTimeInterface|null,
     *   dateUpdated?: \DateTimeInterface|null,
     *   duration?: string|null,
     *   errorCode?: string|null,
     *   mediaURL?: string|null,
     *   sid?: string|null,
     *   source?: value-of<Source>|null,
     *   startTime?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   subresourcesUris?: TexmlRecordingSubresourcesUris|null,
     *   uri?: string|null,
     * }> $recordings
     */
    public static function with(
        ?int $end = null,
        ?string $firstPageUri = null,
        ?string $nextPageUri = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $previousPageUri = null,
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
        null !== $previousPageUri && $obj['previousPageUri'] = $previousPageUri;
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
     * Relative uri to the first page of the query results.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $obj = clone $this;
        $obj['firstPageUri'] = $firstPageUri;

        return $obj;
    }

    /**
     * Relative uri to the next page of the query results.
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
     * Relative uri to the previous page of the query results.
     */
    public function withPreviousPageUri(string $previousPageUri): self
    {
        $obj = clone $this;
        $obj['previousPageUri'] = $previousPageUri;

        return $obj;
    }

    /**
     * @param list<TexmlGetCallRecordingResponseBody|array{
     *   accountSid?: string|null,
     *   callSid?: string|null,
     *   channels?: 1|2|null,
     *   conferenceSid?: string|null,
     *   dateCreated?: \DateTimeInterface|null,
     *   dateUpdated?: \DateTimeInterface|null,
     *   duration?: string|null,
     *   errorCode?: string|null,
     *   mediaURL?: string|null,
     *   sid?: string|null,
     *   source?: value-of<Source>|null,
     *   startTime?: \DateTimeInterface|null,
     *   status?: value-of<Status>|null,
     *   subresourcesUris?: TexmlRecordingSubresourcesUris|null,
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
