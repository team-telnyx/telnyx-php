<?php

namespace Telnyx;

/**
 * Class PhoneNumberAssignmentByProfile
 *
 * @package Telnyx
 */
class PhoneNumberAssignmentByProfile extends ApiResource
{
    const OBJECT_NAME = "phone_number_assignment_by_profile";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    
    /**
     * @return string The endpoint associated with this singleton class.
     */
    public static function classUrl()
    {
        // Use a custom URL for this resource
        // NOTE: This endpoint is special because object name and endpoint are both not plural 
        return "/v2/phoneNumberAssignmnetByProfile";
    }
    public function phone_numbers($params = null, $options = null)
    {
        $url = $this->instanceUrl() . '/phoneNumbers';
        list($response, $opts) = $this->_request('get', $url, $params, $options);
        $this->refreshFrom($response, $opts);
        return $this;
    }
}
