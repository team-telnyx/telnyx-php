<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms\Sessions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\Actions\ActionEndResponse;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;
use Telnyx\Rooms\Sessions\Actions\ActionKickResponse;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\UnionMember0 as UnionMember01;
use Telnyx\Rooms\Sessions\Actions\ActionMuteResponse;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteParams\Participants\UnionMember0 as UnionMember02;
use Telnyx\Rooms\Sessions\Actions\ActionUnmuteResponse;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionEndResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function end(
        string $roomSessionID,
        ?RequestOptions $requestOptions = null
    ): ActionEndResponse;

    /**
     * @api
     *
     * @return ActionEndResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function endRaw(
        string $roomSessionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): ActionEndResponse;

    /**
     * @api
     *
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param UnionMember0|list<string>|value-of<UnionMember0> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @return ActionKickResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function kick(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionKickResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function kickRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionKickResponse;

    /**
     * @api
     *
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param UnionMember01|list<string>|value-of<UnionMember01> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @return ActionMuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function mute(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionMuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function muteRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionMuteResponse;

    /**
     * @api
     *
     * @param list<string> $exclude list of participant id to exclude from the action
     * @param UnionMember02|list<string>|value-of<UnionMember02> $participants either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant
     *
     * @return ActionUnmuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function unmute(
        string $roomSessionID,
        $exclude = omit,
        $participants = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionUnmuteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function unmuteRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUnmuteResponse;
}
