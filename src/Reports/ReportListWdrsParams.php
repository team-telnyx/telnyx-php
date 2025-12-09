<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsParams\Page;

/**
 * Fetch all Wdr records.
 *
 * @see Telnyx\Services\ReportsService::listWdrs()
 *
 * @phpstan-type ReportListWdrsParamsShape = array{
 *   id?: string,
 *   endDate?: string,
 *   imsi?: string,
 *   mcc?: string,
 *   mnc?: string,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   phoneNumber?: string,
 *   simCardID?: string,
 *   simGroupID?: string,
 *   simGroupName?: string,
 *   sort?: list<string>,
 *   startDate?: string,
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

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
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param list<string> $sort
     */
    public static function with(
        ?string $id = null,
        ?string $endDate = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        Page|array|null $page = null,
        ?string $phoneNumber = null,
        ?string $simCardID = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        ?array $sort = null,
        ?string $startDate = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $page && $obj['page'] = $page;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $simCardID && $obj['simCardID'] = $simCardID;
        null !== $simGroupID && $obj['simGroupID'] = $simGroupID;
        null !== $simGroupName && $obj['simGroupName'] = $simGroupName;
        null !== $sort && $obj['sort'] = $sort;
        null !== $startDate && $obj['startDate'] = $startDate;

        return $obj;
    }

    /**
     * WDR uuid.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * End date.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

        return $obj;
    }

    /**
     * International mobile subscriber identity.
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj['imsi'] = $imsi;

        return $obj;
    }

    /**
     * Mobile country code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj['mcc'] = $mcc;

        return $obj;
    }

    /**
     * Mobile network code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj['mnc'] = $mnc;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['simCardID'] = $simCardID;

        return $obj;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj['simGroupID'] = $simGroupID;

        return $obj;
    }

    /**
     * Sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj['simGroupName'] = $simGroupName;

        return $obj;
    }

    /**
     * Field used to order the data. If no field is specified, default value is 'created_at'.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Start date.
     */
    public function withStartDate(string $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

        return $obj;
    }
}
