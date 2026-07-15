<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Cloudfs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param string $idempotencyKey Unique key that makes the request idempotent (1-255 characters: letters, numbers, `_`, and `-`). Retrying with the same key within 24 hours replays the original response (marked with an `Idempotent-Replayed: true` header) instead of repeating the action. Reusing a key with a different request returns a `422`; sending a key while the original request is still being processed returns a `409`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rotateMetaToken(
        string $id,
        string $idempotencyKey,
        RequestOptions|array|null $requestOptions = null,
    ): CloudfsFilesystemResponseWrapper;
}
