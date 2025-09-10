<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberCampaignUpdateParams); // set properties as needed
 * $client->phoneNumberCampaigns->update(...$params->toArray());
 * ```
 * Create New Phone Number Campaign.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumberCampaigns->update(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumberCampaigns->update
 *
 * @phpstan-type phone_number_campaign_update_params = array{
 *   campaignID: string, phoneNumber: string
 * }
 */
final class PhoneNumberCampaignUpdateParams implements BaseModel
{
    /** @use SdkModel<phone_number_campaign_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the campaign you want to link to the specified phone number.
     */
    #[Api('campaignId')]
    public string $campaignID;

    /**
     * The phone number you want to link to a specified campaign.
     */
    #[Api]
    public string $phoneNumber;

    /**
     * `new PhoneNumberCampaignUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCampaignUpdateParams::with(campaignID: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberCampaignUpdateParams)->withCampaignID(...)->withPhoneNumber(...)
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
        $obj = new self;

        $obj->campaignID = $campaignID;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The ID of the campaign you want to link to the specified phone number.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignID = $campaignID;

        return $obj;
    }

    /**
     * The phone number you want to link to a specified campaign.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
