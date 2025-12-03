<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumber;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

interface VerifiedNumbersContract
{
    /**
     * @api
     *
     * @param array<mixed>|VerifiedNumberCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VerifiedNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @param array<mixed>|VerifiedNumberListParams $params
     *
     * @return DefaultFlatPagination<VerifiedNumber>
     *
     * @throws APIException
     */
    public function list(
        array|VerifiedNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;
}
