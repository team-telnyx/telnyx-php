<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a bounded page of inbound and outbound thread messages interleaved in chronological order using stable cursor pagination.
 *
 * @see Telnyx\Services\EmailInboxes\ThreadsService::retrieve()
 *
 * @phpstan-type ThreadRetrieveParamsShape = array{
 *   inboxID: string, pageAfter?: string|null, pageSize?: int|null
 * }
 */
final class ThreadRetrieveParams implements BaseModel
{
    /** @use SdkModel<ThreadRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * Opaque message cursor returned by the previous thread-detail page.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Number of thread messages to return. Defaults to 25; maximum is 100.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * `new ThreadRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ThreadRetrieveParams::with(inboxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ThreadRetrieveParams)->withInboxID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $inboxID,
        ?string $pageAfter = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        $self['inboxID'] = $inboxID;

        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * Opaque message cursor returned by the previous thread-detail page.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Number of thread messages to return. Defaults to 25; maximum is 100.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
