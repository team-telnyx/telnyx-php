<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups\Suppressions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Account + group scoped. Offset pagination only (`page[number]`
 * default 1, `page[size]` default 25, max 100). No `sort`/`filter`/
 * cursor — ordering fixed `desc created_at, desc id`. Uses the shared
 * `QueryParser.parse_offset/1` — a malformed `page` returns `400`
 * (code `10015`), consistent with `GET /v2/email_blocks`. `meta`
 * includes `total_pages`. Rows reuse the standard suppression shape
 * (`group_id` set to this group).
 *
 * @see Telnyx\Services\EmailUnsubscribeGroups\SuppressionsService::list()
 *
 * @phpstan-type SuppressionListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class SuppressionListParams implements BaseModel
{
    /** @use SdkModel<SuppressionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Offset page number (≥1, default 1).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Page size (1–100, default 25).
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
     * Page size (1–100, default 25).
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
