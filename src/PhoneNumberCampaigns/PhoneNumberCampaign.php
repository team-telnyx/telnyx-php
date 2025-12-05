<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign\AssignmentStatus;

/**
 * @phpstan-type PhoneNumberCampaignShape = array{
 *   campaignId: string,
 *   createdAt: string,
 *   phoneNumber: string,
 *   updatedAt: string,
 *   assignmentStatus?: value-of<AssignmentStatus>|null,
 *   brandId?: string|null,
 *   failureReasons?: string|null,
 *   tcrBrandId?: string|null,
 *   tcrCampaignId?: string|null,
 *   telnyxCampaignId?: string|null,
 * }
 */
final class PhoneNumberCampaign implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PhoneNumberCampaignShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * For shared campaigns, this is the TCR campaign ID, otherwise it is the campaign ID.
     */
    #[Api]
    public string $campaignId;

    #[Api]
    public string $createdAt;

    #[Api]
    public string $phoneNumber;

    #[Api]
    public string $updatedAt;

    /**
     * The assignment status of the number.
     *
     * @var value-of<AssignmentStatus>|null $assignmentStatus
     */
    #[Api(enum: AssignmentStatus::class, optional: true)]
    public ?string $assignmentStatus;

    /**
     * Brand ID. Empty if the number is associated to a shared campaign.
     */
    #[Api(optional: true)]
    public ?string $brandId;

    /**
     * Extra info about a failure to assign/unassign a number. Relevant only if the assignmentStatus is either FAILED_ASSIGNMENT or FAILED_UNASSIGNMENT.
     */
    #[Api(optional: true)]
    public ?string $failureReasons;

    /**
     * TCR's alphanumeric ID for the brand.
     */
    #[Api(optional: true)]
    public ?string $tcrBrandId;

    /**
     * TCR's alphanumeric ID for the campaign.
     */
    #[Api(optional: true)]
    public ?string $tcrCampaignId;

    /**
     * Campaign ID. Empty if the number is associated to a shared campaign.
     */
    #[Api(optional: true)]
    public ?string $telnyxCampaignId;

    /**
     * `new PhoneNumberCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCampaign::with(
     *   campaignId: ..., createdAt: ..., phoneNumber: ..., updatedAt: ...
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
        string $campaignId,
        string $createdAt,
        string $phoneNumber,
        string $updatedAt,
        AssignmentStatus|string|null $assignmentStatus = null,
        ?string $brandId = null,
        ?string $failureReasons = null,
        ?string $tcrBrandId = null,
        ?string $tcrCampaignId = null,
        ?string $telnyxCampaignId = null,
    ): self {
        $obj = new self;

        $obj['campaignId'] = $campaignId;
        $obj['createdAt'] = $createdAt;
        $obj['phoneNumber'] = $phoneNumber;
        $obj['updatedAt'] = $updatedAt;

        null !== $assignmentStatus && $obj['assignmentStatus'] = $assignmentStatus;
        null !== $brandId && $obj['brandId'] = $brandId;
        null !== $failureReasons && $obj['failureReasons'] = $failureReasons;
        null !== $tcrBrandId && $obj['tcrBrandId'] = $tcrBrandId;
        null !== $tcrCampaignId && $obj['tcrCampaignId'] = $tcrCampaignId;
        null !== $telnyxCampaignId && $obj['telnyxCampaignId'] = $telnyxCampaignId;

        return $obj;
    }

    /**
     * For shared campaigns, this is the TCR campaign ID, otherwise it is the campaign ID.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignId'] = $campaignID;

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
        $obj['brandId'] = $brandID;

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
        $obj['tcrBrandId'] = $tcrBrandID;

        return $obj;
    }

    /**
     * TCR's alphanumeric ID for the campaign.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj['tcrCampaignId'] = $tcrCampaignID;

        return $obj;
    }

    /**
     * Campaign ID. Empty if the number is associated to a shared campaign.
     */
    public function withTelnyxCampaignID(string $telnyxCampaignID): self
    {
        $obj = clone $this;
        $obj['telnyxCampaignId'] = $telnyxCampaignID;

        return $obj;
    }
}
