<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Page;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort
 * @phpstan-import-type VerificationCodeShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerificationCodesContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[verified]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<VerificationCodeListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): VerificationCodeVerifyResponse;
}
