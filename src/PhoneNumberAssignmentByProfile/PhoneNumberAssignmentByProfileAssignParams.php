<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberAssignmentByProfileAssignParams); // set properties as needed
 * $client->phoneNumberAssignmentByProfile->assign(...$params->toArray());
 * ```
 * This endpoint allows you to link all phone numbers associated with a Messaging Profile to a campaign. **Please note:** if you want to assign phone numbers to a campaign that you did not create with Telnyx 10DLC services, this endpoint allows that provided that you've shared the campaign with Telnyx. In this case, only provide the parameter, `tcrCampaignId`, and not `campaignId`. In all other cases (where the campaign you're assigning was created with Telnyx 10DLC services), only provide `campaignId`, not `tcrCampaignId`.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumberAssignmentByProfile->assign(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumberAssignmentByProfile->assign
 *
 * @phpstan-type phone_number_assignment_by_profile_assign_params = array{
 *   messagingProfileID: string, campaignID?: string, tcrCampaignID?: string
 * }
 */
final class PhoneNumberAssignmentByProfileAssignParams implements BaseModel
{
    /** @use SdkModel<phone_number_assignment_by_profile_assign_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the messaging profile that you want to link to the specified campaign.
     */
    #[Api('messagingProfileId')]
    public string $messagingProfileID;

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
     * `new PhoneNumberAssignmentByProfileAssignParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileAssignParams::with(messagingProfileID: ...)
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
        string $messagingProfileID,
        ?string $campaignID = null,
        ?string $tcrCampaignID = null,
    ): self {
        $obj = new self;

        $obj->messagingProfileID = $messagingProfileID;

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
