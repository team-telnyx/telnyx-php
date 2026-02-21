<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberGetResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberListParams;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberUpdateParams;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingHostedNumbersRawContract
{
    /**
     * @api
     *
     * @param string $id the ID or phone number of the hosted number
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberGetResponse>
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
     * @param string $id the ID or phone number of the hosted number
     * @param array<string,mixed>|MessagingHostedNumberUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessagingHostedNumberUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessagingHostedNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
