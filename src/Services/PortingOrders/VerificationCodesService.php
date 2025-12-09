<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort\Value;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\VerificationCodesContract;

final class VerificationCodesService implements VerificationCodesContract
{
    /**
     * @api
     */
    public VerificationCodesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerificationCodesRawService($client);
    }

    /**
     * @api
     *
     * Returns a list of verification codes for a porting order.
     *
     * @param string $id Porting Order id
     * @param array{
     *   verified?: bool
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[verified]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send the verification code for all porting phone numbers.
     *
     * @param string $id Porting Order id
     * @param list<string> $phoneNumbers
     * @param 'sms'|'call'|VerificationMethod $verificationMethod
     *
     * @throws APIException
     */
    public function send(
        string $id,
        ?array $phoneNumbers = null,
        string|VerificationMethod|null $verificationMethod = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'phoneNumbers' => $phoneNumbers,
            'verificationMethod' => $verificationMethod,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Verifies the verification code for a list of phone numbers.
     *
     * @param string $id Porting Order id
     * @param list<array{code?: string, phoneNumber?: string}> $verificationCodes
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        ?array $verificationCodes = null,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeVerifyResponse {
        $params = ['verificationCodes' => $verificationCodes];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
