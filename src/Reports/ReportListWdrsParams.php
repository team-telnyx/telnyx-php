<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fetch all Wdr records.
 *
 * @see Telnyx\Services\ReportsService::listWdrs()
 *
 * @phpstan-type ReportListWdrsParamsShape = array{
 *   id?: string|null,
 *   endDate?: string|null,
 *   imsi?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   phoneNumber?: string|null,
 *   simCardID?: string|null,
 *   simGroupID?: string|null,
 *   simGroupName?: string|null,
 *   sort?: list<string>|null,
 *   startDate?: string|null,
 * }
 */
final class ReportListWdrsParams implements BaseModel
{
    /** @use SdkModel<ReportListWdrsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter results by identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * End date.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Filter results by imsi.
     */
    #[Optional]
    public ?string $imsi;

    /**
     * Filter results by mcc.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * Filter results by mnc.
     */
    #[Optional]
    public ?string $mnc;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Filter results by phone number.
     */
    #[Optional]
    public ?string $phoneNumber;

    /**
     * Filter results by sim card id.
     */
    #[Optional]
    public ?string $simCardID;

    /**
     * Filter results by sim group id.
     */
    #[Optional]
    public ?string $simGroupID;

    /**
     * Filter results by sim group name.
     */
    #[Optional]
    public ?string $simGroupName;

    /**
     * Field and direction to sort the results by.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Start date.
     */
    #[Optional]
    public ?string $startDate;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $sort
     */
    public static function with(
        ?string $id = null,
        ?string $endDate = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $phoneNumber = null,
        ?string $simCardID = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        ?array $sort = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $mcc && $self['mcc'] = $mcc;
        null !== $mnc && $self['mnc'] = $mnc;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $simGroupID && $self['simGroupID'] = $simGroupID;
        null !== $simGroupName && $self['simGroupName'] = $simGroupName;
        null !== $sort && $self['sort'] = $sort;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter results by identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * End date.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Filter results by imsi.
     */
    public function withImsi(string $imsi): self
    {
        $self = clone $this;
        $self['imsi'] = $imsi;

        return $self;
    }

    /**
     * Filter results by mcc.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Filter results by mnc.
     */
    public function withMnc(string $mnc): self
    {
        $self = clone $this;
        $self['mnc'] = $mnc;

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
     * Filter results by phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter results by sim card id.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * Filter results by sim group id.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $self = clone $this;
        $self['simGroupID'] = $simGroupID;

        return $self;
    }

    /**
     * Filter results by sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $self = clone $this;
        $self['simGroupName'] = $simGroupName;

        return $self;
    }

    /**
     * Field and direction to sort the results by.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Start date.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
