<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call\AnsweredBy;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call\Direction;
use Telnyx\Texml\Accounts\Calls\CallGetCallsResponse\Call\Status;

/**
 * @phpstan-type CallGetCallsResponseShape = array{
 *   calls?: list<Call>|null,
 *   end?: int|null,
 *   first_page_uri?: string|null,
 *   next_page_uri?: string|null,
 *   page?: int|null,
 *   page_size?: int|null,
 *   start?: int|null,
 *   uri?: string|null,
 * }
 */
final class CallGetCallsResponse implements BaseModel
{
    /** @use SdkModel<CallGetCallsResponseShape> */
    use SdkModel;

    /** @var list<Call>|null $calls */
    #[Api(list: Call::class, optional: true)]
    public ?array $calls;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Api(optional: true)]
    public ?int $end;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=0&PageSize=1.
     */
    #[Api(optional: true)]
    public ?string $first_page_uri;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
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
     * @param list<Call|array{
     *   account_sid?: string|null,
     *   answered_by?: value-of<AnsweredBy>|null,
     *   caller_name?: string|null,
     *   date_created?: string|null,
     *   date_updated?: string|null,
     *   direction?: value-of<Direction>|null,
     *   duration?: string|null,
     *   end_time?: string|null,
     *   from?: string|null,
     *   from_formatted?: string|null,
     *   price?: string|null,
     *   price_unit?: string|null,
     *   sid?: string|null,
     *   start_time?: string|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   to_formatted?: string|null,
     *   uri?: string|null,
     * }> $calls
     */
    public static function with(
        ?array $calls = null,
        ?int $end = null,
        ?string $first_page_uri = null,
        ?string $next_page_uri = null,
        ?int $page = null,
        ?int $page_size = null,
        ?int $start = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $calls && $obj['calls'] = $calls;
        null !== $end && $obj['end'] = $end;
        null !== $first_page_uri && $obj['first_page_uri'] = $first_page_uri;
        null !== $next_page_uri && $obj['next_page_uri'] = $next_page_uri;
        null !== $page && $obj['page'] = $page;
        null !== $page_size && $obj['page_size'] = $page_size;
        null !== $start && $obj['start'] = $start;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * @param list<Call|array{
     *   account_sid?: string|null,
     *   answered_by?: value-of<AnsweredBy>|null,
     *   caller_name?: string|null,
     *   date_created?: string|null,
     *   date_updated?: string|null,
     *   direction?: value-of<Direction>|null,
     *   duration?: string|null,
     *   end_time?: string|null,
     *   from?: string|null,
     *   from_formatted?: string|null,
     *   price?: string|null,
     *   price_unit?: string|null,
     *   sid?: string|null,
     *   start_time?: string|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   to_formatted?: string|null,
     *   uri?: string|null,
     * }> $calls
     */
    public function withCalls(array $calls): self
    {
        $obj = clone $this;
        $obj['calls'] = $calls;

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
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=0&PageSize=1.
     */
    public function withFirstPageUri(string $firstPageUri): self
    {
        $obj = clone $this;
        $obj['first_page_uri'] = $firstPageUri;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
     */
    public function withNextPageUri(string $nextPageUri): self
    {
        $obj = clone $this;
        $obj['next_page_uri'] = $nextPageUri;

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
        $obj['page_size'] = $pageSize;

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
