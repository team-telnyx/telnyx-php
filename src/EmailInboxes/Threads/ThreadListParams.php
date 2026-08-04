<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists thread summaries newest first using stable cursor pagination.
 *
 * @see Telnyx\Services\EmailInboxes\ThreadsService::list()
 *
 * @phpstan-type ThreadListParamsShape = array{
 *   filterLabel?: string|null, pageAfter?: string|null, pageSize?: int|null
 * }
 */
final class ThreadListParams implements BaseModel
{
    /** @use SdkModel<ThreadListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Returns only threads carrying this label. Thread labels are independent of the labels on the thread's messages.
     */
    #[Optional]
    public ?string $filterLabel;

    /**
     * Opaque cursor returned by the previous page.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Number of results to return. Defaults to 25; maximum is 100.
     */
    #[Optional]
    public ?int $pageSize;

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
        ?string $filterLabel = null,
        ?string $pageAfter = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $filterLabel && $self['filterLabel'] = $filterLabel;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Returns only threads carrying this label. Thread labels are independent of the labels on the thread's messages.
     */
    public function withFilterLabel(string $filterLabel): self
    {
        $self = clone $this;
        $self['filterLabel'] = $filterLabel;

        return $self;
    }

    /**
     * Opaque cursor returned by the previous page.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Number of results to return. Defaults to 25; maximum is 100.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
