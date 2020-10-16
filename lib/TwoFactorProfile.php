<?php

namespace Telnyx;

/**
 * Class TwoFactorProfile
 *
 * @package Telnyx
 */
class TwoFactorProfile extends ApiResource
{
    const OBJECT_NAME = "2fa_profile";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
    use ApiOperations\Delete;
    
}
