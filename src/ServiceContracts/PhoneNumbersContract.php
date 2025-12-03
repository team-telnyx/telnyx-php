<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberDetailed;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|PhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberListParams $params
     *
     * @return DefaultPagination<PhoneNumberDetailed>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberSlimListParams $params
     *
     * @return DefaultPagination<PhoneNumberSlimListResponse>
     *
     * @throws APIException
     */
    public function slimList(
        array|PhoneNumberSlimListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
