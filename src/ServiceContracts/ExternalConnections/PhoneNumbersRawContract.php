<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberRetrieveParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface PhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumberID A phone number's ID via the Telnyx API
     * @param array<mixed>|PhoneNumberRetrieveParams $params
     *
     * @return BaseResponse<PhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        array|PhoneNumberRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID Path param: A phone number's ID via the Telnyx API
     * @param array<mixed>|PhoneNumberUpdateParams $params
     *
     * @return BaseResponse<PhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|PhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|PhoneNumberListParams $params
     *
     * @return BaseResponse<DefaultPagination<ExternalConnectionPhoneNumber>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|PhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
