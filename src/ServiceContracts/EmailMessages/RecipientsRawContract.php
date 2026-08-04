<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailMessages;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailMessages\Recipients\RecipientGetResponse;
use Telnyx\EmailMessages\Recipients\RecipientListParams;
use Telnyx\EmailMessages\Recipients\RecipientListResponse;
use Telnyx\EmailMessages\Recipients\RecipientRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecipientsRawContract
{
    /**
     * @api
     *
     * @param string $recipientID recipient UUID
     * @param array<string,mixed>|RecipientRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecipientGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recipientID,
        array|RecipientRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID email message UUID
     * @param array<string,mixed>|RecipientListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecipientListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $emailID,
        array|RecipientListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
