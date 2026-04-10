<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\FileParam;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoUploadResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhotoContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): PhotoGetResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param string|FileParam $file Image file (JPEG recommended, max 10 MB)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $phoneNumber,
        string|FileParam $file,
        RequestOptions|array|null $requestOptions = null,
    ): PhotoUploadResponse;
}
