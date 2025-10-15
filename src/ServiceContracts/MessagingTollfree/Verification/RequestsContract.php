<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingTollfree\Verification;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingTollfree\Verification\Requests\RequestCreateParams\EntityType;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListResponse;
use Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber;
use Telnyx\MessagingTollfree\Verification\Requests\TfVerificationStatus;
use Telnyx\MessagingTollfree\Verification\Requests\URL;
use Telnyx\MessagingTollfree\Verification\Requests\UseCaseCategories;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestEgress;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestStatus;
use Telnyx\MessagingTollfree\Verification\Requests\Volume;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface RequestsContract
{
    /**
     * @api
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
     * @param list<URL> $optInWorkflowImageURLs Images showing the opt-in workflow
     * @param list<TfPhoneNumber> $phoneNumbers The phone numbers to request the verification of
     * @param string $productionMessageContent An example of a message that will be sent from the given phone numbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase Tollfree usecase categories
     * @param string $useCaseSummary Human-readable summary of the desired use-case
     * @param bool $ageGatedContent Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     * @param string $businessAddr2 Line 2 of the business address
     * @param string|null $businessRegistrationCountry ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     * @param string|null $businessRegistrationNumber Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     * @param string|null $businessRegistrationType Type of business registration being provided. Required from January 2026.
     * @param string|null $doingBusinessAs Doing Business As (DBA) name if different from legal name
     * @param EntityType|value-of<EntityType>|null $entityType Business entity classification
     * @param string|null $helpMessageResponse The message returned when users text 'HELP'
     * @param string|null $optInConfirmationResponse Message sent to users confirming their opt-in to receive messages
     * @param string|null $optInKeywords Keywords used to collect and process consumer opt-ins
     * @param string|null $privacyPolicyURL URL pointing to the business's privacy policy. Plain string, no URL format validation.
     * @param string|null $termsAndConditionURL URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
     *
     * @throws APIException
     */
    public function create(
        $additionalInformation,
        $businessAddr1,
        $businessCity,
        $businessContactEmail,
        $businessContactFirstName,
        $businessContactLastName,
        $businessContactPhone,
        $businessName,
        $businessState,
        $businessZip,
        $corporateWebsite,
        $isvReseller,
        $messageVolume,
        $optInWorkflow,
        $optInWorkflowImageURLs,
        $phoneNumbers,
        $productionMessageContent,
        $useCase,
        $useCaseSummary,
        $ageGatedContent = omit,
        $businessAddr2 = omit,
        $businessRegistrationCountry = omit,
        $businessRegistrationNumber = omit,
        $businessRegistrationType = omit,
        $doingBusinessAs = omit,
        $entityType = omit,
        $helpMessageResponse = omit,
        $optInConfirmationResponse = omit,
        $optInKeywords = omit,
        $privacyPolicyURL = omit,
        $termsAndConditionURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress;

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
    ): VerificationRequestEgress;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestStatus;

    /**
     * @api
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
     * @param list<URL> $optInWorkflowImageURLs Images showing the opt-in workflow
     * @param list<TfPhoneNumber> $phoneNumbers The phone numbers to request the verification of
     * @param string $productionMessageContent An example of a message that will be sent from the given phone numbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase Tollfree usecase categories
     * @param string $useCaseSummary Human-readable summary of the desired use-case
     * @param bool $ageGatedContent Indicates if messaging content requires age gating (e.g., 18+). Defaults to false if not provided.
     * @param string $businessAddr2 Line 2 of the business address
     * @param string|null $businessRegistrationCountry ISO 3166-1 alpha-2 country code of the issuing business authority. Must be exactly 2 letters. Automatically converted to uppercase. Required from January 2026.
     * @param string|null $businessRegistrationNumber Official business registration number (e.g., Employer Identification Number (EIN) in the U.S.). Required from January 2026.
     * @param string|null $businessRegistrationType Type of business registration being provided. Required from January 2026.
     * @param string|null $doingBusinessAs Doing Business As (DBA) name if different from legal name
     * @param \Telnyx\MessagingTollfree\Verification\Requests\RequestUpdateParams\EntityType|value-of<\Telnyx\MessagingTollfree\Verification\Requests\RequestUpdateParams\EntityType>|null $entityType Business entity classification
     * @param string|null $helpMessageResponse The message returned when users text 'HELP'
     * @param string|null $optInConfirmationResponse Message sent to users confirming their opt-in to receive messages
     * @param string|null $optInKeywords Keywords used to collect and process consumer opt-ins
     * @param string|null $privacyPolicyURL URL pointing to the business's privacy policy. Plain string, no URL format validation.
     * @param string|null $termsAndConditionURL URL pointing to the business's terms and conditions. Plain string, no URL format validation.
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $additionalInformation,
        $businessAddr1,
        $businessCity,
        $businessContactEmail,
        $businessContactFirstName,
        $businessContactLastName,
        $businessContactPhone,
        $businessName,
        $businessState,
        $businessZip,
        $corporateWebsite,
        $isvReseller,
        $messageVolume,
        $optInWorkflow,
        $optInWorkflowImageURLs,
        $phoneNumbers,
        $productionMessageContent,
        $useCase,
        $useCaseSummary,
        $ageGatedContent = omit,
        $businessAddr2 = omit,
        $businessRegistrationCountry = omit,
        $businessRegistrationNumber = omit,
        $businessRegistrationType = omit,
        $doingBusinessAs = omit,
        $entityType = omit,
        $helpMessageResponse = omit,
        $optInConfirmationResponse = omit,
        $optInKeywords = omit,
        $privacyPolicyURL = omit,
        $termsAndConditionURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress;

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
    ): VerificationRequestEgress;

    /**
     * @api
     *
     * @param int $page
     * @param int $pageSize
     *         Request this many records per page
     *
     *         This value is automatically clamped if the provided value is too large
     * @param \DateTimeInterface $dateEnd
     * @param \DateTimeInterface $dateStart
     * @param string $phoneNumber
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $status Tollfree verification status
     *
     * @throws APIException
     */
    public function list(
        $page,
        $pageSize,
        $dateEnd = omit,
        $dateStart = omit,
        $phoneNumber = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): RequestListResponse;

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
    ): RequestListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
