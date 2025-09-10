<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\RequestOptions;

interface MessagingHostedNumbersContract
{
    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberDeleteResponse;
}
