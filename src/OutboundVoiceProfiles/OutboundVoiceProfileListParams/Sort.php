<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;

/**
  * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
  * That is: <ul>
  *   <li>
  *     <code>name</code>: sorts the result by the
  *     <code>name</code> field in ascending order.
  *   </li>
  * 
  *   <li>
  *     <code>-name</code>: sorts the result by the
  *     <code>name</code> field in descending order.
  *   </li>
  * </ul> <br/>
  * 
 */
enum Sort : string
{

    case ENABLED = "enabled";

    case SORT_-ENABLED = "-enabled";

    case CREATED_AT = "created_at";

    case SORT_-CREATED_AT = "-created_at";

    case NAME = "name";

    case SORT_-NAME = "-name";

    case SERVICE_PLAN = "service_plan";

    case SORT_-SERVICE_PLAN = "-service_plan";

    case TRAFFIC_TYPE = "traffic_type";

    case SORT_-TRAFFIC_TYPE = "-traffic_type";

    case USAGE_PAYMENT_METHOD = "usage_payment_method";

    case SORT_-USAGE_PAYMENT_METHOD = "-usage_payment_method";

}