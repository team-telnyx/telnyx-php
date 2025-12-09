<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

interface SslCertificateContract
{
    /**
     * @api
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
    ): SslCertificateNewResponse;

    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
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
     * @param string $bucketName Bucket Name
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        ?RequestOptions $requestOptions = null
    ): SslCertificateDeleteResponse;
}
