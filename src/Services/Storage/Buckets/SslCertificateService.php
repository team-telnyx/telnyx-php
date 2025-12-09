<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\SslCertificateContract;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

final class SslCertificateService implements SslCertificateContract
{
    /**
     * @api
     */
    public SslCertificateRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SslCertificateRawService($client);
    }

    /**
     * @api
     *
     * Uploads an SSL certificate and its matching secret so that you can use Telnyx's storage as your CDN.
     *
     * @param string $bucketName The name of the bucket
     * @param string $certificate The SSL certificate file
     * @param string $privateKey The private key file
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        ?string $certificate = null,
        ?string $privateKey = null,
        ?RequestOptions $requestOptions = null,
    ): SslCertificateNewResponse {
        $params = ['certificate' => $certificate, 'privateKey' => $privateKey];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($bucketName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the stored certificate detail of a bucket, if applicable.
     *
     * @param string $bucketName The name of the bucket
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($bucketName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an SSL certificate and its matching secret.
     *
     * @param string $bucketName Bucket Name
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($bucketName, requestOptions: $requestOptions);

        return $response->parse();
    }
}
