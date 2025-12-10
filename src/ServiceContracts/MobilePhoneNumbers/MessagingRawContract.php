<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MobilePhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListParams;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse;
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
     * @param array<mixed>|MessagingListParams $params
     *
     * @return BaseResponse<DefaultPagination<MessagingListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
