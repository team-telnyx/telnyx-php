<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\Profile\PhotoContract;
use Telnyx\Whatsapp\PhoneNumbers\Profile\Photo\PhotoUploadResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhotoService implements PhotoContract
{
    /**
     * @api
     */
    public PhotoRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhotoRawService($client);
    }

    /**
     * @api
     *
     * Delete Whatsapp profile photo
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload Whatsapp profile photo
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param string $file Image file (JPEG recommended, max 10 MB)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $phoneNumber,
        string $file,
        RequestOptions|array|null $requestOptions = null,
    ): PhotoUploadResponse {
        $params = Util::removeNulls(['file' => $file]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
