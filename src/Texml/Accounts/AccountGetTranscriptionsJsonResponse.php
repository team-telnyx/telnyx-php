<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse\Transcription;

/**
 * @phpstan-import-type TranscriptionShape from \Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse\Transcription
 *
 * @phpstan-type AccountGetTranscriptionsJsonResponseShape = array{
 *   end?: int|null,
 *   firstPageUri?: string|null,
 *   nextPageUri?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   previousPageUri?: string|null,
 *   start?: int|null,
 *   transcriptions?: list<Transcription|TranscriptionShape>|null,
 *   uri?: string|null,
 * }
 */
final class AccountGetTranscriptionsJsonResponse implements BaseModel
{
    /** @use SdkModel<AccountGetTranscriptionsJsonResponseShape> */
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

    /**
     * The number of the first element on the page, zero-indexed.
     */
    #[Optional]
    public ?int $start;

    /** @var list<Transcription>|null $transcriptions */
    #[Optional(list: Transcription::class)]
    public ?array $transcriptions;

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
     * @param list<Transcription|TranscriptionShape>|null $transcriptions
     */
    public static function with(
        ?int $end = null,
        ?string $firstPageUri = null,
        ?string $nextPageUri = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $previousPageUri = null,
        ?int $start = null,
        ?array $transcriptions = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $end && $self['end'] = $end;
        null !== $firstPageUri && $self['firstPageUri'] = $firstPageUri;
        null !== $nextPageUri && $self['nextPageUri'] = $nextPageUri;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $previousPageUri && $self['previousPageUri'] = $previousPageUri;
        null !== $start && $self['start'] = $start;
        null !== $transcriptions && $self['transcriptions'] = $transcriptions;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The number of the last element on the page, zero-indexed.
     */
    public function withEnd(int $end): self
    {
        $self = clone $this;
        $self['end'] = $end;

        return $self;
    }

    /**
     * Relative uri to the first page of the query results.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $self = clone $this;
        $self['firstPageUri'] = $firstPageUri;

        return $self;
    }

    /**
     * Relative uri to the next page of the query results.
     */
    public function withNextPageUri(string $nextPageUri): self
    {
        $self = clone $this;
        $self['nextPageUri'] = $nextPageUri;

        return $self;
    }

    /**
     * Current page number, zero-indexed.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * The number of items on the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Relative uri to the previous page of the query results.
     */
    public function withPreviousPageUri(string $previousPageUri): self
    {
        $self = clone $this;
        $self['previousPageUri'] = $previousPageUri;

        return $self;
    }

    /**
     * The number of the first element on the page, zero-indexed.
     */
    public function withStart(int $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

        return $self;
    }

    /**
     * @param list<Transcription|TranscriptionShape> $transcriptions
     */
    public function withTranscriptions(array $transcriptions): self
    {
        $self = clone $this;
        $self['transcriptions'] = $transcriptions;

        return $self;
    }

    /**
     * The URI of the current page.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
