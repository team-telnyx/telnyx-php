<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams\Page;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

use const Telnyx\Core\OMIT as omit;

interface VerifiedNumbersContract
{
    /**
     * @api
     *
     * @param string $phoneNumber
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod verification method
     */
    public function create(
        $phoneNumber,
        $verificationMethod,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberListResponse;

    /**
     * @api
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;
}
