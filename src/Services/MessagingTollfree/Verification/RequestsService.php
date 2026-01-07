<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingTollfree\Verification;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPaginationForMessagingTollfree;
use Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber;
use Telnyx\MessagingTollfree\Verification\Requests\TfVerificationStatus;
use Telnyx\MessagingTollfree\Verification\Requests\TollFreeVerificationEntityType;
use Telnyx\MessagingTollfree\Verification\Requests\URL;
use Telnyx\MessagingTollfree\Verification\Requests\UseCaseCategories;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestEgress;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestStatus;
use Telnyx\MessagingTollfree\Verification\Requests\Volume;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingTollfree\Verification\RequestsContract;

/**
 * @phpstan-import-type URLShape from \Telnyx\MessagingTollfree\Verification\Requests\URL
 * @phpstan-import-type TfPhoneNumberShape from \Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RequestsService implements RequestsContract
{
    /**
     * @api
     */
    public RequestsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RequestsRawService($client);
    }

    /**
     * @api
     *
     * Submit a new tollfree verification request
     *
     * @param string $additionalInformation Any additional information
     * @param string $businessAddr1 Line 1 of the business address
     * @param string $businessCity The city of the business address; the first letter should be capitalized
     * @param string $businessContactEmail The email address of the business contact
     * @param string $businessContactFirstName First name of the business contact; there are no specific requirements on formatting
     * @param string $businessContactLastName Last name of the business contact; there are no specific requirements on formatting
     * @param string $businessContactPhone The phone number of the business contact in E.164 format
     * @param string $businessName Name of the business; there are no specific formatting requirements
     * @param string $businessState The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized
     * @param string $businessZip The ZIP code of the business address
     * @param string $corporateWebsite A URL, including the scheme, pointing to the corporate website
     * @param string $isvReseller ISV name
     * @param Volume|value-of<Volume> $messageVolume Message Volume Enums
     * @param string $optInWorkflow Human-readable description of how end users will opt into receiving messages from the given phone numbers
     * @param list<URL|URLShape> $optInWorkflowImageURLs Images showing the opt-in workflow
     * @param list<TfPhoneNumber|TfPhoneNumberShape> $phoneNumbers The phone numbers to request the verification of
     * @param string $productionMessageContent An example of a message that will be sent from the given phone numbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase Tollfree usecase categories
     * @param string $useCaseSummary Human-readable summary of the desired use-case
     * @param bool $ageGatedContent Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     * @param string $businessAddr2 Line 2 of the business address
     * @param string|null $businessRegistrationCountry ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     * @param string|null $businessRegistrationNumber Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     * @param string|null $businessRegistrationType Type of business registration being provided. Required from January 2026.
     * @param string|null $doingBusinessAs Doing Business As (DBA) name if different from legal name
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null $entityType Business entity classification
     * @param string|null $helpMessageResponse The message returned when users text 'HELP'
     * @param string|null $optInConfirmationResponse Message sent to users confirming their opt-in to receive messages
     * @param string|null $optInKeywords Keywords used to collect and process consumer opt-ins
     * @param string|null $privacyPolicyURL URL pointing to the business's privacy policy. Plain string, no URL format validation.
     * @param string|null $termsAndConditionURL URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $additionalInformation,
        string $businessAddr1,
        string $businessCity,
        string $businessContactEmail,
        string $businessContactFirstName,
        string $businessContactLastName,
        string $businessContactPhone,
        string $businessName,
        string $businessState,
        string $businessZip,
        string $corporateWebsite,
        string $isvReseller,
        Volume|string $messageVolume,
        string $optInWorkflow,
        array $optInWorkflowImageURLs,
        array $phoneNumbers,
        string $productionMessageContent,
        UseCaseCategories|string $useCase,
        string $useCaseSummary,
        bool $ageGatedContent = false,
        ?string $businessAddr2 = null,
        ?string $businessRegistrationCountry = null,
        ?string $businessRegistrationNumber = null,
        ?string $businessRegistrationType = null,
        ?string $doingBusinessAs = null,
        TollFreeVerificationEntityType|string|null $entityType = null,
        ?string $helpMessageResponse = null,
        ?string $optInConfirmationResponse = null,
        ?string $optInKeywords = null,
        ?string $privacyPolicyURL = null,
        ?string $termsAndConditionURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationRequestEgress {
        $params = Util::removeNulls(
            [
                'additionalInformation' => $additionalInformation,
                'businessAddr1' => $businessAddr1,
                'businessCity' => $businessCity,
                'businessContactEmail' => $businessContactEmail,
                'businessContactFirstName' => $businessContactFirstName,
                'businessContactLastName' => $businessContactLastName,
                'businessContactPhone' => $businessContactPhone,
                'businessName' => $businessName,
                'businessState' => $businessState,
                'businessZip' => $businessZip,
                'corporateWebsite' => $corporateWebsite,
                'isvReseller' => $isvReseller,
                'messageVolume' => $messageVolume,
                'optInWorkflow' => $optInWorkflow,
                'optInWorkflowImageURLs' => $optInWorkflowImageURLs,
                'phoneNumbers' => $phoneNumbers,
                'productionMessageContent' => $productionMessageContent,
                'useCase' => $useCase,
                'useCaseSummary' => $useCaseSummary,
                'ageGatedContent' => $ageGatedContent,
                'businessAddr2' => $businessAddr2,
                'businessRegistrationCountry' => $businessRegistrationCountry,
                'businessRegistrationNumber' => $businessRegistrationNumber,
                'businessRegistrationType' => $businessRegistrationType,
                'doingBusinessAs' => $doingBusinessAs,
                'entityType' => $entityType,
                'helpMessageResponse' => $helpMessageResponse,
                'optInConfirmationResponse' => $optInConfirmationResponse,
                'optInKeywords' => $optInKeywords,
                'privacyPolicyURL' => $privacyPolicyURL,
                'termsAndConditionURL' => $termsAndConditionURL,
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
     * Get a single verification request by its ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VerificationRequestStatus {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing tollfree verification request. This is particularly useful when there are pending customer actions to be taken.
     *
     * @param string $additionalInformation Any additional information
     * @param string $businessAddr1 Line 1 of the business address
     * @param string $businessCity The city of the business address; the first letter should be capitalized
     * @param string $businessContactEmail The email address of the business contact
     * @param string $businessContactFirstName First name of the business contact; there are no specific requirements on formatting
     * @param string $businessContactLastName Last name of the business contact; there are no specific requirements on formatting
     * @param string $businessContactPhone The phone number of the business contact in E.164 format
     * @param string $businessName Name of the business; there are no specific formatting requirements
     * @param string $businessState The full name of the state (not the 2 letter code) of the business address; the first letter should be capitalized
     * @param string $businessZip The ZIP code of the business address
     * @param string $corporateWebsite A URL, including the scheme, pointing to the corporate website
     * @param string $isvReseller ISV name
     * @param Volume|value-of<Volume> $messageVolume Message Volume Enums
     * @param string $optInWorkflow Human-readable description of how end users will opt into receiving messages from the given phone numbers
     * @param list<URL|URLShape> $optInWorkflowImageURLs Images showing the opt-in workflow
     * @param list<TfPhoneNumber|TfPhoneNumberShape> $phoneNumbers The phone numbers to request the verification of
     * @param string $productionMessageContent An example of a message that will be sent from the given phone numbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase Tollfree usecase categories
     * @param string $useCaseSummary Human-readable summary of the desired use-case
     * @param bool $ageGatedContent Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     * @param string $businessAddr2 Line 2 of the business address
     * @param string|null $businessRegistrationCountry ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     * @param string|null $businessRegistrationNumber Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     * @param string|null $businessRegistrationType Type of business registration being provided. Required from January 2026.
     * @param string|null $doingBusinessAs Doing Business As (DBA) name if different from legal name
     * @param TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null $entityType Business entity classification
     * @param string|null $helpMessageResponse The message returned when users text 'HELP'
     * @param string|null $optInConfirmationResponse Message sent to users confirming their opt-in to receive messages
     * @param string|null $optInKeywords Keywords used to collect and process consumer opt-ins
     * @param string|null $privacyPolicyURL URL pointing to the business's privacy policy. Plain string, no URL format validation.
     * @param string|null $termsAndConditionURL URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $additionalInformation,
        string $businessAddr1,
        string $businessCity,
        string $businessContactEmail,
        string $businessContactFirstName,
        string $businessContactLastName,
        string $businessContactPhone,
        string $businessName,
        string $businessState,
        string $businessZip,
        string $corporateWebsite,
        string $isvReseller,
        Volume|string $messageVolume,
        string $optInWorkflow,
        array $optInWorkflowImageURLs,
        array $phoneNumbers,
        string $productionMessageContent,
        UseCaseCategories|string $useCase,
        string $useCaseSummary,
        bool $ageGatedContent = false,
        ?string $businessAddr2 = null,
        ?string $businessRegistrationCountry = null,
        ?string $businessRegistrationNumber = null,
        ?string $businessRegistrationType = null,
        ?string $doingBusinessAs = null,
        TollFreeVerificationEntityType|string|null $entityType = null,
        ?string $helpMessageResponse = null,
        ?string $optInConfirmationResponse = null,
        ?string $optInKeywords = null,
        ?string $privacyPolicyURL = null,
        ?string $termsAndConditionURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerificationRequestEgress {
        $params = Util::removeNulls(
            [
                'additionalInformation' => $additionalInformation,
                'businessAddr1' => $businessAddr1,
                'businessCity' => $businessCity,
                'businessContactEmail' => $businessContactEmail,
                'businessContactFirstName' => $businessContactFirstName,
                'businessContactLastName' => $businessContactLastName,
                'businessContactPhone' => $businessContactPhone,
                'businessName' => $businessName,
                'businessState' => $businessState,
                'businessZip' => $businessZip,
                'corporateWebsite' => $corporateWebsite,
                'isvReseller' => $isvReseller,
                'messageVolume' => $messageVolume,
                'optInWorkflow' => $optInWorkflow,
                'optInWorkflowImageURLs' => $optInWorkflowImageURLs,
                'phoneNumbers' => $phoneNumbers,
                'productionMessageContent' => $productionMessageContent,
                'useCase' => $useCase,
                'useCaseSummary' => $useCaseSummary,
                'ageGatedContent' => $ageGatedContent,
                'businessAddr2' => $businessAddr2,
                'businessRegistrationCountry' => $businessRegistrationCountry,
                'businessRegistrationNumber' => $businessRegistrationNumber,
                'businessRegistrationType' => $businessRegistrationType,
                'doingBusinessAs' => $doingBusinessAs,
                'entityType' => $entityType,
                'helpMessageResponse' => $helpMessageResponse,
                'optInConfirmationResponse' => $optInConfirmationResponse,
                'optInKeywords' => $optInKeywords,
                'privacyPolicyURL' => $privacyPolicyURL,
                'termsAndConditionURL' => $termsAndConditionURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of previously-submitted tollfree verification requests
     *
     * @param int $pageSize
     *         Request this many records per page
     *
     *         This value is automatically clamped if the provided value is too large
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $status Tollfree verification status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPaginationForMessagingTollfree<VerificationRequestStatus>
     *
     * @throws APIException
     */
    public function list(
        int $page,
        int $pageSize,
        ?\DateTimeInterface $dateEnd = null,
        ?\DateTimeInterface $dateStart = null,
        ?string $phoneNumber = null,
        TfVerificationStatus|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPaginationForMessagingTollfree {
        $params = Util::removeNulls(
            [
                'page' => $page,
                'pageSize' => $pageSize,
                'dateEnd' => $dateEnd,
                'dateStart' => $dateStart,
                'phoneNumber' => $phoneNumber,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a verification request
     *
     * A request may only be deleted when when the request is in the "rejected" state.
     *
     * * `HTTP 200`: request successfully deleted
     * * `HTTP 400`: request exists but can't be deleted (i.e. not rejected)
     * * `HTTP 404`: request unknown or already deleted
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
