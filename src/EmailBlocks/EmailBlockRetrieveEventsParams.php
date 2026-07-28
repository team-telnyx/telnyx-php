<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Offset pagination only (`page[number]` default 1, `page[size]`
 * default **50**, max 100). No `sort`, no `filter`, no cursor —
 * ordering is fixed `desc occurred_at, desc id`. Verifies the block
 * belongs to the account first (cross-account → 404).
 *
 * @see Telnyx\Services\EmailBlocksService::retrieveEvents()
 *
 * @phpstan-type EmailBlockRetrieveEventsParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class EmailBlockRetrieveEventsParams implements BaseModel
{
    /** @use SdkModel<EmailBlockRetrieveEventsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Offset page number (≥1, default 1).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Page size (default 50, max 100).
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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Offset page number (≥1, default 1).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Page size (default 50, max 100).
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
