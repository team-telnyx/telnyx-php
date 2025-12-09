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
     *   account_sid: string, conference_sid: string
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);
        $conferenceSid = $parsed['conference_sid'];
        unset($parsed['conference_sid']);

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
     *   account_sid: string,
     *   conference_sid: string,
     *   AnnounceMethod?: 'GET'|'POST'|AnnounceMethod,
     *   AnnounceUrl?: string,
     *   BeepOnExit?: bool,
     *   CallSidToCoach?: string,
     *   Coaching?: bool,
     *   EndConferenceOnExit?: bool,
     *   Hold?: bool,
     *   HoldMethod?: 'GET'|'POST'|HoldMethod,
     *   HoldUrl?: string,
     *   Muted?: bool,
     *   WaitUrl?: string,
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);
        $conferenceSid = $parsed['conference_sid'];
        unset($parsed['conference_sid']);

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
                array_flip(['account_sid', 'conference_sid'])
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
     *   account_sid: string, conference_sid: string
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);
        $conferenceSid = $parsed['conference_sid'];
        unset($parsed['conference_sid']);

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
     *   account_sid: string,
     *   AmdStatusCallback?: string,
     *   AmdStatusCallbackMethod?: 'GET'|'POST'|AmdStatusCallbackMethod,
     *   Beep?: 'true'|'false'|'onEnter'|'onExit'|Beep,
     *   CallerId?: string,
     *   CallSidToCoach?: string,
     *   CancelPlaybackOnDetectMessageEnd?: bool,
     *   CancelPlaybackOnMachineDetection?: bool,
     *   Coaching?: bool,
     *   ConferenceRecord?: 'true'|'false'|'record-from-start'|'do-not-record'|ConferenceRecord,
     *   ConferenceRecordingStatusCallback?: string,
     *   ConferenceRecordingStatusCallbackEvent?: string,
     *   ConferenceRecordingStatusCallbackMethod?: 'GET'|'POST'|ConferenceRecordingStatusCallbackMethod,
     *   ConferenceRecordingTimeout?: int,
     *   ConferenceStatusCallback?: string,
     *   ConferenceStatusCallbackEvent?: string,
     *   ConferenceStatusCallbackMethod?: 'GET'|'POST'|ConferenceStatusCallbackMethod,
     *   ConferenceTrim?: 'trim-silence'|'do-not-trim'|ConferenceTrim,
     *   CustomHeaders?: list<array{name: string, value: string}>,
     *   EarlyMedia?: bool,
     *   EndConferenceOnExit?: bool,
     *   From?: string,
     *   MachineDetection?: 'Enable'|'DetectMessageEnd'|MachineDetection,
     *   MachineDetectionSilenceTimeout?: int,
     *   MachineDetectionSpeechEndThreshold?: int,
     *   MachineDetectionSpeechThreshold?: int,
     *   MachineDetectionTimeout?: int,
     *   MaxParticipants?: int,
     *   Muted?: bool,
     *   PreferredCodecs?: string,
     *   Record?: bool,
     *   RecordingChannels?: 'mono'|'dual'|RecordingChannels,
     *   RecordingStatusCallback?: string,
     *   RecordingStatusCallbackEvent?: string,
     *   RecordingStatusCallbackMethod?: 'GET'|'POST'|RecordingStatusCallbackMethod,
     *   RecordingTrack?: 'inbound'|'outbound'|'both'|RecordingTrack,
     *   SipAuthPassword?: string,
     *   SipAuthUsername?: string,
     *   StartConferenceOnEnter?: bool,
     *   StatusCallback?: string,
     *   StatusCallbackEvent?: string,
     *   StatusCallbackMethod?: 'GET'|'POST'|StatusCallbackMethod,
     *   TimeLimit?: int,
     *   timeout_seconds?: int,
     *   To?: string,
     *   Trim?: 'trim-silence'|'do-not-trim'|Trim,
     *   WaitUrl?: string,
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<ParticipantParticipantsResponse> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants',
                $accountSid,
                $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, ['account_sid']),
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
     * @param array{account_sid: string}|ParticipantRetrieveParticipantsParams $params
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
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

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
