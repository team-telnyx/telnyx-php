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
     * @param string $agentID RCS Agent ID
     * @param RcsAgentMessage|RcsAgentMessageShape $agentMessage
     * @param string $messagingProfileID A valid messaging profile ID
     * @param string $to Phone number in +E.164 format
     * @param MmsFallback|MmsFallbackShape $mmsFallback
     * @param SMSFallback|SMSFallbackShape $smsFallback
     * @param Type|value-of<Type> $type Message type - must be set to "RCS"
     * @param string $webhookURL the URL where webhooks related to this message will be sent
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
        RequestOptions|array|null $requestOptions = null,
    ): RcSendResponse;
}
