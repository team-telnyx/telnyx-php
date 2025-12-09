<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\SslCertificateContract;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateCreateParams;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

final class SslCertificateService implements SslCertificateContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Uploads an SSL certificate and its matching secret so that you can use Telnyx's storage as your CDN.
     *
     * @param array{
     *   certificate?: string, privateKey?: string
     * }|SslCertificateCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        array|SslCertificateCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SslCertificateNewResponse {
        [$parsed, $options] = SslCertificateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SslCertificateNewResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: SslCertificateNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the stored certificate detail of a bucket, if applicable.
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse {
        /** @var BaseResponse<SslCertificateGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            options: $requestOptions,
            convert: SslCertificateGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an SSL certificate and its matching secret.
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse {
        /** @var BaseResponse<SslCertificateDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            options: $requestOptions,
            convert: SslCertificateDeleteResponse::class,
        );

        return $response->parse();
    }
}
