<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlRawContract;
use Telnyx\Texml\TexmlInitiateAICallParams;
use Telnyx\Texml\TexmlInitiateAICallParams\AsyncAmdStatusCallbackMethod;
use Telnyx\Texml\TexmlInitiateAICallParams\ConversationCallbackMethod;
use Telnyx\Texml\TexmlInitiateAICallParams\CustomHeader;
use Telnyx\Texml\TexmlInitiateAICallParams\DetectionMode;
use Telnyx\Texml\TexmlInitiateAICallParams\MachineDetection;
use Telnyx\Texml\TexmlInitiateAICallParams\RecordingChannels;
use Telnyx\Texml\TexmlInitiateAICallParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\TexmlInitiateAICallParams\RecordingTrack;
use Telnyx\Texml\TexmlInitiateAICallParams\SipRegion;
use Telnyx\Texml\TexmlInitiateAICallParams\StatusCallbackMethod;
use Telnyx\Texml\TexmlInitiateAICallParams\Trim;
use Telnyx\Texml\TexmlInitiateAICallResponse;
use Telnyx\Texml\TexmlSecretsParams;
use Telnyx\Texml\TexmlSecretsResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\TexmlInitiateAICallParams\CustomHeader
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TexmlRawService implements TexmlRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Initiate an outbound AI call with warm-up support. Validates parameters, builds an internal TeXML with an AI Assistant configuration, encodes instructions into client state, and calls the dial API. The Twiml, Texml, and Url parameters are not allowed and will result in a 422 error.
     *
     * @param string $connectionID the ID of the TeXML connection to use for the call
     * @param array{
     *   aiAssistantID: string,
     *   from: string,
     *   to: string,
     *   aiAssistantDynamicVariables?: array<string,string>,
     *   aiAssistantVersion?: string,
     *   asyncAmd?: bool,
     *   asyncAmdStatusCallback?: string,
     *   asyncAmdStatusCallbackMethod?: AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod>,
     *   callerID?: string,
     *   conversationCallback?: string,
     *   conversationCallbackMethod?: ConversationCallbackMethod|value-of<ConversationCallbackMethod>,
     *   conversationCallbacks?: list<string>,
     *   customHeaders?: list<CustomHeader|CustomHeaderShape>,
     *   detectionMode?: DetectionMode|value-of<DetectionMode>,
     *   machineDetection?: MachineDetection|value-of<MachineDetection>,
     *   machineDetectionSilenceTimeout?: int,
     *   machineDetectionSpeechEndThreshold?: int,
     *   machineDetectionSpeechThreshold?: int,
     *   machineDetectionTimeout?: int,
     *   passports?: string,
     *   preferredCodecs?: string,
     *   record?: bool,
     *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
     *   recordingStatusCallback?: string,
     *   recordingStatusCallbackEvent?: string,
     *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
     *   recordingTimeout?: int,
     *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
     *   sendRecordingURL?: bool,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   sipRegion?: SipRegion|value-of<SipRegion>,
     *   statusCallback?: string,
     *   statusCallbackEvent?: string,
     *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
     *   statusCallbacks?: list<string>,
     *   timeLimit?: int,
     *   timeoutSeconds?: int,
     *   trim?: Trim|value-of<Trim>,
     * }|TexmlInitiateAICallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlInitiateAICallResponse>
     *
     * @throws APIException
     */
    public function initiateAICall(
        string $connectionID,
        array|TexmlInitiateAICallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlInitiateAICallParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['texml/ai_calls/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: TexmlInitiateAICallResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a TeXML secret which can be later used as a Dynamic Parameter for TeXML when using Mustache Templates in your TeXML. In your TeXML you will be able to use your secret name, and this name will be replaced by the actual secret value when processing the TeXML on Telnyx side.  The secrets are not visible in any logs.
     *
     * @param array{name: string, value: string}|TexmlSecretsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlSecretsResponse>
     *
     * @throws APIException
     */
    public function secrets(
        array|TexmlSecretsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlSecretsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'texml/secrets',
            body: (object) $parsed,
            options: $options,
            convert: TexmlSecretsResponse::class,
        );
    }
}
