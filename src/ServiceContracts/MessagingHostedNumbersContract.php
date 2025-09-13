<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\RequestOptions;

interface MessagingHostedNumbersContract
{
    /**
     * @api
     *
     * @return MessagingHostedNumberDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberDeleteResponse;
}
