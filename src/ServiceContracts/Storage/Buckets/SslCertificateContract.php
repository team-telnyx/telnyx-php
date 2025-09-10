<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

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
     */
    public function create(
        string $bucketName,
        $certificate = omit,
        $privateKey = omit,
        ?RequestOptions $requestOptions = null,
    ): SslCertificateNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateGetResponse;

    /**
     * @api
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse;
}
