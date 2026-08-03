<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomainListParams\Sort;

/**
 * Shared (`type: shared`) Telnyx-managed domains are included/readable for every account, in addition to the account's own custom domains.
 *
 * @see Telnyx\Services\EmailDomainsService::list()
 *
 * @phpstan-type EmailDomainListParamsShape = array{
 *   filterDomain?: string|null,
 *   filterProfileID?: string|null,
 *   filterStatus?: null|EmailDomainStatus|value-of<EmailDomainStatus>,
 *   filterType?: null|EmailDomainType|value-of<EmailDomainType>,
 *   filterUsableForInbound?: bool|null,
 *   filterUsableForSending?: bool|null,
 *   pageAfter?: string|null,
 *   pageBefore?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class EmailDomainListParams implements BaseModel
{
    /** @use SdkModel<EmailDomainListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Partial match on domain name (case-insensitive).
     */
    #[Optional]
    public ?string $filterDomain;

    /**
     * Filter by profile UUID.
     */
    #[Optional]
    public ?string $filterProfileID;

    /** @var value-of<EmailDomainStatus>|null $filterStatus */
    #[Optional(enum: EmailDomainStatus::class)]
    public ?string $filterStatus;

    /** @var value-of<EmailDomainType>|null $filterType */
    #[Optional(enum: EmailDomainType::class)]
    public ?string $filterType;

    #[Optional]
    public ?bool $filterUsableForInbound;

    #[Optional]
    public ?bool $filterUsableForSending;

    /**
     * Cursor for records after the provided value (cursor pagination).
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Cursor for records before the provided value (cursor pagination).
     */
    #[Optional]
    public ?string $pageBefore;

    /**
     * Page number to return (offset pagination).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of records per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Field to sort by. Prefix with `-` for descending order.
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
     * @param EmailDomainStatus|value-of<EmailDomainStatus>|null $filterStatus
     * @param EmailDomainType|value-of<EmailDomainType>|null $filterType
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterDomain = null,
        ?string $filterProfileID = null,
        EmailDomainStatus|string|null $filterStatus = null,
        EmailDomainType|string|null $filterType = null,
        ?bool $filterUsableForInbound = null,
        ?bool $filterUsableForSending = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterDomain && $self['filterDomain'] = $filterDomain;
        null !== $filterProfileID && $self['filterProfileID'] = $filterProfileID;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $filterUsableForInbound && $self['filterUsableForInbound'] = $filterUsableForInbound;
        null !== $filterUsableForSending && $self['filterUsableForSending'] = $filterUsableForSending;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageBefore && $self['pageBefore'] = $pageBefore;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Partial match on domain name (case-insensitive).
     */
    public function withFilterDomain(string $filterDomain): self
    {
        $self = clone $this;
        $self['filterDomain'] = $filterDomain;

        return $self;
    }

    /**
     * Filter by profile UUID.
     */
    public function withFilterProfileID(string $filterProfileID): self
    {
        $self = clone $this;
        $self['filterProfileID'] = $filterProfileID;

        return $self;
    }

    /**
     * @param EmailDomainStatus|value-of<EmailDomainStatus> $filterStatus
     */
    public function withFilterStatus(
        EmailDomainStatus|string $filterStatus
    ): self {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

        return $self;
    }

    /**
     * @param EmailDomainType|value-of<EmailDomainType> $filterType
     */
    public function withFilterType(EmailDomainType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    public function withFilterUsableForInbound(
        bool $filterUsableForInbound
    ): self {
        $self = clone $this;
        $self['filterUsableForInbound'] = $filterUsableForInbound;

        return $self;
    }

    public function withFilterUsableForSending(
        bool $filterUsableForSending
    ): self {
        $self = clone $this;
        $self['filterUsableForSending'] = $filterUsableForSending;

        return $self;
    }

    /**
     * Cursor for records after the provided value (cursor pagination).
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Cursor for records before the provided value (cursor pagination).
     */
    public function withPageBefore(string $pageBefore): self
    {
        $self = clone $this;
        $self['pageBefore'] = $pageBefore;

        return $self;
    }

    /**
     * Page number to return (offset pagination).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of records per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Field to sort by. Prefix with `-` for descending order.
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
