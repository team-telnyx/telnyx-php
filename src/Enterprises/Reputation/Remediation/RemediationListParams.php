<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListParams\FilterStatus;

/**
 * Paginated list of remediation requests for this enterprise. List items omit per-number results and webhook URLs to keep the response small; call GET by id for full detail. Supports JSON:API pagination and optional filters on status and created-at range.
 *
 * @see Telnyx\Services\Enterprises\Reputation\RemediationService::list()
 *
 * @phpstan-type RemediationListParamsShape = array{
 *   filterCreatedAtGte?: \DateTimeInterface|null,
 *   filterCreatedAtLte?: \DateTimeInterface|null,
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class RemediationListParams implements BaseModel
{
    /** @use SdkModel<RemediationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Only requests created on or after this timestamp (ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $filterCreatedAtGte;

    /**
     * Only requests created on or before this timestamp (ISO 8601).
     */
    #[Optional]
    public ?\DateTimeInterface $filterCreatedAtLte;

    /**
     * Filter by customer-facing status.
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
        ?\DateTimeInterface $filterCreatedAtGte = null,
        ?\DateTimeInterface $filterCreatedAtLte = null,
        FilterStatus|string|null $filterStatus = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterCreatedAtGte && $self['filterCreatedAtGte'] = $filterCreatedAtGte;
        null !== $filterCreatedAtLte && $self['filterCreatedAtLte'] = $filterCreatedAtLte;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Only requests created on or after this timestamp (ISO 8601).
     */
    public function withFilterCreatedAtGte(
        \DateTimeInterface $filterCreatedAtGte
    ): self {
        $self = clone $this;
        $self['filterCreatedAtGte'] = $filterCreatedAtGte;

        return $self;
    }

    /**
     * Only requests created on or before this timestamp (ISO 8601).
     */
    public function withFilterCreatedAtLte(
        \DateTimeInterface $filterCreatedAtLte
    ): self {
        $self = clone $this;
        $self['filterCreatedAtLte'] = $filterCreatedAtLte;

        return $self;
    }

    /**
     * Filter by customer-facing status.
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
