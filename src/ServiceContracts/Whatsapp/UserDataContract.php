<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\UserData\UserDataGetResponse;
use Telnyx\Whatsapp\UserData\UserDataUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserDataContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): UserDataGetResponse;

    /**
     * @api
     *
     * @param string $webhookFailoverURL Failover URL to send Whatsapp signup events
     * @param string $webhookURL URL to send Whatsapp signup events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserDataUpdateResponse;
}
