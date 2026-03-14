<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoUploadParams;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoUploadResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhotoRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array<string,mixed>|PhotoUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhotoUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        string $phoneNumber,
        array|PhotoUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
