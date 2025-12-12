<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaign\AssignmentStatus;

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
        $self = new self;

        $self['campaignID'] = $campaignID;
        $self['createdAt'] = $createdAt;
        $self['phoneNumber'] = $phoneNumber;
        $self['updatedAt'] = $updatedAt;

        null !== $assignmentStatus && $self['assignmentStatus'] = $assignmentStatus;
        null !== $brandID && $self['brandID'] = $brandID;
        null !== $failureReasons && $self['failureReasons'] = $failureReasons;
        null !== $tcrBrandID && $self['tcrBrandID'] = $tcrBrandID;
        null !== $tcrCampaignID && $self['tcrCampaignID'] = $tcrCampaignID;
        null !== $telnyxCampaignID && $self['telnyxCampaignID'] = $telnyxCampaignID;

        return $self;
    }

    /**
     * For shared campaigns, this is the TCR campaign ID, otherwise it is the campaign ID.
     */
    public function withCampaignID(string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The assignment status of the number.
     *
     * @param AssignmentStatus|value-of<AssignmentStatus> $assignmentStatus
     */
    public function withAssignmentStatus(
        AssignmentStatus|string $assignmentStatus
    ): self {
        $self = clone $this;
        $self['assignmentStatus'] = $assignmentStatus;

        return $self;
    }

    /**
     * Brand ID. Empty if the number is associated to a shared campaign.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * Extra info about a failure to assign/unassign a number. Relevant only if the assignmentStatus is either FAILED_ASSIGNMENT or FAILED_UNASSIGNMENT.
     */
    public function withFailureReasons(string $failureReasons): self
    {
        $self = clone $this;
        $self['failureReasons'] = $failureReasons;

        return $self;
    }

    /**
     * TCR's alphanumeric ID for the brand.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $self = clone $this;
        $self['tcrBrandID'] = $tcrBrandID;

        return $self;
    }

    /**
     * TCR's alphanumeric ID for the campaign.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $self = clone $this;
        $self['tcrCampaignID'] = $tcrCampaignID;

        return $self;
    }

    /**
     * Campaign ID. Empty if the number is associated to a shared campaign.
     */
    public function withTelnyxCampaignID(string $telnyxCampaignID): self
    {
        $self = clone $this;
        $self['telnyxCampaignID'] = $telnyxCampaignID;

        return $self;
    }
}
