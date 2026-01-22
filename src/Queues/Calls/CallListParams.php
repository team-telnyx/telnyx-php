<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\Calls\CallListParams\Page;

/**
 * Retrieve the list of calls in an existing queue.
 *
 * @see Telnyx\Services\Queues\CallsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\Queues\Calls\CallListParams\Page
 *
 * @phpstan-type CallListParamsShape = array{
 *   page?: null|Page|PageShape, pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class CallListParams implements BaseModel
{
    /** @use SdkModel<CallListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    #[Optional]
    public ?int $pageNumber;

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
     *
     * @param Page|PageShape|null $page
     */
    public static function with(
        Page|array|null $page = null,
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
