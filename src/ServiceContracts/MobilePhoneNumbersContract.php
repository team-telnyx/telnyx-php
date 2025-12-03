<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface MobilePhoneNumbersContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobilePhoneNumberGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MobilePhoneNumberUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobilePhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobilePhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MobilePhoneNumberListParams $params
     *
     * @return DefaultFlatPagination<MobilePhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
