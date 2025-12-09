<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\SslCertificateRawContract;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateCreateParams;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

final class SslCertificateRawService implements SslCertificateRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Uploads an SSL certificate and its matching secret so that you can use Telnyx's storage as your CDN.
     *
     * @param string $bucketName The name of the bucket
     * @param array{
     *   certificate?: string, privateKey?: string
     * }|SslCertificateCreateParams $params
     *
     * @return BaseResponse<SslCertificateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        array|SslCertificateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SslCertificateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: SslCertificateNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the stored certificate detail of a bucket, if applicable.
     *
     * @param string $bucketName The name of the bucket
     *
     * @return BaseResponse<SslCertificateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            options: $requestOptions,
            convert: SslCertificateGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an SSL certificate and its matching secret.
     *
     * @param string $bucketName Bucket Name
     *
     * @return BaseResponse<SslCertificateDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            options: $requestOptions,
            convert: SslCertificateDeleteResponse::class,
        );
    }
}
