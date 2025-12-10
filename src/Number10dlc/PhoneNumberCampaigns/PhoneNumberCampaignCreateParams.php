<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create New Phone Number Campaign.
 *
 * @see Telnyx\Services\Number10dlc\PhoneNumberCampaignsService::create()
 *
 * @phpstan-type PhoneNumberCampaignCreateParamsShape = array{
 *   campaignID: string, phoneNumber: string
 * }
 */
final class PhoneNumberCampaignCreateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberCampaignCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the campaign you want to link to the specified phone number.
     */
    #[Required('campaignId')]
    public string $campaignID;

    /**
     * The phone number you want to link to a specified campaign.
     */
    #[Required]
    public string $phoneNumber;

    /**
     * `new PhoneNumberCampaignCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCampaignCreateParams::with(campaignID: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberCampaignCreateParams)->withCampaignID(...)->withPhoneNumber(...)
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
    public static function with(string $campaignID, string $phoneNumber): self
    {
        $self = new self;

        $self['campaignID'] = $campaignID;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The ID of the campaign you want to link to the specified phone number.
     */
    public function withCampaignID(string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    /**
     * The phone number you want to link to a specified campaign.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
