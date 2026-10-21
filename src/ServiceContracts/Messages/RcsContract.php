<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messages\Rcs\RcGenerateDeeplinkResponse;
use Telnyx\Messages\Rcs\RcSendParams\MmsFallback;
use Telnyx\Messages\Rcs\RcSendParams\SMSFallback;
use Telnyx\Messages\Rcs\RcSendParams\Type;
use Telnyx\Messages\Rcs\RcSendResponse;
use Telnyx\Messages\RcsAgentMessage;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RcsAgentMessageShape from \Telnyx\Messages\RcsAgentMessage
 * @phpstan-import-type MmsFallbackShape from \Telnyx\Messages\Rcs\RcSendParams\MmsFallback
 * @phpstan-import-type SMSFallbackShape from \Telnyx\Messages\Rcs\RcSendParams\SMSFallback
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RcsContract
{
    /**
     * @api
     *
     * @param string $agentID RCS agent ID
     * @param string $body Pre-filled message body (URL encoded)
     * @param string $phoneNumber Phone number in E164 format (URL encoded)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateDeeplink(
        string $agentID,
        ?string $body = null,
        ?string $phoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): RcGenerateDeeplinkResponse;

    /**
     * @api
     *
     * @param string $agentID Body param: RCS Agent ID
     * @param RcsAgentMessage|RcsAgentMessageShape $agentMessage Body param
     * @param string $messagingProfileID Body param: A valid messaging profile ID
     * @param string $to Body param: Phone number in +E.164 format
     * @param MmsFallback|MmsFallbackShape $mmsFallback Body param
     * @param SMSFallback|SMSFallbackShape $smsFallback Body param
     * @param Type|value-of<Type> $type Body param: Message type - must be set to "RCS"
     * @param string $webhookURL body param: The URL where webhooks related to this message will be sent
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $agentID,
        RcsAgentMessage|array $agentMessage,
        string $messagingProfileID,
        string $to,
        MmsFallback|array|null $mmsFallback = null,
        SMSFallback|array|null $smsFallback = null,
        Type|string|null $type = null,
        ?string $webhookURL = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): RcSendResponse;
}
