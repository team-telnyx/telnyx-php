<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ActionsContract;
use Telnyx\Verifications\Actions\ActionVerifyParams\Status;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;

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
     * Verify verification code by ID
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param string $code this is the code the user submits for verification
     * @param 'accepted'|'rejected'|Status $status Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
     *
     * @throws APIException
     */
    public function verify(
        string $verificationID,
        ?string $code = null,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): VerifyVerificationCodeResponse {
        $params = ['code' => $code, 'status' => $status];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($verificationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
