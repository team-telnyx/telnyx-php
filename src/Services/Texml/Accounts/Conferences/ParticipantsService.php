<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Conferences;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Conferences\ParticipantsContract;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantDeleteParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\AmdStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Beep;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecord;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceRecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\ConferenceTrim;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\MachineDetection;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingChannels;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingStatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\RecordingTrack;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\Trim;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantRetrieveParticipantsParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\AnnounceMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams\HoldMethod;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateResponse;

final class ParticipantsService implements ParticipantsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Gets conference participant resource
     *
     * @param array{
     *   accountSid: string, conferenceSid: string
     * }|ParticipantRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSidOrParticipantLabel,
        array|ParticipantRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantGetResponse {
        [$parsed, $options] = ParticipantRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $conferenceSid = $parsed['conferenceSid'];
        unset($parsed['conferenceSid']);

        /** @var BaseResponse<ParticipantGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants/%3$s',
                $accountSid,
                $conferenceSid,
                $callSidOrParticipantLabel,
            ],
            options: $options,
            convert: ParticipantGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a conference participant
     *
     * @param array{
     *   accountSid: string,
     *   conferenceSid: string,
     *   announceMethod?: 'GET'|'POST'|AnnounceMethod,
     *   announceURL?: string,
     *   beepOnExit?: bool,
     *   callSidToCoach?: string,
     *   coaching?: bool,
     *   endConferenceOnExit?: bool,
     *   hold?: bool,
     *   holdMethod?: 'GET'|'POST'|HoldMethod,
     *   holdURL?: string,
     *   muted?: bool,
     *   waitURL?: string,
     * }|ParticipantUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callSidOrParticipantLabel,
        array|ParticipantUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantUpdateResponse {
        [$parsed, $options] = ParticipantUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $conferenceSid = $parsed['conferenceSid'];
        unset($parsed['conferenceSid']);

        /** @var BaseResponse<ParticipantUpdateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants/%3$s',
                $accountSid,
                $conferenceSid,
                $callSidOrParticipantLabel,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['accountSid', 'conferenceSid'])
            ),
            options: $options,
            convert: ParticipantUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a conference participant
     *
     * @param array{
     *   accountSid: string, conferenceSid: string
     * }|ParticipantDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $callSidOrParticipantLabel,
        array|ParticipantDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ParticipantDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $conferenceSid = $parsed['conferenceSid'];
        unset($parsed['conferenceSid']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants/%3$s',
                $accountSid,
                $conferenceSid,
                $callSidOrParticipantLabel,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Dials a new conference participant
     *
     * @param array{
     *   accountSid: string,
     *   amdStatusCallback?: string,
     *   amdStatusCallbackMethod?: 'GET'|'POST'|AmdStatusCallbackMethod,
     *   beep?: 'true'|'false'|'onEnter'|'onExit'|Beep,
     *   callerID?: string,
     *   callSidToCoach?: string,
     *   cancelPlaybackOnDetectMessageEnd?: bool,
     *   cancelPlaybackOnMachineDetection?: bool,
     *   coaching?: bool,
     *   conferenceRecord?: 'true'|'false'|'record-from-start'|'do-not-record'|ConferenceRecord,
     *   conferenceRecordingStatusCallback?: string,
     *   conferenceRecordingStatusCallbackEvent?: string,
     *   conferenceRecordingStatusCallbackMethod?: 'GET'|'POST'|ConferenceRecordingStatusCallbackMethod,
     *   conferenceRecordingTimeout?: int,
     *   conferenceStatusCallback?: string,
     *   conferenceStatusCallbackEvent?: string,
     *   conferenceStatusCallbackMethod?: 'GET'|'POST'|ConferenceStatusCallbackMethod,
     *   conferenceTrim?: 'trim-silence'|'do-not-trim'|ConferenceTrim,
     *   customHeaders?: list<array{name: string, value: string}>,
     *   earlyMedia?: bool,
     *   endConferenceOnExit?: bool,
     *   from?: string,
     *   machineDetection?: 'Enable'|'DetectMessageEnd'|MachineDetection,
     *   machineDetectionSilenceTimeout?: int,
     *   machineDetectionSpeechEndThreshold?: int,
     *   machineDetectionSpeechThreshold?: int,
     *   machineDetectionTimeout?: int,
     *   maxParticipants?: int,
     *   muted?: bool,
     *   preferredCodecs?: string,
     *   record?: bool,
     *   recordingChannels?: 'mono'|'dual'|RecordingChannels,
     *   recordingStatusCallback?: string,
     *   recordingStatusCallbackEvent?: string,
     *   recordingStatusCallbackMethod?: 'GET'|'POST'|RecordingStatusCallbackMethod,
     *   recordingTrack?: 'inbound'|'outbound'|'both'|RecordingTrack,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   startConferenceOnEnter?: bool,
     *   statusCallback?: string,
     *   statusCallbackEvent?: string,
     *   statusCallbackMethod?: 'GET'|'POST'|StatusCallbackMethod,
     *   timeLimit?: int,
     *   timeoutSeconds?: int,
     *   to?: string,
     *   trim?: 'trim-silence'|'do-not-trim'|Trim,
     *   waitURL?: string,
     * }|ParticipantParticipantsParams $params
     *
     * @throws APIException
     */
    public function participants(
        string $conferenceSid,
        array|ParticipantParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantParticipantsResponse {
        [$parsed, $options] = ParticipantParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        /** @var BaseResponse<ParticipantParticipantsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants',
                $accountSid,
                $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['accountSid']),
            options: $options,
            convert: ParticipantParticipantsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference participants
     *
     * @param array{accountSid: string}|ParticipantRetrieveParticipantsParams $params
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $conferenceSid,
        array|ParticipantRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantGetParticipantsResponse {
        [$parsed, $options] = ParticipantRetrieveParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        /** @var BaseResponse<ParticipantGetParticipantsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants',
                $accountSid,
                $conferenceSid,
            ],
            options: $options,
            convert: ParticipantGetParticipantsResponse::class,
        );

        return $response->parse();
    }
}
