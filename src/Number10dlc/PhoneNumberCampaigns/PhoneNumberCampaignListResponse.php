<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
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
        $self = new self;

        $self['page'] = $page;
        $self['records'] = $records;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
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
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $self = clone $this;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }
}
