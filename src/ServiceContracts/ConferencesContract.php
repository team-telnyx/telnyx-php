<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams\Filter;
use Telnyx\Conferences\ConferenceListParams\Page;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceListResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ConferencesContract
{
    /**
     * @api
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $name Name of the conference
     * @param BeepEnabled|value-of<BeepEnabled> $beepEnabled whether a beep sound should be played when participants join and/or leave the conference
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     * @param bool $comfortNoise toggle background comfort noise
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param int $durationMinutes time length (minutes) after which the conference will end
     * @param string $holdAudioURL The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     * @param string $holdMediaName The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     * @param int $maxParticipants The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250
     * @param bool $startConferenceOnCreate Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     *
     * @throws APIException
     */
    public function create(
        $callControlID,
        $name,
        $beepEnabled = omit,
        $clientState = omit,
        $comfortNoise = omit,
        $commandID = omit,
        $durationMinutes = omit,
        $holdAudioURL = omit,
        $holdMediaName = omit,
        $maxParticipants = omit,
        $startConferenceOnCreate = omit,
        ?RequestOptions $requestOptions = null,
    ): ConferenceNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ConferenceListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConferenceListResponse;

    /**
     * @api
     *
     * @param \Telnyx\Conferences\ConferenceListParticipantsParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering]
     * @param \Telnyx\Conferences\ConferenceListParticipantsParams\Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): ConferenceListParticipantsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listParticipantsRaw(
        string $conferenceID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConferenceListParticipantsResponse;
}
