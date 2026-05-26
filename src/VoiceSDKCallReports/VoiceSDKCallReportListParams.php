<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams\Sort;

/**
 * Returns paginated raw call report stats JSON payloads stored for the authenticated user. The user is derived from Telnyx authentication, not from request parameters.
 *
 * @see Telnyx\Services\VoiceSDKCallReportsService::list()
 *
 * @phpstan-type VoiceSDKCallReportListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null, sort?: null|Sort|value-of<Sort>
 * }
 */
final class VoiceSDKCallReportListParams implements BaseModel
{
    /** @use SdkModel<VoiceSDKCallReportListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Set the order of the results by creation date. `asc` and `created_at` sort oldest reports first; `desc` and `-created_at` sort newest reports first. If not given, results are sorted by creation date in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

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

    /**
     * Set the order of the results by creation date. `asc` and `created_at` sort oldest reports first; `desc` and `-created_at` sort newest reports first. If not given, results are sorted by creation date in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
