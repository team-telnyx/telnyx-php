<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

/**
 * @phpstan-type conference_get_recordings_json_response = array{
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
    /** @use SdkModel<conference_get_recordings_json_response> */
    use SdkModel;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $end;

    /**
     * Relative uri to the first page of the query results.
     */
    #[Api('first_page_uri', optional: true)]
    public ?string $firstPageUri;

    /**
     * Relative uri to the next page of the query results.
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

    /**
     * Relative uri to the previous page of the query results.
     */
    #[Api('previous_page_uri', optional: true)]
    public ?string $previousPageUri;

    /** @var list<TexmlGetCallRecordingResponseBody>|null $recordings */
    #[Api(list: TexmlGetCallRecordingResponseBody::class, optional: true)]
    public ?array $recordings;

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
     * @param list<TexmlGetCallRecordingResponseBody> $recordings
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

        null !== $end && $obj->end = $end;
        null !== $firstPageUri && $obj->firstPageUri = $firstPageUri;
        null !== $nextPageUri && $obj->nextPageUri = $nextPageUri;
        null !== $page && $obj->page = $page;
        null !== $pageSize && $obj->pageSize = $pageSize;
        null !== $previousPageUri && $obj->previousPageUri = $previousPageUri;
        null !== $recordings && $obj->recordings = $recordings;
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
     * Relative uri to the first page of the query results.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $obj = clone $this;
        $obj->firstPageUri = $firstPageUri;

        return $obj;
    }

    /**
     * Relative uri to the next page of the query results.
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
     * Relative uri to the previous page of the query results.
     */
    public function withPreviousPageUri(string $previousPageUri): self
    {
        $obj = clone $this;
        $obj->previousPageUri = $previousPageUri;

        return $obj;
    }

    /**
     * @param list<TexmlGetCallRecordingResponseBody> $recordings
     */
    public function withRecordings(array $recordings): self
    {
        $obj = clone $this;
        $obj->recordings = $recordings;

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
