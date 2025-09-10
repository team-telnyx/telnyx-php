<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\ManagedAccountListParams;

/**
 * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
 * That is: <ul>
 *   <li>
 *     <code>email</code>: sorts the result by the
 *     <code>email</code> field in ascending order.
 *   </li>.
 *
 *   <li>
 *     <code>-email</code>: sorts the result by the
 *     <code>email</code> field in descending order.
 *   </li>
 * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case EMAIL = 'email';
}
