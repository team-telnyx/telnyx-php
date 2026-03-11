<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ProfileContract
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
    ): ProfileGetResponse;

    /**
     * @api
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
    ): ProfileUpdateResponse;
}
