<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;

interface MessagingNumbersBulkUpdatesContract
{
    /**
     * @api
     *
     * @param string $messagingProfileID Configure the messaging profile these phone numbers are assigned to:
     *
     * * Set this field to `""` to unassign each number from their respective messaging profile
     * * Set this field to a quoted UUID of a messaging profile to assign these numbers to that messaging profile
     * @param list<string> $numbers the list of phone numbers to update
     *
     * @return MessagingNumbersBulkUpdateNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $messagingProfileID,
        $numbers,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessagingNumbersBulkUpdateNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateNewResponse;

    /**
     * @api
     *
     * @return MessagingNumbersBulkUpdateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse;

    /**
     * @api
     *
     * @return MessagingNumbersBulkUpdateGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $orderID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse;
}
