<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;

/**
 * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
 * That is: <ul>
 *   <li>
 *     <code>name</code>: sorts the result by the
 *     <code>name</code> field in ascending order.
 *   </li>.
 *
 *   <li>
 *     <code>-name</code>: sorts the result by the
 *     <code>name</code> field in descending order.
 *   </li>
 * </ul> <br/>
 */
enum Sort: string
{
    case ENABLED = 'enabled';

    case ENABLED_DESC = '-enabled';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';

    case NAME = 'name';

    case NAME_DESC = '-name';

    case SERVICE_PLAN = 'service_plan';

    case SERVICE_PLAN_DESC = '-service_plan';

    case TRAFFIC_TYPE = 'traffic_type';

    case TRAFFIC_TYPE_DESC = '-traffic_type';

    case USAGE_PAYMENT_METHOD = 'usage_payment_method';

    case USAGE_PAYMENT_METHOD_DESC = '-usage_payment_method';
}
