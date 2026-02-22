<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfile;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Rcs;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;

/**
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall
 * @phpstan-import-type RcsShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Rcs
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call as CallShape1
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall as FlashcallShape1
 * @phpstan-import-type RcsShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Rcs as RcsShape1
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS as SMSShape1
 * @phpstan-import-type FilterShape from \Telnyx\VerifyProfiles\VerifyProfileListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VerifyProfilesService implements VerifyProfilesContract
{
    /**
     * @api
     */
    public VerifyProfilesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerifyProfilesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new Verify profile to associate verifications with.
     *
     * @param Call|CallShape $call
     * @param Flashcall|FlashcallShape $flashcall
     * @param Rcs|RcsShape $rcs
     * @param SMS|SMSShape $sms
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        Call|array|null $call = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        Rcs|array|null $rcs = null,
        SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyProfileData {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'call' => $call,
                'flashcall' => $flashcall,
                'language' => $language,
                'rcs' => $rcs,
                'sms' => $sms,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a single Verify profile.
     *
     * @param string $verifyProfileID the identifier of the Verify profile to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($verifyProfileID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Verify profile
     *
     * @param string $verifyProfileID the identifier of the Verify profile to update
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call|CallShape1 $call
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall|FlashcallShape1 $flashcall
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Rcs|RcsShape1 $rcs
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS|SMSShape1 $sms
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call|array|null $call = null,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Rcs|array|null $rcs = null,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyProfileData {
        $params = Util::removeNulls(
            [
                'call' => $call,
                'flashcall' => $flashcall,
                'language' => $language,
                'name' => $name,
                'rcs' => $rcs,
                'sms' => $sms,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($verifyProfileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a paginated list of Verify profiles.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VerifyProfile>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete Verify profile
     *
     * @param string $verifyProfileID the identifier of the Verify profile to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($verifyProfileID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new Verify profile message template.
     *
     * @param string $text the text content of the message template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createTemplate(
        string $text,
        RequestOptions|array|null $requestOptions = null
    ): MessageTemplate {
        $params = Util::removeNulls(['text' => $text]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createTemplate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Verify profile message templates.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        RequestOptions|array|null $requestOptions = null
    ): VerifyProfileGetTemplatesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveTemplates(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing Verify profile message template.
     *
     * @param string $templateID the identifier of the message template to update
     * @param string $text the text content of the message template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        string $text,
        RequestOptions|array|null $requestOptions = null,
    ): MessageTemplate {
        $params = Util::removeNulls(['text' => $text]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateTemplate($templateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
