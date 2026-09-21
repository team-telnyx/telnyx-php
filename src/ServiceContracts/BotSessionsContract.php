<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BotSessions\BotSessionListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BotSessionsContract
{
    /**
     * @api
     *
     * @param string $email email address associated with the magic link token
     * @param string $portalRedirectToken single-use portal redirect (magic link) token, a UUIDv7 sent to the account owner's email
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $email,
        string $portalRedirectToken,
        RequestOptions|array|null $requestOptions = null,
    ): BotSessionListResponse;
}
