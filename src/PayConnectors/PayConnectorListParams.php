<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List connectors belonging to the authenticated organization, including connectors created by other users in that organization. Set filter[type]=generic to restrict results to the type covered here. Results default to newest created_at first. Use meta.end_cursor as page[after] for the next page, or meta.start_cursor as page[before] for the preceding page. Omit both cursors for the first page; if both are supplied, page[after] takes precedence. Responses omit passwords and tokens.
 *
 * @see Telnyx\Services\PayConnectorsService::list()
 *
 * @phpstan-type PayConnectorListParamsShape = array{
 *   filterCreatedAtEq?: string|null,
 *   filterCreatedAtGt?: string|null,
 *   filterCreatedAtGte?: string|null,
 *   filterCreatedAtLt?: string|null,
 *   filterCreatedAtLte?: string|null,
 *   filterMode?: string|null,
 *   filterName?: string|null,
 *   filterType?: string|null,
 *   filterUpdatedAtEq?: string|null,
 *   filterUpdatedAtGt?: string|null,
 *   filterUpdatedAtGte?: string|null,
 *   filterUpdatedAtLt?: string|null,
 *   filterUpdatedAtLte?: string|null,
 *   pageAfter?: string|null,
 *   pageBefore?: string|null,
 *   pageSize?: int|null,
 *   sort?: string|null,
 * }
 */
final class PayConnectorListParams implements BaseModel
{
    /** @use SdkModel<PayConnectorListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Equal to this created_at timestamp.
     */
    #[Optional]
    public ?string $filterCreatedAtEq;

    /**
     * After this created_at timestamp.
     */
    #[Optional]
    public ?string $filterCreatedAtGt;

    /**
     * At or after this created_at timestamp.
     */
    #[Optional]
    public ?string $filterCreatedAtGte;

    /**
     * Before this created_at timestamp.
     */
    #[Optional]
    public ?string $filterCreatedAtLt;

    /**
     * At or before this created_at timestamp.
     */
    #[Optional]
    public ?string $filterCreatedAtLte;

    /**
     * Exact match on mode.
     */
    #[Optional]
    public ?string $filterMode;

    /**
     * Exact match on name.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Exact match on type.
     */
    #[Optional]
    public ?string $filterType;

    /**
     * Equal to this updated_at timestamp.
     */
    #[Optional]
    public ?string $filterUpdatedAtEq;

    /**
     * After this updated_at timestamp.
     */
    #[Optional]
    public ?string $filterUpdatedAtGt;

    /**
     * At or after this updated_at timestamp.
     */
    #[Optional]
    public ?string $filterUpdatedAtGte;

    /**
     * Before this updated_at timestamp.
     */
    #[Optional]
    public ?string $filterUpdatedAtLt;

    /**
     * At or before this updated_at timestamp.
     */
    #[Optional]
    public ?string $filterUpdatedAtLte;

    /**
     * Opaque cursor from meta.end_cursor.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Opaque cursor from meta.start_cursor.
     */
    #[Optional]
    public ?string $pageBefore;

    /**
     * Number of records per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Comma-separated created_at or updated_at fields, optionally prefixed with - for descending order.
     */
    #[Optional]
    public ?string $sort;

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
        ?string $filterCreatedAtEq = null,
        ?string $filterCreatedAtGt = null,
        ?string $filterCreatedAtGte = null,
        ?string $filterCreatedAtLt = null,
        ?string $filterCreatedAtLte = null,
        ?string $filterMode = null,
        ?string $filterName = null,
        ?string $filterType = null,
        ?string $filterUpdatedAtEq = null,
        ?string $filterUpdatedAtGt = null,
        ?string $filterUpdatedAtGte = null,
        ?string $filterUpdatedAtLt = null,
        ?string $filterUpdatedAtLte = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        ?int $pageSize = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        null !== $filterCreatedAtEq && $self['filterCreatedAtEq'] = $filterCreatedAtEq;
        null !== $filterCreatedAtGt && $self['filterCreatedAtGt'] = $filterCreatedAtGt;
        null !== $filterCreatedAtGte && $self['filterCreatedAtGte'] = $filterCreatedAtGte;
        null !== $filterCreatedAtLt && $self['filterCreatedAtLt'] = $filterCreatedAtLt;
        null !== $filterCreatedAtLte && $self['filterCreatedAtLte'] = $filterCreatedAtLte;
        null !== $filterMode && $self['filterMode'] = $filterMode;
        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $filterUpdatedAtEq && $self['filterUpdatedAtEq'] = $filterUpdatedAtEq;
        null !== $filterUpdatedAtGt && $self['filterUpdatedAtGt'] = $filterUpdatedAtGt;
        null !== $filterUpdatedAtGte && $self['filterUpdatedAtGte'] = $filterUpdatedAtGte;
        null !== $filterUpdatedAtLt && $self['filterUpdatedAtLt'] = $filterUpdatedAtLt;
        null !== $filterUpdatedAtLte && $self['filterUpdatedAtLte'] = $filterUpdatedAtLte;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageBefore && $self['pageBefore'] = $pageBefore;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Equal to this created_at timestamp.
     */
    public function withFilterCreatedAtEq(string $filterCreatedAtEq): self
    {
        $self = clone $this;
        $self['filterCreatedAtEq'] = $filterCreatedAtEq;

        return $self;
    }

