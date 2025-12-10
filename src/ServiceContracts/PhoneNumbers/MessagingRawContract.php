<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;

interface MessagingRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<MessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the phone number to update
     * @param array<mixed>|MessagingUpdateParams $params
     *
     * @return BaseResponse<MessagingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingListParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
