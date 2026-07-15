<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

/**
 * Lifecycle status of the filesystem. `ready` means it is fully provisioned and usable. `needs_format` means the storage bucket and metadata database were provisioned but the filesystem has not yet been formatted — run `juicefs format` with the filesystem's `meta_url` before mounting. `failed` means the last lifecycle action failed — see the filesystem's `error` message. `deleted` appears only in the delete response: deleted filesystems are excluded from list results and return a `404` on retrieval.
 */
enum CloudfsFilesystemStatus: string
{
    case PROVISIONING = 'provisioning';

    case READY = 'ready';

    case NEEDS_FORMAT = 'needs_format';

    case DELETING = 'deleting';

    case FAILED = 'failed';

    case DELETED = 'deleted';
}