    /**
     * After this created_at timestamp.
     */
    public function withFilterCreatedAtGt(string $filterCreatedAtGt): self
    {
        $self = clone $this;
        $self['filterCreatedAtGt'] = $filterCreatedAtGt;

        return $self;
    }

    /**
     * At or after this created_at timestamp.
     */
    public function withFilterCreatedAtGte(string $filterCreatedAtGte): self
    {
        $self = clone $this;
        $self['filterCreatedAtGte'] = $filterCreatedAtGte;

        return $self;
    }

    /**
     * Before this created_at timestamp.
     */
    public function withFilterCreatedAtLt(string $filterCreatedAtLt): self
    {
        $self = clone $this;
        $self['filterCreatedAtLt'] = $filterCreatedAtLt;

        return $self;
    }

    /**
     * At or before this created_at timestamp.
     */
    public function withFilterCreatedAtLte(string $filterCreatedAtLte): self
    {
        $self = clone $this;
        $self['filterCreatedAtLte'] = $filterCreatedAtLte;

        return $self;
    }

    /**
     * Exact match on mode.
     */
    public function withFilterMode(string $filterMode): self
    {
        $self = clone $this;
        $self['filterMode'] = $filterMode;

        return $self;
    }

    /**
     * Exact match on name.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Exact match on type.
     */
    public function withFilterType(string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Equal to this updated_at timestamp.
     */
    public function withFilterUpdatedAtEq(string $filterUpdatedAtEq): self
    {
        $self = clone $this;
        $self['filterUpdatedAtEq'] = $filterUpdatedAtEq;

        return $self;
    }

    /**
     * After this updated_at timestamp.
     */
    public function withFilterUpdatedAtGt(string $filterUpdatedAtGt): self
    {
        $self = clone $this;
        $self['filterUpdatedAtGt'] = $filterUpdatedAtGt;

        return $self;
    }

    /**
     * At or after this updated_at timestamp.
     */
    public function withFilterUpdatedAtGte(string $filterUpdatedAtGte): self
    {
        $self = clone $this;
        $self['filterUpdatedAtGte'] = $filterUpdatedAtGte;

        return $self;
    }

    /**
     * Before this updated_at timestamp.
     */
    public function withFilterUpdatedAtLt(string $filterUpdatedAtLt): self
    {
        $self = clone $this;
        $self['filterUpdatedAtLt'] = $filterUpdatedAtLt;

        return $self;
    }

    /**
     * At or before this updated_at timestamp.
     */
    public function withFilterUpdatedAtLte(string $filterUpdatedAtLte): self
    {
        $self = clone $this;
        $self['filterUpdatedAtLte'] = $filterUpdatedAtLte;

        return $self;
    }

    /**
     * Opaque cursor from meta.end_cursor.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Opaque cursor from meta.start_cursor.
     */
    public function withPageBefore(string $pageBefore): self
    {
        $self = clone $this;
        $self['pageBefore'] = $pageBefore;

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
     * Comma-separated created_at or updated_at fields, optionally prefixed with - for descending order.
     */
    public function withSort(string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
