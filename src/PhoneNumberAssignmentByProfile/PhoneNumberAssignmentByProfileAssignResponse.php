<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileAssignResponseShape = array{
 *   messagingProfileId: string,
 *   taskId: string,
 *   campaignId?: string|null,
 *   tcrCampaignId?: string|null,
 * }
 */
final class PhoneNumberAssignmentByProfileAssignResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileAssignResponseShape> */
    use SdkModel;

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    #[Required]
    public string $messagingProfileId;

    /**
     * The ID of the task associated with assigning a messaging profile to a campaign.
     */
    #[Required]
    public string $taskId;

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    #[Optional]
    public ?string $campaignId;

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    #[Optional]
    public ?string $tcrCampaignId;

    /**
     * `new PhoneNumberAssignmentByProfileAssignResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileAssignResponse::with(
     *   messagingProfileId: ..., taskId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAssignmentByProfileAssignResponse)
     *   ->withMessagingProfileID(...)
     *   ->withTaskID(...)
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
     */
    public static function with(
        string $messagingProfileId,
        string $taskId,
        ?string $campaignId = null,
        ?string $tcrCampaignId = null,
    ): self {
        $obj = new self;

        $obj['messagingProfileId'] = $messagingProfileId;
        $obj['taskId'] = $taskId;

        null !== $campaignId && $obj['campaignId'] = $campaignId;
        null !== $tcrCampaignId && $obj['tcrCampaignId'] = $tcrCampaignId;

        return $obj;
    }

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileId'] = $messagingProfileID;

        return $obj;
    }

    /**
     * The ID of the task associated with assigning a messaging profile to a campaign.
     */
    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj['taskId'] = $taskID;

        return $obj;
    }

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignId'] = $campaignID;

        return $obj;
    }

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj['tcrCampaignId'] = $tcrCampaignID;

        return $obj;
    }
}
