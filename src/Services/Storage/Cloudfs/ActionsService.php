<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Cloudfs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Cloudfs\ActionsContract;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;

/**
 * Manage CloudFS filesystems — JuiceFS-compatible filesystems backed by Telnyx Cloud Storage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Issues a new metadata access token for the filesystem and returns the full filesystem, including the new `meta_token` and credential-bearing `meta_url`. The previous token stops authenticating immediately; the metadata database and S3 bucket are unchanged. The request takes no body. Allowed while the filesystem is `ready` or `needs_format`; otherwise returns a `409`. Retrying with the same `Idempotency-Key` within 24 hours replays the original response — including the same token — instead of rotating again.
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
    ): CloudfsFilesystemResponseWrapper {
        $params = Util::removeNulls(['idempotencyKey' => $idempotencyKey]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rotateMetaToken($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
