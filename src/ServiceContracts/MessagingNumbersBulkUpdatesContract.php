<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
     */
    public function create(
        $messagingProfileID,
        $numbers,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): MessagingNumbersBulkUpdateGetResponse;
}
