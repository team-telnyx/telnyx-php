<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Cloudfs;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Cloudfs\ActionsRawContract;
use Telnyx\Storage\Cloudfs\Actions\ActionRotateMetaTokenParams;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;

/**
 * Manage CloudFS filesystems — JuiceFS-compatible filesystems backed by Telnyx Cloud Storage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Issues a new metadata access token for the filesystem and returns the full filesystem, including the new `meta_token` and credential-bearing `meta_url`. The previous token stops authenticating immediately; the metadata database and S3 bucket are unchanged. The request takes no body. Allowed while the filesystem is `ready` or `needs_format`; otherwise returns a `409`. Retrying with the same `Idempotency-Key` within 24 hours replays the original response — including the same token — instead of rotating again.
     *
     * @param string $id CloudFS filesystem ID
     * @param array{idempotencyKey: string}|ActionRotateMetaTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemResponseWrapper>
     *
     * @throws APIException
     */
    public function rotateMetaToken(
        string $id,
        array|ActionRotateMetaTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRotateMetaTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['storage/cloudfs/%1$s/actions/rotate-meta-token', $id],
            headers: Util::array_transform_keys(
                $parsed,
                ['idempotencyKey' => 'Idempotency-Key']
            ),
            options: $options,
            convert: CloudfsFilesystemResponseWrapper::class,
        );
    }
}
