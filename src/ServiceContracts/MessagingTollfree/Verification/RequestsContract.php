<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingTollfree\Verification;

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
     * @param string $businessAddr2 Line 2 of the business address
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
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
        $businessAddr2 = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress;

    /**
     * @api
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
     * @param string $businessAddr2 Line 2 of the business address
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
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
        $businessAddr2 = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
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
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
