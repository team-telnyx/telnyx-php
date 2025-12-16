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
     * WDR uuid.
     */
    #[Optional]
    public ?string $id;

    /**
     * End date.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * International mobile subscriber identity.
     */
    #[Optional]
    public ?string $imsi;

    /**
     * Mobile country code.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * Mobile network code.
     */
    #[Optional]
    public ?string $mnc;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Phone number.
     */
    #[Optional]
    public ?string $phoneNumber;

    /**
     * Sim card unique identifier.
     */
    #[Optional]
    public ?string $simCardID;

    /**
     * Sim group unique identifier.
     */
    #[Optional]
    public ?string $simGroupID;

    /**
     * Sim group name.
     */
    #[Optional]
    public ?string $simGroupName;

    /**
     * Field used to order the data. If no field is specified, default value is 'created_at'.
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
     * @param list<string> $sort
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
     * WDR uuid.
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
     * International mobile subscriber identity.
     */
    public function withImsi(string $imsi): self
    {
        $self = clone $this;
        $self['imsi'] = $imsi;

        return $self;
    }

    /**
     * Mobile country code.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Mobile network code.
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
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $self = clone $this;
        $self['simGroupID'] = $simGroupID;

        return $self;
    }

    /**
     * Sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $self = clone $this;
        $self['simGroupName'] = $simGroupName;

        return $self;
    }

    /**
     * Field used to order the data. If no field is specified, default value is 'created_at'.
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
