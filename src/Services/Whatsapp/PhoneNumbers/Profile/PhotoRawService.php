<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\Profile\PhotoRawContract;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoUploadParams;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoUploadResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhotoRawService implements PhotoRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Whatsapp profile photo
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhotoGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/whatsapp/phone_numbers/%1$s/profile/photo', $phoneNumber],
            options: $requestOptions,
            convert: PhotoGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Whatsapp profile photo
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['v2/whatsapp/phone_numbers/%1$s/profile/photo', $phoneNumber],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Upload Whatsapp profile photo
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array{file: string}|PhotoUploadParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PhotoUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['v2/whatsapp/phone_numbers/%1$s/profile/photo', $phoneNumber],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: PhotoUploadResponse::class,
        );
    }
}
