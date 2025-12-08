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
 *   end_date?: string,
 *   imsi?: string,
 *   mcc?: string,
 *   mnc?: string,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   phone_number?: string,
 *   sim_card_id?: string,
 *   sim_group_id?: string,
 *   sim_group_name?: string,
 *   sort?: list<string>,
 *   start_date?: string,
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
    public ?string $end_date;

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
    public ?string $phone_number;

    /**
     * Sim card unique identifier.
     */
    #[Optional]
    public ?string $sim_card_id;

    /**
     * Sim group unique identifier.
     */
    #[Optional]
    public ?string $sim_group_id;

    /**
     * Sim group name.
     */
    #[Optional]
    public ?string $sim_group_name;

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
    public ?string $start_date;

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
        ?string $end_date = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        Page|array|null $page = null,
        ?string $phone_number = null,
        ?string $sim_card_id = null,
        ?string $sim_group_id = null,
        ?string $sim_group_name = null,
        ?array $sort = null,
        ?string $start_date = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $imsi && $obj['imsi'] = $imsi;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $page && $obj['page'] = $page;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $sim_group_id && $obj['sim_group_id'] = $sim_group_id;
        null !== $sim_group_name && $obj['sim_group_name'] = $sim_group_name;
        null !== $sort && $obj['sort'] = $sort;
        null !== $start_date && $obj['start_date'] = $start_date;

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
        $obj['end_date'] = $endDate;

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
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Sim card unique identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * Sim group unique identifier.
     */
    public function withSimGroupID(string $simGroupID): self
    {
        $obj = clone $this;
        $obj['sim_group_id'] = $simGroupID;

        return $obj;
    }

    /**
     * Sim group name.
     */
    public function withSimGroupName(string $simGroupName): self
    {
        $obj = clone $this;
        $obj['sim_group_name'] = $simGroupName;

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
        $obj['start_date'] = $startDate;

        return $obj;
    }
}
