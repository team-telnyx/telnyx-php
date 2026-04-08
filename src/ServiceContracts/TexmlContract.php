<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
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
use Telnyx\Texml\TexmlSecretsResponse;

/**
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\TexmlInitiateAICallParams\CustomHeader
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TexmlContract
{
    /**
     * @api
     *
     * @param string $connectionID the ID of the TeXML connection to use for the call
     * @param string $aiAssistantID the ID of the AI assistant to use for the call
     * @param string $from The phone number of the party initiating the call. Phone numbers are formatted with a `+` and country code.
     * @param string $to The phone number of the called party. Phone numbers are formatted with a `+` and country code.
     * @param array<string,string> $aiAssistantDynamicVariables key-value map of dynamic variables to pass to the AI assistant
     * @param string $aiAssistantVersion the version of the AI assistant to use
     * @param bool $asyncAmd Select whether to perform answering machine detection in the background. By default execution is blocked until Answering Machine Detection is completed.
     * @param string $asyncAmdStatusCallback URL destination for Telnyx to send AMD callback events to for the call
     * @param AsyncAmdStatusCallbackMethod|value-of<AsyncAmdStatusCallbackMethod> $asyncAmdStatusCallbackMethod HTTP request type used for `AsyncAmdStatusCallback`
     * @param string $callerID To be used as the caller id name (SIP From Display Name) presented to the destination (`To` number). The string should have a maximum of 128 characters, containing only letters, numbers, spaces, and `-_~!.+` special characters. If omitted, the display name will be the same as the number in the `From` field.
     * @param string $conversationCallback URL destination for Telnyx to send conversation callback events to
     * @param ConversationCallbackMethod|value-of<ConversationCallbackMethod> $conversationCallbackMethod HTTP request type used for `ConversationCallback`
     * @param list<string> $conversationCallbacks an array of URL destinations for conversation callback events
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders Custom HTTP headers to be sent with the call. Each header should be an object with 'name' and 'value' properties.
     * @param DetectionMode|value-of<DetectionMode> $detectionMode allows you to choose between Premium and Standard detections
     * @param MachineDetection|value-of<MachineDetection> $machineDetection enables Answering Machine Detection
     * @param int $machineDetectionSilenceTimeout If initial silence duration is greater than this value, consider it a machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechEndThreshold Silence duration threshold after a greeting message or voice for it be considered human. Ignored when `premium` detection is used.
     * @param int $machineDetectionSpeechThreshold Maximum threshold of a human greeting. If greeting longer than this value, considered machine. Ignored when `premium` detection is used.
     * @param int $machineDetectionTimeout maximum timeout threshold in milliseconds for overall detection
     * @param string $passports a string of passport identifiers to associate with the call
     * @param string $preferredCodecs the list of comma-separated codecs to be offered on a call
     * @param bool $record Whether to record the entire participant's call leg. Defaults to `false`.
     * @param RecordingChannels|value-of<RecordingChannels> $recordingChannels The number of channels in the final recording. Defaults to `mono`.
     * @param string $recordingStatusCallback the URL the recording callbacks will be sent to
     * @param string $recordingStatusCallbackEvent The changes to the recording's state that should generate a call to `RecordingStatusCallback`. Can be: `in-progress`, `completed` and `absent`. Separate multiple values with a space. Defaults to `completed`.
     * @param RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod> $recordingStatusCallbackMethod HTTP request type used for `RecordingStatusCallback`. Defaults to `POST`.
     * @param int $recordingTimeout The number of seconds that Telnyx will wait for the recording to be stopped if silence is detected. The timer only starts when the speech is detected. The minimum value is 0. The default value is 0 (infinite).
     * @param RecordingTrack|value-of<RecordingTrack> $recordingTrack The audio track to record for the call. The default is `both`.
     * @param bool $sendRecordingURL whether to send RecordingUrl in webhooks
     * @param string $sipAuthPassword the password to use for SIP authentication
     * @param string $sipAuthUsername the username to use for SIP authentication
     * @param SipRegion|value-of<SipRegion> $sipRegion defines the SIP region to be used for the call
     * @param string $statusCallback URL destination for Telnyx to send status callback events to for the call
     * @param string $statusCallbackEvent The call events for which Telnyx should send a webhook. Multiple events can be defined when separated by a space. Valid values: initiated, ringing, answered, completed.
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod HTTP request type used for `StatusCallback`
     * @param list<string> $statusCallbacks an array of URL destinations for Telnyx to send status callback events to for the call
     * @param int $timeLimit The maximum duration of the call in seconds. The minimum value is 30 and the maximum value is 14400 (4 hours). Default is 14400 seconds.
     * @param int $timeoutSeconds The number of seconds to wait for the called party to answer the call before the call is canceled. The minimum value is 5 and the maximum value is 120. Default is 30 seconds.
     * @param Trim|value-of<Trim> $trim Whether to trim any leading and trailing silence from the recording. Defaults to `trim-silence`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function initiateAICall(
        string $connectionID,
        string $aiAssistantID,
        string $from,
        string $to,
        ?array $aiAssistantDynamicVariables = null,
        ?string $aiAssistantVersion = null,
        bool $asyncAmd = false,
        ?string $asyncAmdStatusCallback = null,
        AsyncAmdStatusCallbackMethod|string $asyncAmdStatusCallbackMethod = 'POST',
        ?string $callerID = null,
        ?string $conversationCallback = null,
        ConversationCallbackMethod|string $conversationCallbackMethod = 'POST',
        ?array $conversationCallbacks = null,
        ?array $customHeaders = null,
        DetectionMode|string $detectionMode = 'Regular',
        MachineDetection|string $machineDetection = 'Disable',
        int $machineDetectionSilenceTimeout = 3500,
        int $machineDetectionSpeechEndThreshold = 800,
        int $machineDetectionSpeechThreshold = 3500,
        int $machineDetectionTimeout = 30000,
        ?string $passports = null,
        ?string $preferredCodecs = null,
        ?bool $record = null,
        RecordingChannels|string|null $recordingChannels = null,
        ?string $recordingStatusCallback = null,
        ?string $recordingStatusCallbackEvent = null,
        RecordingStatusCallbackMethod|string|null $recordingStatusCallbackMethod = null,
        int $recordingTimeout = 0,
        RecordingTrack|string|null $recordingTrack = null,
        bool $sendRecordingURL = true,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
        SipRegion|string $sipRegion = 'US',
        ?string $statusCallback = null,
        string $statusCallbackEvent = 'completed',
        StatusCallbackMethod|string $statusCallbackMethod = 'POST',
        ?array $statusCallbacks = null,
        int $timeLimit = 14400,
        int $timeoutSeconds = 30,
        Trim|string|null $trim = null,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlInitiateAICallResponse;

    /**
     * @api
     *
     * @param string $name Name used as a reference for the secret, if the name already exists within the account its value will be replaced
     * @param string $value Secret value which will be used when rendering the TeXML template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function secrets(
        string $name,
        string $value,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlSecretsResponse;
}
