<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\TexmlGetCallRecordingsResponseBody;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;
use Telnyx\Texml\Accounts\Conferences\ConferenceResource;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsJsonParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveRecordingsParams;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConferencesRawContract
{
    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array<string,mixed>|ConferenceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceResource>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conferenceSid,
        array|ConferenceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param array<string,mixed>|ConferenceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceResource>
     *
     * @throws APIException
     */
    public function update(
        string $conferenceSid,
        array|ConferenceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param array<string,mixed>|ConferenceRetrieveConferencesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceGetConferencesResponse>
     *
     * @throws APIException
     */
    public function retrieveConferences(
        string $accountSid,
        array|ConferenceRetrieveConferencesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array<string,mixed>|ConferenceRetrieveRecordingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConferenceGetRecordingsResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array<string,mixed>|ConferenceRetrieveRecordingsJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlGetCallRecordingsResponseBody>
     *
     * @throws APIException
     */
    public function retrieveRecordingsJson(
        string $conferenceSid,
        array|ConferenceRetrieveRecordingsJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
