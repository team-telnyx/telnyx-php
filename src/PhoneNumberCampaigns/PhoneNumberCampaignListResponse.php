<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign\AssignmentStatus;

/**
 * @phpstan-type PhoneNumberCampaignListResponseShape = array{
 *   page: int, records: list<PhoneNumberCampaign>, totalRecords: int
 * }
 */
final class PhoneNumberCampaignListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberCampaignListResponseShape> */
    use SdkModel;

    #[Required]
    public int $page;

    /** @var list<PhoneNumberCampaign> $records */
    #[Required(list: PhoneNumberCampaign::class)]
    public array $records;

    #[Required]
    public int $totalRecords;

    /**
     * `new PhoneNumberCampaignListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCampaignListResponse::with(
     *   page: ..., records: ..., totalRecords: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberCampaignListResponse)
     *   ->withPage(...)
     *   ->withRecords(...)
     *   ->withTotalRecords(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberCampaign|array{
     *   campaignID: string,
     *   createdAt: string,
     *   phoneNumber: string,
     *   updatedAt: string,
     *   assignmentStatus?: value-of<AssignmentStatus>|null,
     *   brandID?: string|null,
     *   failureReasons?: string|null,
     *   tcrBrandID?: string|null,
     *   tcrCampaignID?: string|null,
     *   telnyxCampaignID?: string|null,
     * }> $records
     */
    public static function with(
        int $page,
        array $records,
        int $totalRecords
    ): self {
        $obj = new self;

        $obj['page'] = $page;
        $obj['records'] = $records;
        $obj['totalRecords'] = $totalRecords;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * @param list<PhoneNumberCampaign|array{
     *   campaignID: string,
     *   createdAt: string,
     *   phoneNumber: string,
     *   updatedAt: string,
     *   assignmentStatus?: value-of<AssignmentStatus>|null,
     *   brandID?: string|null,
     *   failureReasons?: string|null,
     *   tcrBrandID?: string|null,
     *   tcrCampaignID?: string|null,
     *   telnyxCampaignID?: string|null,
     * }> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj['records'] = $records;

        return $obj;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $obj = clone $this;
        $obj['totalRecords'] = $totalRecords;

        return $obj;
    }
}
