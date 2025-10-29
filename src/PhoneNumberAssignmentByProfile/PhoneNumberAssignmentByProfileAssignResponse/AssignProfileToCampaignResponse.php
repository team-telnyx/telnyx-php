<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssignProfileToCampaignResponseShape = array{
 *   messagingProfileID: string,
 *   taskID: string,
 *   campaignID?: string,
 *   tcrCampaignID?: string,
 * }
 */
final class AssignProfileToCampaignResponse implements BaseModel
{
    /** @use SdkModel<AssignProfileToCampaignResponseShape> */
    use SdkModel;

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    #[Api('messagingProfileId')]
    public string $messagingProfileID;

    /**
     * The ID of the task associated with assigning a messaging profile to a campaign.
     */
    #[Api('taskId')]
    public string $taskID;

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    #[Api('campaignId', optional: true)]
    public ?string $campaignID;

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    #[Api('tcrCampaignId', optional: true)]
    public ?string $tcrCampaignID;

    /**
     * `new AssignProfileToCampaignResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssignProfileToCampaignResponse::with(messagingProfileID: ..., taskID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssignProfileToCampaignResponse)
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
        $obj = new self;

        $obj->messagingProfileID = $messagingProfileID;
        $obj->taskID = $taskID;

        null !== $campaignID && $obj->campaignID = $campaignID;
        null !== $tcrCampaignID && $obj->tcrCampaignID = $tcrCampaignID;

        return $obj;
    }

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * The ID of the task associated with assigning a messaging profile to a campaign.
     */
    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->taskID = $taskID;

        return $obj;
    }

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignID = $campaignID;

        return $obj;
    }

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj->tcrCampaignID = $tcrCampaignID;

        return $obj;
    }
}
