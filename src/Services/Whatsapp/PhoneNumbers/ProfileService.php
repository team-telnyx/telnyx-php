<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\ProfileContract;
use Telnyx\Services\Whatsapp\PhoneNumbers\Profile\ModelsService;
use Telnyx\Services\Whatsapp\PhoneNumbers\Profile\PhotoService;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ProfileService implements ProfileContract
{
    /**
     * @api
     */
    public ProfileRawService $raw;

    /**
     * @api
     */
    public PhotoService $photo;

    /**
     * @api
     */
    public ModelsService $models;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProfileRawService($client);
        $this->photo = new PhotoService($client);
        $this->models = new ModelsService($client);
    }

    /**
     * @api
     *
     * Get phone number business profile
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): ProfileGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update phone number business profile
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        ?string $about = null,
        ?string $address = null,
        ?string $category = null,
        ?string $description = null,
        ?string $displayName = null,
        ?string $email = null,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileUpdateResponse {
        $params = Util::removeNulls(
            [
                'about' => $about,
                'address' => $address,
                'category' => $category,
                'description' => $description,
                'displayName' => $displayName,
                'email' => $email,
                'website' => $website,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
