<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MobilePhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListParams;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessagingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessagingListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
