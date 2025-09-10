<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Messsages\MesssageRcsParams;
use Telnyx\Messsages\MesssageRcsParams\MmsFallback;
use Telnyx\Messsages\MesssageRcsParams\SMSFallback;
use Telnyx\Messsages\MesssageRcsParams\Type;
use Telnyx\Messsages\MesssageRcsResponse;
use Telnyx\Messsages\RcsAgentMessage;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MesssagesContract;

use const Telnyx\Core\OMIT as omit;

final class MesssagesService implements MesssagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send an RCS message
     *
     * @param string $agentID RCS Agent ID
     * @param RcsAgentMessage $agentMessage
     * @param string $messagingProfileID A valid messaging profile ID
     * @param string $to Phone number in +E.164 format
     * @param MmsFallback $mmsFallback
     * @param SMSFallback $smsFallback
     * @param Type|value-of<Type> $type Message type - must be set to "RCS"
     * @param string $webhookURL the URL where webhooks related to this message will be sent
     */
    public function rcs(
        $agentID,
        $agentMessage,
        $messagingProfileID,
        $to,
        $mmsFallback = omit,
        $smsFallback = omit,
        $type = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MesssageRcsResponse {
        [$parsed, $options] = MesssageRcsParams::parseRequest(
            [
                'agentID' => $agentID,
                'agentMessage' => $agentMessage,
                'messagingProfileID' => $messagingProfileID,
                'to' => $to,
                'mmsFallback' => $mmsFallback,
                'smsFallback' => $smsFallback,
                'type' => $type,
                'webhookURL' => $webhookURL,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'messsages/rcs',
            body: (object) $parsed,
            options: $options,
            convert: MesssageRcsResponse::class,
        );
    }
}
