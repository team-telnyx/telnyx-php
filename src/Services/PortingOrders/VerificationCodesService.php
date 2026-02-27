<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\VerificationCodesContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort
 * @phpstan-import-type VerificationCodeShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[verified]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VerificationCodeListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

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
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $id,
        ?array $phoneNumbers = null,
        VerificationMethod|string|null $verificationMethod = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'phoneNumbers' => $phoneNumbers,
                'verificationMethod' => $verificationMethod,
            ],
        );

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
     * @param list<VerificationCode|VerificationCodeShape> $verificationCodes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        ?array $verificationCodes = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationCodeVerifyResponse {
        $params = Util::removeNulls(['verificationCodes' => $verificationCodes]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
