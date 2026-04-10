<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SslCertificateContract
{
    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param string|FileParam $certificate The SSL certificate file
     * @param string|FileParam $privateKey The private key file
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        string|FileParam|null $certificate = null,
        string|FileParam|null $privateKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): SslCertificateNewResponse;

    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): SslCertificateGetResponse;

    /**
     * @api
     *
     * @param string $bucketName Bucket Name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): SslCertificateDeleteResponse;
}
