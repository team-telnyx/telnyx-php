<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;

/**
  * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
  * 
 */
enum Value : string
{

    case CREATED_AT = "created_at";

    case VALUE_-CREATED_AT = "-created_at";

    case UPDATED_AT = "updated_at";

    case VALUE_-UPDATED_AT = "-updated_at";

}