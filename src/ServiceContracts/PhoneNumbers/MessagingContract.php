<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Messaging\MessagingGetResponse;
use Telnyx\PhoneNumbers\Messaging\MessagingListParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateParams;
use Telnyx\PhoneNumbers\Messaging\MessagingUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;

interface MessagingContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingListParams $params
     *
     * @return DefaultPagination<PhoneNumberWithMessagingSettings>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
