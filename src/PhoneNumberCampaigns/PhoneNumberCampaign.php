<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign\AssignmentStatus;

/**
 * @phpstan-type PhoneNumberCampaignShape = array{
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
 * }
 */
final class PhoneNumberCampaign implements BaseModel
{
    /** @use SdkModel<PhoneNumberCampaignShape> */
    use SdkModel;

    /**
     * For shared campaigns, this is the TCR campaign ID, otherwise it is the campaign ID.
     */
    #[Required('campaignId')]
    public string $campaignID;

    #[Required]
    public string $createdAt;

    #[Required]
    public string $phoneNumber;

    #[Required]
    public string $updatedAt;

    /**
     * The assignment status of the number.
     *
     * @var value-of<AssignmentStatus>|null $assignmentStatus
     */
    #[Optional(enum: AssignmentStatus::class)]
    public ?string $assignmentStatus;

    /**
     * Brand ID. Empty if the number is associated to a shared campaign.
     */
    #[Optional('brandId')]
    public ?string $brandID;

    /**
     * Extra info about a failure to assign/unassign a number. Relevant only if the assignmentStatus is either FAILED_ASSIGNMENT or FAILED_UNASSIGNMENT.
     */
    #[Optional]
    public ?string $failureReasons;

    /**
     * TCR's alphanumeric ID for the brand.
     */
    #[Optional('tcrBrandId')]
    public ?string $tcrBrandID;

    /**
     * TCR's alphanumeric ID for the campaign.
     */
    #[Optional('tcrCampaignId')]
    public ?string $tcrCampaignID;

    /**
     * Campaign ID. Empty if the number is associated to a shared campaign.
     */
    #[Optional('telnyxCampaignId')]
    public ?string $telnyxCampaignID;

    /**
     * `new PhoneNumberCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCampaign::with(
     *   campaignID: ..., createdAt: ..., phoneNumber: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberCampaign)
     *   ->withCampaignID(...)
     *   ->withCreatedAt(...)
     *   ->withPhoneNumber(...)
     *   ->withUpdatedAt(...)
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
     * @param AssignmentStatus|value-of<AssignmentStatus> $assignmentStatus
     */
    public static function with(
        string $campaignID,
        string $createdAt,
        string $phoneNumber,
        string $updatedAt,
        AssignmentStatus|string|null $assignmentStatus = null,
        ?string $brandID = null,
        ?string $failureReasons = null,
        ?string $tcrBrandID = null,
        ?string $tcrCampaignID = null,
        ?string $telnyxCampaignID = null,
    ): self {
        $obj = new self;

        $obj['campaignID'] = $campaignID;
        $obj['createdAt'] = $createdAt;
        $obj['phoneNumber'] = $phoneNumber;
        $obj['updatedAt'] = $updatedAt;

        null !== $assignmentStatus && $obj['assignmentStatus'] = $assignmentStatus;
        null !== $brandID && $obj['brandID'] = $brandID;
        null !== $failureReasons && $obj['failureReasons'] = $failureReasons;
        null !== $tcrBrandID && $obj['tcrBrandID'] = $tcrBrandID;
        null !== $tcrCampaignID && $obj['tcrCampaignID'] = $tcrCampaignID;
        null !== $telnyxCampaignID && $obj['telnyxCampaignID'] = $telnyxCampaignID;

        return $obj;
    }

    /**
     * For shared campaigns, this is the TCR campaign ID, otherwise it is the campaign ID.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignID'] = $campaignID;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The assignment status of the number.
     *
     * @param AssignmentStatus|value-of<AssignmentStatus> $assignmentStatus
     */
    public function withAssignmentStatus(
        AssignmentStatus|string $assignmentStatus
    ): self {
        $obj = clone $this;
        $obj['assignmentStatus'] = $assignmentStatus;

        return $obj;
    }

    /**
     * Brand ID. Empty if the number is associated to a shared campaign.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj['brandID'] = $brandID;

        return $obj;
    }

    /**
     * Extra info about a failure to assign/unassign a number. Relevant only if the assignmentStatus is either FAILED_ASSIGNMENT or FAILED_UNASSIGNMENT.
     */
    public function withFailureReasons(string $failureReasons): self
    {
        $obj = clone $this;
        $obj['failureReasons'] = $failureReasons;

        return $obj;
    }

    /**
     * TCR's alphanumeric ID for the brand.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $obj = clone $this;
        $obj['tcrBrandID'] = $tcrBrandID;

        return $obj;
    }

    /**
     * TCR's alphanumeric ID for the campaign.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj['tcrCampaignID'] = $tcrCampaignID;

        return $obj;
    }

    /**
     * Campaign ID. Empty if the number is associated to a shared campaign.
     */
    public function withTelnyxCampaignID(string $telnyxCampaignID): self
    {
        $obj = clone $this;
        $obj['telnyxCampaignID'] = $telnyxCampaignID;

        return $obj;
    }
}
