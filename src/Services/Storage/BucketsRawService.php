<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\BucketsRawContract;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BucketsRawService implements BucketsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a timed and authenticated URL to download (GET) or upload (PUT) an object. This is the equivalent to AWS S3’s “presigned” URL. Please note that Telnyx performs authentication differently from AWS S3 and you MUST NOT use the presign method of AWS s3api CLI or SDK to generate the presigned URL.
     *
     * Refer to: https://developers.telnyx.com/docs/cloud-storage/presigned-urls
     *
     * @param string $objectName Path param: The name of the object
     * @param array{
     *   bucketName: string, ttl?: int
     * }|BucketCreatePresignedURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BucketNewPresignedURLResponse>
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        array|BucketCreatePresignedURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BucketCreatePresignedURLParams::parseRequest(
            $params,
            $requestOptions,
        );
        $bucketName = $parsed['bucketName'];
        unset($parsed['bucketName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'storage/buckets/%1$s/%2$s/presigned_url', $bucketName, $objectName,
            ],
            body: (object) array_diff_key($parsed, array_flip(['bucketName'])),
            options: $options,
            convert: BucketNewPresignedURLResponse::class,
        );
    }
}
