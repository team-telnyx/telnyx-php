<?php

declare(strict_types=1);

namespace Telnyx\Services\VerifiedNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifiedNumbers\ActionsContract;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;

/**
 * Verified Numbers operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Submit verification code
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submitVerificationCode(
        string $phoneNumber,
        string $verificationCode,
        RequestOptions|array|null $requestOptions = null,
    ): VerifiedNumberDataWrapper {
        $params = Util::removeNulls(['verificationCode' => $verificationCode]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submitVerificationCode($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
