<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateGetResponse;
use Telnyx\MessagingNumbersBulkUpdates\MessagingNumbersBulkUpdateNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param bool $assignOnly if true, only assign numbers to the profile without changing other settings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $messagingProfileID,
        array $numbers,
        bool $assignOnly = false,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingNumbersBulkUpdateNewResponse;

    /**
     * @api
     *
     * @param string $orderID order ID to verify bulk update status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse;
}
