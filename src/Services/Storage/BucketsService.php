<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\BucketsContract;
use Telnyx\Services\Storage\Buckets\SslCertificateService;
use Telnyx\Services\Storage\Buckets\UsageService;
use Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BucketsService implements BucketsContract
{
    /**
     * @api
     */
    public BucketsRawService $raw;

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
        $this->raw = new BucketsRawService($client);
        $this->sslCertificate = new SslCertificateService($client);
        $this->usage = new UsageService($client);
    }

    /**
     * @api
     *
     * Returns a timed and authenticated URL to download (GET) or upload (PUT) an object. This is the equivalent to AWS S3’s “presigned” URL. Please note that Telnyx performs authentication differently from AWS S3 and you MUST NOT use the presign method of AWS s3api CLI or SDK to generate the presigned URL.
     *
     * Refer to: https://developers.telnyx.com/docs/cloud-storage/presigned-urls
     *
     * @param string $objectName Path param: The name of the object
     * @param string $bucketName Path param: The name of the bucket
     * @param int $ttl Body param: The time to live of the token in seconds
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPresignedURL(
        string $objectName,
        string $bucketName,
        ?int $ttl = null,
        RequestOptions|array|null $requestOptions = null,
    ): BucketNewPresignedURLResponse {
        $params = Util::removeNulls(['bucketName' => $bucketName, 'ttl' => $ttl]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createPresignedURL($objectName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
