<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

/**
 * @phpstan-type ConferenceGetRecordingsJsonResponseShape = array{
 *   end?: int|null,
 *   first_page_uri?: string|null,
 *   next_page_uri?: string|null,
 *   page?: int|null,
 *   page_size?: int|null,
 *   previous_page_uri?: string|null,
 *   recordings?: list<TexmlGetCallRecordingResponseBody>|null,
 *   start?: int|null,
 *   uri?: string|null,
 * }
 */
final class ConferenceGetRecordingsJsonResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ConferenceGetRecordingsJsonResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $end;

    /**
     * Relative uri to the first page of the query results.
     */
    #[Api(optional: true)]
    public ?string $first_page_uri;

    /**
     * Relative uri to the next page of the query results.
     */
    #[Api(optional: true)]
    public ?string $next_page_uri;

    /**
     * Current page number, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * The number of items on the page.
     */
    #[Api(optional: true)]
    public ?int $page_size;

    /**
     * Relative uri to the previous page of the query results.
     */
    #[Api(optional: true)]
    public ?string $previous_page_uri;

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
        ?string $first_page_uri = null,
        ?string $next_page_uri = null,
        ?int $page = null,
        ?int $page_size = null,
        ?string $previous_page_uri = null,
        ?array $recordings = null,
        ?int $start = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $end && $obj->end = $end;
        null !== $first_page_uri && $obj->first_page_uri = $first_page_uri;
        null !== $next_page_uri && $obj->next_page_uri = $next_page_uri;
        null !== $page && $obj->page = $page;
        null !== $page_size && $obj->page_size = $page_size;
        null !== $previous_page_uri && $obj->previous_page_uri = $previous_page_uri;
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
        $obj->first_page_uri = $firstPageUri;

        return $obj;
    }

    /**
     * Relative uri to the next page of the query results.
     */
    public function withNextPageUri(string $nextPageUri): self
    {
        $obj = clone $this;
        $obj->next_page_uri = $nextPageUri;

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
        $obj->page_size = $pageSize;

        return $obj;
    }

    /**
     * Relative uri to the previous page of the query results.
     */
    public function withPreviousPageUri(string $previousPageUri): self
    {
        $obj = clone $this;
        $obj->previous_page_uri = $previousPageUri;

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
