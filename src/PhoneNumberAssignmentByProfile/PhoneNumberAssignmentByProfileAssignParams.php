<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This endpoint allows you to link all phone numbers associated with a Messaging Profile to a campaign. **Please note:** if you want to assign phone numbers to a campaign that you did not create with Telnyx 10DLC services, this endpoint allows that provided that you've shared the campaign with Telnyx. In this case, only provide the parameter, `tcrCampaignId`, and not `campaignId`. In all other cases (where the campaign you're assigning was created with Telnyx 10DLC services), only provide `campaignId`, not `tcrCampaignId`.
 *
 * @see Telnyx\Services\PhoneNumberAssignmentByProfileService::assign()
 *
 * @phpstan-type PhoneNumberAssignmentByProfileAssignParamsShape = array{
 *   messagingProfileId: string, campaignId?: string, tcrCampaignId?: string
 * }
 */
final class PhoneNumberAssignmentByProfileAssignParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileAssignParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    #[Api]
    public string $messagingProfileId;

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    #[Api(optional: true)]
    public ?string $campaignId;

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    #[Api(optional: true)]
    public ?string $tcrCampaignId;

    /**
     * `new PhoneNumberAssignmentByProfileAssignParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileAssignParams::with(messagingProfileId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAssignmentByProfileAssignParams)->withMessagingProfileID(...)
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
        ?string $campaignId = null,
        ?string $tcrCampaignId = null,
    ): self {
        $obj = new self;

        $obj->messagingProfileId = $messagingProfileId;

        null !== $campaignId && $obj->campaignId = $campaignId;
        null !== $tcrCampaignId && $obj->tcrCampaignId = $tcrCampaignId;

        return $obj;
    }

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileId = $messagingProfileID;

        return $obj;
    }

    /**
     * The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignId = $campaignID;

        return $obj;
    }

    /**
     * The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj->tcrCampaignId = $tcrCampaignID;

        return $obj;
    }
}
