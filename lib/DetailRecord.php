<?php

namespace Telnyx;

/**
 * Class DetailRecord
 *
 * @package Telnyx
 */
class DetailRecord extends ApiResource
{
    const OBJECT_NAME = "detail_record";

    use ApiOperations\All{
        all as search; // Alias for search()
    }

}
