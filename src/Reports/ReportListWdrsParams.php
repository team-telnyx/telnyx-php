<?php

declare(strict_types=1);

namespace Telnyx\Reports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reports\ReportListWdrsParams\Page;

/**
 * Fetch all Wdr records.
 *
 * @see Telnyx\Reports->listWdrs
 *
 * @phpstan-type report_list_wdrs_params = array{
 *   id?: string,
 *   endDate?: string,
 *   imsi?: string,
 *   mcc?: string,
 *   mnc?: string,
 *   page?: Page,
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
    /** @use SdkModel<report_list_wdrs_params> */
    use SdkModel;
    use SdkParams;

    /**
     * WDR uuid.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * End date.
     */
    #[Api(optional: true)]
    public ?string $endDate;

    /**
     * International mobile subscriber identity.
     */
    #[Api(optional: true)]
    public ?string $imsi;

    /**
     * Mobile country code.
     */
    #[Api(optional: true)]
    public ?string $mcc;

    /**
     * Mobile network code.
     */
    #[Api(optional: true)]
    public ?string $mnc;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Phone number.
     */
    #[Api(optional: true)]
    public ?string $phoneNumber;

    /**
     * Sim card unique identifier.
     */
    #[Api(optional: true)]
    public ?string $simCardID;

    /**
     * Sim group unique identifier.
     */
    #[Api(optional: true)]
    public ?string $simGroupID;

    /**
     * Sim group name.
     */
    #[Api(optional: true)]
    public ?string $simGroupName;

    /**
     * Field used to order the data. If no field is specified, default value is 'created_at'.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Start date.
     */
    #[Api(optional: true)]
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
        ?Page $page = null,
        ?string $phoneNumber = null,
        ?string $simCardID = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        ?array $sort = null,
        ?string $startDate = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $endDate && $obj->endDate = $endDate;
        null !== $imsi && $obj->imsi = $imsi;
        null !== $mcc && $obj->mcc = $mcc;
        null !== $mnc && $obj->mnc = $mnc;
        null !== $page && $obj->page = $page;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $simGroupID && $obj->simGroupID = $simGroupID;
        null !== $simGroupName && $obj->simGroupName = $simGroupName;
        null !== $sort && $obj->sort = $sort;
        null !== $startDate && $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * WDR uuid.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * End date.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * International mobile subscriber identity.
     */
    public function withImsi(string $imsi): self
    {
        $obj = clone $this;
        $obj->imsi = $imsi;

        return $obj;
    }

    /**
     * Mobile country code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj->mcc = $mcc;

        return $obj;
    }

    /**
     * Mobile network code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj->mnc = $mnc;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj->simGroupID = $simGroupID;

        return $obj;
    }

    /**
     * Sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj->simGroupName = $simGroupName;

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
        $obj->sort = $sort;

        return $obj;
    }

    /**
     * Start date.
     */
    public function withStartDate(string $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }
}
