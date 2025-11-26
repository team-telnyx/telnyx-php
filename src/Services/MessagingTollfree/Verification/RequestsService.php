<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingTollfree\Verification;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingTollfree\Verification\Requests\RequestCreateParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListResponse;
use Telnyx\MessagingTollfree\Verification\Requests\RequestUpdateParams;
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
     * @param array{
     *   additionalInformation: string,
     *   businessAddr1: string,
     *   businessCity: string,
     *   businessContactEmail: string,
     *   businessContactFirstName: string,
     *   businessContactLastName: string,
     *   businessContactPhone: string,
     *   businessName: string,
     *   businessState: string,
     *   businessZip: string,
     *   corporateWebsite: string,
     *   isvReseller: string,
     *   messageVolume: value-of<Volume>,
     *   optInWorkflow: string,
     *   optInWorkflowImageURLs: list<array{url: string}|URL>,
     *   phoneNumbers: list<array{phoneNumber: string}|TfPhoneNumber>,
     *   productionMessageContent: string,
     *   useCase: value-of<UseCaseCategories>,
     *   useCaseSummary: string,
     *   ageGatedContent?: bool,
     *   businessAddr2?: string,
     *   businessRegistrationCountry?: string|null,
     *   businessRegistrationNumber?: string|null,
     *   businessRegistrationType?: string|null,
     *   doingBusinessAs?: string|null,
     *   entityType?: 'SOLE_PROPRIETOR'|'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|TollFreeVerificationEntityType|null,
     *   helpMessageResponse?: string|null,
     *   optInConfirmationResponse?: string|null,
     *   optInKeywords?: string|null,
     *   privacyPolicyURL?: string|null,
     *   termsAndConditionURL?: string|null,
     *   webhookUrl?: string,
     * }|RequestCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RequestCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): VerificationRequestEgress {
        [$parsed, $options] = RequestCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
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
     * @param array{
     *   additionalInformation: string,
     *   businessAddr1: string,
     *   businessCity: string,
     *   businessContactEmail: string,
     *   businessContactFirstName: string,
     *   businessContactLastName: string,
     *   businessContactPhone: string,
     *   businessName: string,
     *   businessState: string,
     *   businessZip: string,
     *   corporateWebsite: string,
     *   isvReseller: string,
     *   messageVolume: value-of<Volume>,
     *   optInWorkflow: string,
     *   optInWorkflowImageURLs: list<array{url: string}|URL>,
     *   phoneNumbers: list<array{phoneNumber: string}|TfPhoneNumber>,
     *   productionMessageContent: string,
     *   useCase: value-of<UseCaseCategories>,
     *   useCaseSummary: string,
     *   ageGatedContent?: bool,
     *   businessAddr2?: string,
     *   businessRegistrationCountry?: string|null,
     *   businessRegistrationNumber?: string|null,
     *   businessRegistrationType?: string|null,
     *   doingBusinessAs?: string|null,
     *   entityType?: 'SOLE_PROPRIETOR'|'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|TollFreeVerificationEntityType|null,
     *   helpMessageResponse?: string|null,
     *   optInConfirmationResponse?: string|null,
     *   optInKeywords?: string|null,
     *   privacyPolicyURL?: string|null,
     *   termsAndConditionURL?: string|null,
     *   webhookUrl?: string,
     * }|RequestUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequestUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationRequestEgress {
        [$parsed, $options] = RequestUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   page: int,
     *   page_size: int,
     *   date_end?: string|\DateTimeInterface,
     *   date_start?: string|\DateTimeInterface,
     *   phone_number?: string,
     *   status?: value-of<TfVerificationStatus>,
     * }|RequestListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RequestListParams $params,
        ?RequestOptions $requestOptions = null
    ): RequestListResponse {
        [$parsed, $options] = RequestListParams::parseRequest(
            $params,
            $requestOptions,
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['messaging_tollfree/verification/requests/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
