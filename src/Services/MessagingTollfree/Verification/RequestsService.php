<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingTollfree\Verification;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingTollfree\Verification\Requests\RequestCreateParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListResponse;
use Telnyx\MessagingTollfree\Verification\Requests\RequestUpdateParams;
use Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber;
use Telnyx\MessagingTollfree\Verification\Requests\TfVerificationStatus;
use Telnyx\MessagingTollfree\Verification\Requests\URL;
use Telnyx\MessagingTollfree\Verification\Requests\UseCaseCategories;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestEgress;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestStatus;
use Telnyx\MessagingTollfree\Verification\Requests\Volume;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingTollfree\Verification\RequestsContract;

use const Telnyx\Core\OMIT as omit;

final class RequestsService implements RequestsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param list<URL> $optInWorkflowImageURLs Images showing the opt-in workflow
     * @param list<TfPhoneNumber> $phoneNumbers The phone numbers to request the verification of
     * @param string $productionMessageContent An example of a message that will be sent from the given phone numbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase Tollfree usecase categories
     * @param string $useCaseSummary Human-readable summary of the desired use-case
     * @param string $businessAddr2 Line 2 of the business address
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
     *
     * @return VerificationRequestEgress<HasRawResponse>
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
        $businessAddr2 = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress {
        $params = [
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
            'businessAddr2' => $businessAddr2,
            'webhookURL' => $webhookURL,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerificationRequestEgress<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestEgress {
        [$parsed, $options] = RequestCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'messaging_tollfree/verification/requests',
            body: (object) $parsed,
            options: $options,
            convert: VerificationRequestEgress::class,
        );
    }

    /**
     * @api
     *
     * Get a single verification request by its ID.
     *
     * @return VerificationRequestStatus<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestStatus {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return VerificationRequestStatus<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestStatus {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['messaging_tollfree/verification/requests/%1$s', $id],
            options: $requestOptions,
            convert: VerificationRequestStatus::class,
        );
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
     * @param list<URL> $optInWorkflowImageURLs Images showing the opt-in workflow
     * @param list<TfPhoneNumber> $phoneNumbers The phone numbers to request the verification of
     * @param string $productionMessageContent An example of a message that will be sent from the given phone numbers
     * @param UseCaseCategories|value-of<UseCaseCategories> $useCase Tollfree usecase categories
     * @param string $useCaseSummary Human-readable summary of the desired use-case
     * @param string $businessAddr2 Line 2 of the business address
     * @param string $webhookURL URL that should receive webhooks relating to this verification request
     *
     * @return VerificationRequestEgress<HasRawResponse>
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
        $businessAddr2 = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress {
        $params = [
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
            'businessAddr2' => $businessAddr2,
            'webhookURL' => $webhookURL,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerificationRequestEgress<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestEgress {
        [$parsed, $options] = RequestUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['messaging_tollfree/verification/requests/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: VerificationRequestEgress::class,
        );
    }

    /**
     * @api
     *
     * Get a list of previously-submitted tollfree verification requests
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
     * @return RequestListResponse<HasRawResponse>
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
    ): RequestListResponse {
        $params = [
            'page' => $page,
            'pageSize' => $pageSize,
            'dateEnd' => $dateEnd,
            'dateStart' => $dateStart,
            'phoneNumber' => $phoneNumber,
            'status' => $status,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RequestListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequestListResponse {
        [$parsed, $options] = RequestListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'messaging_tollfree/verification/requests',
            query: $parsed,
            options: $options,
            convert: RequestListResponse::class,
        );
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['messaging_tollfree/verification/requests/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
