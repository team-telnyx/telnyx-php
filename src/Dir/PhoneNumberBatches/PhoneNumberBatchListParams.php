<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListParams\FilterStatus;

/**
 * List the phone-number batches submitted under a DIR. The enterprise is resolved server-side from the DIR id.
 *
 * @see Telnyx\Services\Dir\PhoneNumberBatchesService::list()
 *
 * @phpstan-type PhoneNumberBatchListParamsShape = array{
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class PhoneNumberBatchListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberBatchListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Restrict to batches whose aggregate status equals this value.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
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
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Restrict to batches whose aggregate status equals this value.
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
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
