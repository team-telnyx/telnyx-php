<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference\ReasonConferenceEnded;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference\Status;

/**
 * @phpstan-type ConferenceGetConferencesResponseShape = array{
 *   conferences?: list<Conference>|null,
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
     * @param list<Conference|array{
     *   accountSid?: string|null,
     *   apiVersion?: string|null,
     *   callSidEndingConference?: string|null,
     *   dateCreated?: string|null,
     *   dateUpdated?: string|null,
     *   friendlyName?: string|null,
     *   reasonConferenceEnded?: value-of<ReasonConferenceEnded>|null,
     *   region?: string|null,
     *   sid?: string|null,
     *   status?: value-of<Status>|null,
     *   subresourceUris?: array<string,mixed>|null,
     *   uri?: string|null,
     * }> $conferences
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
        $obj = new self;

        null !== $conferences && $obj['conferences'] = $conferences;
        null !== $end && $obj['end'] = $end;
        null !== $firstPageUri && $obj['firstPageUri'] = $firstPageUri;
        null !== $nextPageUri && $obj['nextPageUri'] = $nextPageUri;
        null !== $page && $obj['page'] = $page;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $start && $obj['start'] = $start;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * @param list<Conference|array{
     *   accountSid?: string|null,
     *   apiVersion?: string|null,
     *   callSidEndingConference?: string|null,
     *   dateCreated?: string|null,
     *   dateUpdated?: string|null,
     *   friendlyName?: string|null,
     *   reasonConferenceEnded?: value-of<ReasonConferenceEnded>|null,
     *   region?: string|null,
     *   sid?: string|null,
     *   status?: value-of<Status>|null,
     *   subresourceUris?: array<string,mixed>|null,
     *   uri?: string|null,
     * }> $conferences
     */
    public function withConferences(array $conferences): self
    {
        $obj = clone $this;
        $obj['conferences'] = $conferences;

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
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences.json?Page=0&PageSize=1.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $obj = clone $this;
        $obj['firstPageUri'] = $firstPageUri;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Conferences.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
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
