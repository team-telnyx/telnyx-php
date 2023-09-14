<?php

namespace Telnyx;

/**
 * Class PhoneNumberCampaign
 *
 * @package Telnyx
 */
class PhoneNumberCampaign extends ApiResource
{
    const OBJECT_NAME = "phone_number_campaign";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    
    /**
     * @return string The endpoint associated with this singleton class.
     */
    public static function classUrl()
    {
        // Use a custom URL for this resource
        // NOTE: This endpoint is special because object name and endpoint are not plural
        return "/v2/phoneNumberCampaign";
    }
}
