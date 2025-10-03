<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersContract;
use Telnyx\Services\PhoneNumbers\ActionsService;
use Telnyx\Services\PhoneNumbers\CsvDownloadsService;
use Telnyx\Services\PhoneNumbers\JobsService;
use Telnyx\Services\PhoneNumbers\MessagingService;
use Telnyx\Services\PhoneNumbers\VoicemailService;
use Telnyx\Services\PhoneNumbers\VoiceService;

use const Telnyx\Core\OMIT as omit;

final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @@api
     */
    public CsvDownloadsService $csvDownloads;

    /**
     * @@api
     */
    public JobsService $jobs;

    /**
     * @@api
     */
    public MessagingService $messaging;

    /**
     * @@api
     */
    public VoiceService $voice;

    /**
     * @@api
     */
    public VoicemailService $voicemail;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
        $this->csvDownloads = new CsvDownloadsService($client);
        $this->jobs = new JobsService($client);
        $this->messaging = new MessagingService($client);
        $this->voice = new VoiceService($client);
        $this->voicemail = new VoicemailService($client);
    }

    /**
     * @api
     *
     * Retrieve a phone number
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: PhoneNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a phone number
     *
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with the phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $externalPin If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled indicates whether HD voice is enabled for this number
     * @param list<string> $tags a list of user-assigned tags to help organize phone numbers
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $billingGroupID = omit,
        $connectionID = omit,
        $customerReference = omit,
        $externalPin = omit,
        $hdVoiceEnabled = omit,
        $tags = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse {
        $params = [
            'billingGroupID' => $billingGroupID,
            'connectionID' => $connectionID,
            'customerReference' => $customerReference,
            'externalPin' => $externalPin,
            'hdVoiceEnabled' => $hdVoiceEnabled,
            'tags' => $tags,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberUpdateResponse {
        [$parsed, $options] = PhoneNumberUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['phone_numbers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): PhoneNumberListResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers',
            query: $parsed,
            options: $options,
            convert: PhoneNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a phone number
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['phone_numbers/%1$s', $id],
            options: $requestOptions,
            convert: PhoneNumberDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * List phone numbers, This endpoint is a lighter version of the /phone_numbers endpoint having higher performance and rate limit.
     *
     * @param Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param bool $includeConnection include the connection associated with the phone number
     * @param bool $includeTags include the tags associated with the phone number
     * @param Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort|value-of<Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function slimList(
        $filter = omit,
        $includeConnection = omit,
        $includeTags = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberSlimListResponse {
        $params = [
            'filter' => $filter,
            'includeConnection' => $includeConnection,
            'includeTags' => $includeTags,
            'page' => $page,
            'sort' => $sort,
        ];

        return $this->slimListRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function slimListRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberSlimListResponse {
        [$parsed, $options] = PhoneNumberSlimListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers/slim',
            query: $parsed,
            options: $options,
            convert: PhoneNumberSlimListResponse::class,
        );
    }
}
