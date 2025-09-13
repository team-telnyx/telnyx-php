<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

use const Telnyx\Core\OMIT as omit;

interface SslCertificateContract
{
    /**
     * @api
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
    ): SslCertificateNewResponse;

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
        ?RequestOptions $requestOptions = null,
    ): SslCertificateNewResponse;

    /**
     * @api
     *
     * @return SslCertificateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse;

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
        ?RequestOptions $requestOptions = null,
    ): SslCertificateGetResponse;

    /**
     * @api
     *
     * @return SslCertificateDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse;

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
        ?RequestOptions $requestOptions = null,
    ): SslCertificateDeleteResponse;
}
