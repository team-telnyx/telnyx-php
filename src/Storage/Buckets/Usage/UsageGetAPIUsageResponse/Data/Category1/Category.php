<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1;

/**
 * The category of the bucket operation.
 */
enum Category: string
{
    case LIST_BUCKET = 'list_bucket';

    case LIST_BUCKETS = 'list_buckets';

    case GET_BUCKET_LOCATION = 'get-bucket_location';

    case CREATE_BUCKET = 'create_bucket';

    case STAT_BUCKET = 'stat_bucket';

    case GET_BUCKET_VERSIONING = 'get_bucket_versioning';

    case SET_BUCKET_VERSIONING = 'set_bucket_versioning';

    case GET_OBJ = 'get_obj';

    case PUT_OBJ = 'put_obj';

    case DELETE_OBJ = 'delete_obj';
}
