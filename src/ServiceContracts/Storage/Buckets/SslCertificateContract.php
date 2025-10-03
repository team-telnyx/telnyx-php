<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse;
}
