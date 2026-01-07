<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Buckets;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateCreateParams;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateDeleteResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateGetResponse;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificateNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SslCertificateRawContract
{
    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param array<string,mixed>|SslCertificateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SslCertificateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        array|SslCertificateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $bucketName The name of the bucket
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SslCertificateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $bucketName Bucket Name
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SslCertificateDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $bucketName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
