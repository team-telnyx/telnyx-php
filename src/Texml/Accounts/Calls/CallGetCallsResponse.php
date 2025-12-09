<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
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
 *   firstPageUri?: string|null,
 *   nextPageUri?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   start?: int|null,
 *   uri?: string|null,
 * }
 */
final class CallGetCallsResponse implements BaseModel
{
    /** @use SdkModel<CallGetCallsResponseShape> */
    use SdkModel;

    /** @var list<Call>|null $calls */
    #[Optional(list: Call::class)]
    public ?array $calls;

    /**
     * The number of the last element on the page, zero-indexed.
     */
    #[Optional]
    public ?int $end;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=0&PageSize=1.
     */
    #[Optional('first_page_uri')]
    public ?string $firstPageUri;

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
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
     * @param list<Call|array{
     *   accountSid?: string|null,
     *   answeredBy?: value-of<AnsweredBy>|null,
     *   callerName?: string|null,
     *   dateCreated?: string|null,
     *   dateUpdated?: string|null,
     *   direction?: value-of<Direction>|null,
     *   duration?: string|null,
     *   endTime?: string|null,
     *   from?: string|null,
     *   fromFormatted?: string|null,
     *   price?: string|null,
     *   priceUnit?: string|null,
     *   sid?: string|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   toFormatted?: string|null,
     *   uri?: string|null,
     * }> $calls
     */
    public static function with(
        ?array $calls = null,
        ?int $end = null,
        ?string $firstPageUri = null,
        ?string $nextPageUri = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?int $start = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $calls && $obj['calls'] = $calls;
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
     * @param list<Call|array{
     *   accountSid?: string|null,
     *   answeredBy?: value-of<AnsweredBy>|null,
     *   callerName?: string|null,
     *   dateCreated?: string|null,
     *   dateUpdated?: string|null,
     *   direction?: value-of<Direction>|null,
     *   duration?: string|null,
     *   endTime?: string|null,
     *   from?: string|null,
     *   fromFormatted?: string|null,
     *   price?: string|null,
     *   priceUnit?: string|null,
     *   sid?: string|null,
     *   startTime?: string|null,
     *   status?: value-of<Status>|null,
     *   to?: string|null,
     *   toFormatted?: string|null,
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
        $obj['firstPageUri'] = $firstPageUri;

        return $obj;
    }

    /**
     * /v2/texml/Accounts/61bf923e-5e4d-4595-a110-56190ea18a1b/Calls.json?Page=1&PageSize=1&PageToken=MTY4AjgyNDkwNzIxMQ.
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
