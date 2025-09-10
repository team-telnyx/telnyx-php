<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications\CallControlApplicationListParams;

/**
 * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
 * That is: <ul>
 *   <li>
 *     <code>connection_name</code>: sorts the result by the
 *     <code>connection_name</code> field in ascending order.
 *   </li>.
 *
 *   <li>
 *     <code>-connection_name</code>: sorts the result by the
 *     <code>connection_name</code> field in descending order.
 *   </li>
 * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case CONNECTION_NAME = 'connection_name';

    case ACTIVE = 'active';
}
