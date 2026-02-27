<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Conferences;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Conferences\ParticipantsRawContract;
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
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\CustomHeader;
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

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type CustomHeaderShape from \Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams\CustomHeader
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ParticipantsRawService implements ParticipantsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Gets conference participant resource
     *
     * @param string $callSidOrParticipantLabel callSid or Label of the Participant to update
     * @param array{
     *   accountSid: string, conferenceSid: string
     * }|ParticipantRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSidOrParticipantLabel,
        array|ParticipantRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ParticipantRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $conferenceSid = $parsed['conferenceSid'];
        unset($parsed['conferenceSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Updates a conference participant
     *
     * @param string $callSidOrParticipantLabel path param: CallSid or Label of the Participant to update
     * @param array{
     *   accountSid: string,
     *   conferenceSid: string,
     *   announceMethod?: AnnounceMethod|value-of<AnnounceMethod>,
     *   announceURL?: string,
     *   beepOnExit?: bool,
     *   callSidToCoach?: string,
     *   coaching?: bool,
     *   endConferenceOnExit?: bool,
     *   hold?: bool,
     *   holdMethod?: HoldMethod|value-of<HoldMethod>,
     *   holdURL?: string,
     *   muted?: bool,
     *   waitURL?: string,
     * }|ParticipantUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSidOrParticipantLabel,
        array|ParticipantUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ParticipantUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $conferenceSid = $parsed['conferenceSid'];
        unset($parsed['conferenceSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Deletes a conference participant
     *
     * @param string $callSidOrParticipantLabel callSid or Label of the Participant to update
     * @param array{
     *   accountSid: string, conferenceSid: string
     * }|ParticipantDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $callSidOrParticipantLabel,
        array|ParticipantDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ParticipantDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);
        $conferenceSid = $parsed['conferenceSid'];
        unset($parsed['conferenceSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
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
    }

    /**
     * @api
     *
     * Dials a new conference participant
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param array{
     *   accountSid: string,
     *   amdStatusCallback?: string,
     *   amdStatusCallbackMethod?: AmdStatusCallbackMethod|value-of<AmdStatusCallbackMethod>,
     *   applicationSid?: string,
     *   beep?: Beep|value-of<Beep>,
     *   callerID?: string,
     *   callSidToCoach?: string,
     *   cancelPlaybackOnDetectMessageEnd?: bool,
     *   cancelPlaybackOnMachineDetection?: bool,
     *   coaching?: bool,
     *   conferenceRecord?: ConferenceRecord|value-of<ConferenceRecord>,
     *   conferenceRecordingStatusCallback?: string,
     *   conferenceRecordingStatusCallbackEvent?: string,
     *   conferenceRecordingStatusCallbackMethod?: ConferenceRecordingStatusCallbackMethod|value-of<ConferenceRecordingStatusCallbackMethod>,
     *   conferenceRecordingTimeout?: int,
     *   conferenceStatusCallback?: string,
     *   conferenceStatusCallbackEvent?: string,
     *   conferenceStatusCallbackMethod?: ConferenceStatusCallbackMethod|value-of<ConferenceStatusCallbackMethod>,
     *   conferenceTrim?: ConferenceTrim|value-of<ConferenceTrim>,
     *   customHeaders?: list<CustomHeader|CustomHeaderShape>,
     *   earlyMedia?: bool,
     *   endConferenceOnExit?: bool,
     *   from?: string,
     *   label?: string,
     *   machineDetection?: MachineDetection|value-of<MachineDetection>,
     *   machineDetectionSilenceTimeout?: int,
     *   machineDetectionSpeechEndThreshold?: int,
     *   machineDetectionSpeechThreshold?: int,
     *   machineDetectionTimeout?: int,
     *   maxParticipants?: int,
     *   muted?: bool,
     *   preferredCodecs?: string,
     *   record?: bool,
     *   recordingChannels?: RecordingChannels|value-of<RecordingChannels>,
     *   recordingStatusCallback?: string,
     *   recordingStatusCallbackEvent?: string,
     *   recordingStatusCallbackMethod?: RecordingStatusCallbackMethod|value-of<RecordingStatusCallbackMethod>,
     *   recordingTrack?: RecordingTrack|value-of<RecordingTrack>,
     *   sipAuthPassword?: string,
     *   sipAuthUsername?: string,
     *   startConferenceOnEnter?: bool,
     *   statusCallback?: string,
     *   statusCallbackEvent?: string,
     *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
     *   timeLimit?: int,
     *   timeoutSeconds?: int,
     *   to?: string,
     *   trim?: Trim|value-of<Trim>,
     *   waitURL?: string,
     * }|ParticipantParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantParticipantsResponse>
     *
     * @throws APIException
     */
    public function participants(
        string $conferenceSid,
        array|ParticipantParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ParticipantParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants',
                $accountSid,
                $conferenceSid,
            ],
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, array_flip(['accountSid'])),
            options: $options,
            convert: ParticipantParticipantsResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists conference participants
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array{accountSid: string}|ParticipantRetrieveParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantGetParticipantsResponse>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $conferenceSid,
        array|ParticipantRetrieveParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ParticipantRetrieveParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Conferences/%2$s/Participants',
                $accountSid,
                $conferenceSid,
            ],
            options: $options,
            convert: ParticipantGetParticipantsResponse::class,
        );
    }
}
