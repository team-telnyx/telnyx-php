<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberRetrieveParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        array|PhoneNumberRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @return DefaultPagination<ExternalConnectionPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|PhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
