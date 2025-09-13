<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Buckets;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Buckets\SslCertificateContract;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateCreateParams;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

use const Telnyx\Core\OMIT as omit;

final class SslCertificateService implements SslCertificateContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Uploads an SSL certificate and its matching secret so that you can use Telnyx’s storage as your CDN.
     *
     * @param string $certificate The SSL certificate file
     * @param string $privateKey The private key file
     *
     * @return SslCertificateNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        $certificate = omit,
        $privateKey = omit,
        ?RequestOptions $requestOptions = null,
    ): SslCertificateNewResponse {
        $params = ['certificate' => $certificate, 'privateKey' => $privateKey];

        return $this->createRaw($bucketName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SslCertificateNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $bucketName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SslCertificateNewResponse {
        [$parsed, $options] = SslCertificateCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return SslCertificateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse {
        $params = [];

        return $this->retrieveRaw($bucketName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SslCertificateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $bucketName,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse {
        // @phpstan-ignore-next-line;
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
     * @return SslCertificateDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse {
        $params = [];

        return $this->deleteRaw($bucketName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SslCertificateDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $bucketName,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['storage/buckets/%1$s/ssl_certificate', $bucketName],
            options: $requestOptions,
            convert: SslCertificateDeleteResponse::class,
        );
    }
}
