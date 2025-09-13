<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesContract;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Page;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call as Call1;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall as Flashcall1;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS as SMS1;

use const Telnyx\Core\OMIT as omit;

final class VerifyProfilesService implements VerifyProfilesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new Verify profile to associate verifications with.
     *
     * @param string $name
     * @param Call $call
     * @param Flashcall $flashcall
     * @param string $language
     * @param SMS $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
     *
     * @return VerifyProfileData<HasRawResponse>
     */
    public function create(
        $name,
        $call = omit,
        $flashcall = omit,
        $language = omit,
        $sms = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        [$parsed, $options] = VerifyProfileCreateParams::parseRequest(
            [
                'name' => $name,
                'call' => $call,
                'flashcall' => $flashcall,
                'language' => $language,
                'sms' => $sms,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'verify_profiles',
            body: (object) $parsed,
            options: $options,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * Gets a single Verify profile.
     *
     * @return VerifyProfileData<HasRawResponse>
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            options: $requestOptions,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * Update Verify profile
     *
     * @param Call1 $call
     * @param Flashcall1 $flashcall
     * @param string $language
     * @param string $name
     * @param SMS1 $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
     *
     * @return VerifyProfileData<HasRawResponse>
     */
    public function update(
        string $verifyProfileID,
        $call = omit,
        $flashcall = omit,
        $language = omit,
        $name = omit,
        $sms = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        [$parsed, $options] = VerifyProfileUpdateParams::parseRequest(
            [
                'call' => $call,
                'flashcall' => $flashcall,
                'language' => $language,
                'name' => $name,
                'sms' => $sms,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * Gets a paginated list of Verify profiles.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return VerifyProfileListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileListResponse {
        [$parsed, $options] = VerifyProfileListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'verify_profiles',
            query: $parsed,
            options: $options,
            convert: VerifyProfileListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Verify profile
     *
     * @return VerifyProfileData<HasRawResponse>
     */
    public function delete(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            options: $requestOptions,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * List all Verify profile message templates.
     *
     * @return VerifyProfileGetTemplatesResponse<HasRawResponse>
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'verify_profiles/templates',
            options: $requestOptions,
            convert: VerifyProfileGetTemplatesResponse::class,
        );
    }
}
