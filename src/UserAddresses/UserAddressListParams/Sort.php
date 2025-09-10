<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses\UserAddressListParams;

/**
 * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
 * That is: <ul>
 *   <li>
 *     <code>street_address</code>: sorts the result by the
 *     <code>street_address</code> field in ascending order.
 *   </li>.
 *
 *   <li>
 *     <code>-street_address</code>: sorts the result by the
 *     <code>street_address</code> field in descending order.
 *   </li>
 * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case FIRST_NAME = 'first_name';

    case LAST_NAME = 'last_name';

    case BUSINESS_NAME = 'business_name';

    case STREET_ADDRESS = 'street_address';
}
