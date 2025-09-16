<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders\AuthenticationProviderListParams;

/**
 * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code>-</code> prefix.<br/><br/>
 * That is: <ul>
 *   <li>
 *     <code>name</code>: sorts the result by the
 *     <code>name</code> field in ascending order.
 *   </li>
 *   <li>
 *     <code>-name</code>: sorts the result by the
 *     <code>name</code> field in descending order.
 *   </li>
 * </ul><br/>If not given, results are sorted by <code>created_at</code> in descending order.
 */
enum Sort: string
{
    case NAME = 'name';

    case NAME_DESC = '-name';

    case SHORT_NAME = 'short_name';

    case SHORT_NAME_DESC = '-short_name';

    case ACTIVE = 'active';

    case ACTIVE_DESC = '-active';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT = 'updated_at';

    case UPDATED_AT_DESC = '-updated_at';
}
