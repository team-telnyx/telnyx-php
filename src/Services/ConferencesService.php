<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Conferences\Conference;
use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceCreateParams\Region;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams\Filter\Product;
use Telnyx\Conferences\ConferenceListParams\Filter\Status;
use Telnyx\Conferences\ConferenceListParams\Filter\Type;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ConferencesContract;
use Telnyx\Services\Conferences\ActionsService;

final class ConferencesService implements ConferencesContract
{
    /**
     * @api
     */
    public ConferencesRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConferencesRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Create a conference from an existing call leg using a `call_control_id` and a conference name. Upon creating the conference, the call will be automatically bridged to the conference. Conferences will expire after all participants have left the conference or after 4 hours regardless of the number of active participants.
     *
     * **Expected Webhooks:**
     *
     * - `conference.created`
     * - `conference.participant.joined`
     * - `conference.participant.left`
     * - `conference.ended`
     * - `conference.recording.saved`
     * - `conference.floor.changed`
     *
     * @param string $callControlID Unique identifier and token for controlling the call
     * @param string $name Name of the conference
     * @param 'always'|'never'|'on_enter'|'on_exit'|BeepEnabled $beepEnabled whether a beep sound should be played when participants join and/or leave the conference
     * @param string $clientState Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string. The client_state will be updated for the creator call leg and will be used for all webhooks related to the created conference.
     * @param bool $comfortNoise toggle background comfort noise
     * @param string $commandID Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     * @param int $durationMinutes time length (minutes) after which the conference will end
     * @param string $holdAudioURL The URL of a file to be played to participants joining the conference. The URL can point to either a WAV or MP3 file. hold_media_name and hold_audio_url cannot be used together in one request. Takes effect only when "start_conference_on_create" is set to "false".
     * @param string $holdMediaName The media_name of a file to be played to participants joining the conference. The media_name must point to a file previously uploaded to api.telnyx.com/v2/media by the same user/organization. The file must either be a WAV or MP3 file. Takes effect only when "start_conference_on_create" is set to "false".
     * @param int $maxParticipants The maximum number of active conference participants to allow. Must be between 2 and 800. Defaults to 250
     * @param 'Australia'|'Europe'|'Middle East'|'US'|Region $region Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param bool $startConferenceOnCreate Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     *
     * @throws APIException
     */
    public function create(
        string $callControlID,
        string $name,
        string|BeepEnabled $beepEnabled = 'never',
        ?string $clientState = null,
        bool $comfortNoise = true,
        ?string $commandID = null,
        ?int $durationMinutes = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?int $maxParticipants = null,
        string|Region|null $region = null,
        ?bool $startConferenceOnCreate = null,
        ?RequestOptions $requestOptions = null,
    ): ConferenceNewResponse {
        $params = [
            'callControlID' => $callControlID,
            'name' => $name,
            'beepEnabled' => $beepEnabled,
            'clientState' => $clientState,
            'comfortNoise' => $comfortNoise,
            'commandID' => $commandID,
            'durationMinutes' => $durationMinutes,
            'holdAudioURL' => $holdAudioURL,
            'holdMediaName' => $holdMediaName,
            'maxParticipants' => $maxParticipants,
            'region' => $region,
            'startConferenceOnCreate' => $startConferenceOnCreate,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an existing conference
     *
     * @param string $id Uniquely identifies the conference by id
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\ConferenceRetrieveParams\Region $region Region where the conference data is located
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        string|\Telnyx\Conferences\ConferenceRetrieveParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): ConferenceGetResponse {
        $params = ['region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conferences. Conferences are created on demand, and will expire after all participants have left the conference or after 4 hours regardless of the number of active participants. Conferences are listed in descending order by `expires_at`.
     *
     * @param array{
     *   applicationName?: array{contains?: string},
     *   applicationSessionID?: string,
     *   connectionID?: string,
     *   failed?: bool,
     *   from?: string,
     *   legID?: string,
     *   name?: string,
     *   occurredAt?: array{
     *     eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *   },
     *   outboundOutboundVoiceProfileID?: string,
     *   product?: 'call_control'|'fax'|'texml'|Product,
     *   status?: 'init'|'in_progress'|'completed'|Status,
     *   to?: string,
     *   type?: 'command'|'webhook'|Type,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status]
     * @param array{
     *   after?: string, before?: string, limit?: int, number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\ConferenceListParams\Region $region Region where the conference data is located
     *
     * @return DefaultPagination<Conference>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|\Telnyx\Conferences\ConferenceListParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page, 'region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists conference participants
     *
     * @param string $conferenceID Uniquely identifies the conference by id
     * @param array{
     *   muted?: bool, onHold?: bool, whispering?: bool
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering]
     * @param array{
     *   after?: string, before?: string, limit?: int, number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param 'Australia'|'Europe'|'Middle East'|'US'|\Telnyx\Conferences\ConferenceListParticipantsParams\Region $region Region where the conference data is located
     *
     * @return DefaultPagination<ConferenceListParticipantsResponse>
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        ?array $filter = null,
        ?array $page = null,
        string|\Telnyx\Conferences\ConferenceListParticipantsParams\Region|null $region = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page, 'region' => $region];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listParticipants($conferenceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
