<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\BucketsContract;
use Telnyx\Services\Storage\Buckets\SslCertificateService;
use Telnyx\Services\Storage\Buckets\UsageService;
use Telnyx\Storage\Buckets\BucketCreatePresignedURLParams;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

final class BucketsService implements BucketsContract
{
    /**
     * @api
     */
    public SslCertificateService $sslCertificate;

    /**
     * @api
     */
    public UsageService $usage;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->sslCertificate = new SslCertificateService($client);
        $this->usage = new UsageService($client);
    }

    /**
     * @api
     *
     * Returns a timed and authenticated URL to get an object. This is the equivalent to AWS S3’s “presigned” URL. Please note that Telnyx performs authentication differently from AWS S3 and you MUST NOT use the presign method of AWS s3api CLI or sdk to generate the presigned URL.
     *
     * Refer to: https://developers.telnyx.com/docs/cloud-storage/presigned-urls
     *
     * @param array{
     *   bucketName: string, ttl?: int
     * }|BucketCreatePresignedURLParams $params
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        array|BucketCreatePresignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): BucketNewPresignedURLResponse {
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
            body: (object) array_diff_key($parsed, ['bucketName']),
            options: $options,
            convert: BucketNewPresignedURLResponse::class,
        );
    }
}
