<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileAssignResponseShape = array{
 *   messagingProfileID: string,
 *   taskID: string,
 *   campaignID?: string|null,
 *   tcrCampaignID?: string|null,
 * }
 */
final class PhoneNumberAssignmentByProfileAssignResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileAssignResponseShape> */
    use SdkModel;

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    #[Required('messagingProfileId')]
    public string $messagingProfileID;

    /**
     * The ID of the task associated with assigning a messaging profile to a campaign.
     */
    #[Required('taskId')]
    public string $taskID;

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    #[Optional('campaignId')]
    public ?string $campaignID;

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    #[Optional('tcrCampaignId')]
    public ?string $tcrCampaignID;

    /**
     * `new PhoneNumberAssignmentByProfileAssignResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileAssignResponse::with(
     *   messagingProfileID: ..., taskID: ...
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
        string $messagingProfileID,
        string $taskID,
        ?string $campaignID = null,
        ?string $tcrCampaignID = null,
    ): self {
        $self = new self;

        $self['messagingProfileID'] = $messagingProfileID;
        $self['taskID'] = $taskID;

        null !== $campaignID && $self['campaignID'] = $campaignID;
        null !== $tcrCampaignID && $self['tcrCampaignID'] = $tcrCampaignID;

        return $self;
    }

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The ID of the task associated with assigning a messaging profile to a campaign.
     */
    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    public function withCampaignID(string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $self = clone $this;
        $self['tcrCampaignID'] = $tcrCampaignID;

        return $self;
    }
}
