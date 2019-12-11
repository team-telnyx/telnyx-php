<?php

namespace Telnyx;

/**
 * Class RegulatoryRequirements
 *
 * @package Telnyx
 */
class RegulatoryRequirement extends ApiResource
{

    const OBJECT_NAME = "regulatory_requirement";

    use ApiOperations\All;
    use ApiOperations\Retrieve;

}
