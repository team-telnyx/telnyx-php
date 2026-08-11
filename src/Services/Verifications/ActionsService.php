<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ActionsContract;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

/**
 * Two factor authentication API.
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
     * Checks the supplied code, or the supplied status for a custom-code verification, against the verification identified by ID. The response indicates whether the verification was accepted or rejected.
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param string $code this is the code the user submits for verification
     * @param Status|value-of<Status> $status Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        ?string $code = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        $params = Util::removeNulls(['code' => $code, 'status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($verificationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
