<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference;

/**
 * @phpstan-import-type ConferenceShape from \Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference
 *
 * @phpstan-type ConferenceGetConferencesResponseShape = array{
 *   conferences?: list<ConferenceShape>|null,
 *   end?: int|null,
 *   firstPageUri?: string|null,
 *   nextPageUri?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   start?: int|null,
 *   uri?: string|null,
 * }
 */
final class ConferenceGetConferencesResponse implements BaseModel
{
    /** @use SdkModel<ConferenceGetConferencesResponseShape> */
    use SdkModel;

    /** @var list<Conference>|null $conferences */
    #[Optional(list: Conference::class)]
    public ?array $conferences;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Optional]
    public ?int $end;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences.json?Page=0&PageSize=1.
     */
    #[Optional('first_page_uri')]
    public ?string $firstPageUri;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
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
     * @param list<ConferenceShape>|null $conferences
     */
    public static function with(
        ?array $conferences = null,
        ?int $end = null,
        ?string $firstPageUri = null,
        ?string $nextPageUri = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?int $start = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $conferences && $self['conferences'] = $conferences;
        null !== $end && $self['end'] = $end;
        null !== $firstPageUri && $self['firstPageUri'] = $firstPageUri;
        null !== $nextPageUri && $self['nextPageUri'] = $nextPageUri;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $start && $self['start'] = $start;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * @param list<ConferenceShape> $conferences
     */
    public function withConferences(array $conferences): self
    {
        $self = clone $this;
        $self['conferences'] = $conferences;

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
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences.json?Page=0&PageSize=1.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $self = clone $this;
        $self['firstPageUri'] = $firstPageUri;

        return $self;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
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
     * The number of the first element on the page, zero-indexed.
     */
    public function withStart(int $start): self
    {
        $self = clone $this;
        $self['start'] = $start;

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
