<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\DraftListParams\FilterStatus;

/**
 * Lists drafts newest first using stable cursor pagination. All access is scoped
 * to the authenticated account and the given inbox.
 *
 * @see Telnyx\Services\EmailInboxes\DraftsService::list()
 *
 * @phpstan-type DraftListParamsShape = array{
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   pageAfter?: string|null,
 *   pageSize?: int|null,
 * }
 */
final class DraftListParams implements BaseModel
{
    /** @use SdkModel<DraftListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Restrict results to drafts in this state.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

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
     *
     * @param FilterStatus|value-of<FilterStatus>|null $filterStatus
     */
    public static function with(
        FilterStatus|string|null $filterStatus = null,
        ?string $pageAfter = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Restrict results to drafts in this state.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     */
    public function withFilterStatus(FilterStatus|string $filterStatus): self
    {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

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
