<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Conferences\Conference;
use Telnyx\Conferences\ConferenceCreateParams\BeepEnabled;
use Telnyx\Conferences\ConferenceCreateParams\Region;
use Telnyx\Conferences\ConferenceGetResponse;
use Telnyx\Conferences\ConferenceListParams\Filter;
use Telnyx\Conferences\ConferenceListParams\Page;
use Telnyx\Conferences\ConferenceListParticipantsResponse;
use Telnyx\Conferences\ConferenceNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Conferences\ConferenceListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Conferences\ConferenceListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\Conferences\ConferenceListParticipantsParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\Conferences\ConferenceListParticipantsParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param Region|value-of<Region> $region Sets the region where the conference data will be hosted. Defaults to the region defined in user's data locality settings (Europe or US).
     * @param bool $startConferenceOnCreate Whether the conference should be started on creation. If the conference isn't started all participants that join are automatically put on hold. Defaults to "true".
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $callControlID,
        string $name,
        BeepEnabled|string $beepEnabled = 'never',
        ?string $clientState = null,
        bool $comfortNoise = true,
        ?string $commandID = null,
        ?int $durationMinutes = null,
        ?string $holdAudioURL = null,
        ?string $holdMediaName = null,
        ?int $maxParticipants = null,
        Region|string|null $region = null,
        ?bool $startConferenceOnCreate = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceNewResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the conference by id
     * @param \Telnyx\Conferences\ConferenceRetrieveParams\Region|value-of<\Telnyx\Conferences\ConferenceRetrieveParams\Region> $region Region where the conference data is located
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        \Telnyx\Conferences\ConferenceRetrieveParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConferenceGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param \Telnyx\Conferences\ConferenceListParams\Region|value-of<\Telnyx\Conferences\ConferenceListParams\Region> $region Region where the conference data is located
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Conference>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        \Telnyx\Conferences\ConferenceListParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $conferenceID Uniquely identifies the conference by id
     * @param \Telnyx\Conferences\ConferenceListParticipantsParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering]
     * @param \Telnyx\Conferences\ConferenceListParticipantsParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     * @param \Telnyx\Conferences\ConferenceListParticipantsParams\Region|value-of<\Telnyx\Conferences\ConferenceListParticipantsParams\Region> $region Region where the conference data is located
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ConferenceListParticipantsResponse>
     *
     * @throws APIException
     */
    public function listParticipants(
        string $conferenceID,
        \Telnyx\Conferences\ConferenceListParticipantsParams\Filter|array|null $filter = null,
        \Telnyx\Conferences\ConferenceListParticipantsParams\Page|array|null $page = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        \Telnyx\Conferences\ConferenceListParticipantsParams\Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
