<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create New Phone Number Campaign.
 *
 * @see Telnyx\Services\PhoneNumberCampaignsService::create()
 *
 * @phpstan-type PhoneNumberCampaignCreateParamsShape = array{
 *   campaignId: string, phoneNumber: string
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
    #[Api]
    public string $campaignId;

    /**
     * The phone number you want to link to a specified campaign.
     */
    #[Api]
    public string $phoneNumber;

    /**
     * `new PhoneNumberCampaignCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberCampaignCreateParams::with(campaignId: ..., phoneNumber: ...)
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
    public static function with(string $campaignId, string $phoneNumber): self
    {
        $obj = new self;

        $obj->campaignId = $campaignId;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The ID of the campaign you want to link to the specified phone number.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignId = $campaignID;

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
