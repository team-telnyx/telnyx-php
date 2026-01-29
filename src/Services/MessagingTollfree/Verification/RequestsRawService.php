<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingTollfree\Verification;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPaginationForMessagingTollfree;
use Telnyx\MessagingTollfree\Verification\Requests\RequestCreateParams;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListParams;
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
use Telnyx\ServiceContracts\MessagingTollfree\Verification\RequestsRawContract;

/**
 * @phpstan-import-type URLShape from \Telnyx\MessagingTollfree\Verification\Requests\URL
 * @phpstan-import-type TfPhoneNumberShape from \Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RequestsRawService implements RequestsRawContract
{
    // @phpstan-ignore-next-line
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
     *   optInWorkflowImageURLs: list<URL|URLShape>,
     *   phoneNumbers: list<TfPhoneNumber|TfPhoneNumberShape>,
     *   productionMessageContent: string,
     *   useCase: value-of<UseCaseCategories>,
     *   useCaseSummary: string,
     *   ageGatedContent?: bool,
     *   businessAddr2?: string,
     *   businessRegistrationCountry?: string|null,
     *   businessRegistrationNumber?: string|null,
     *   businessRegistrationType?: string|null,
     *   campaignVerifyAuthorizationToken?: string|null,
     *   doingBusinessAs?: string|null,
     *   entityType?: TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null,
     *   helpMessageResponse?: string|null,
     *   optInConfirmationResponse?: string|null,
     *   optInKeywords?: string|null,
     *   privacyPolicyURL?: string|null,
     *   termsAndConditionURL?: string|null,
     *   webhookURL?: string,
     * }|RequestCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationRequestEgress>
     *
     * @throws APIException
     */
    public function create(
        array|RequestCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequestCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationRequestStatus>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   optInWorkflowImageURLs: list<URL|URLShape>,
     *   phoneNumbers: list<TfPhoneNumber|TfPhoneNumberShape>,
     *   productionMessageContent: string,
     *   useCase: value-of<UseCaseCategories>,
     *   useCaseSummary: string,
     *   ageGatedContent?: bool,
     *   businessAddr2?: string,
     *   businessRegistrationCountry?: string|null,
     *   businessRegistrationNumber?: string|null,
     *   businessRegistrationType?: string|null,
     *   campaignVerifyAuthorizationToken?: string|null,
     *   doingBusinessAs?: string|null,
     *   entityType?: TollFreeVerificationEntityType|value-of<TollFreeVerificationEntityType>|null,
     *   helpMessageResponse?: string|null,
     *   optInConfirmationResponse?: string|null,
     *   optInKeywords?: string|null,
     *   privacyPolicyURL?: string|null,
     *   termsAndConditionURL?: string|null,
     *   webhookURL?: string,
     * }|RequestUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationRequestEgress>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequestUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequestUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   pageSize: int,
     *   dateEnd?: \DateTimeInterface,
     *   dateStart?: \DateTimeInterface,
     *   phoneNumber?: string,
     *   status?: value-of<TfVerificationStatus>,
     * }|RequestListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPaginationForMessagingTollfree<VerificationRequestStatus,>,>
     *
     * @throws APIException
     */
    public function list(
        array|RequestListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequestListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging_tollfree/verification/requests',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageSize' => 'page_size',
                    'dateEnd' => 'date_end',
                    'dateStart' => 'date_start',
                    'phoneNumber' => 'phone_number',
                ],
            ),
            options: $options,
            convert: VerificationRequestStatus::class,
            page: DefaultPaginationForMessagingTollfree::class,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['messaging_tollfree/verification/requests/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
