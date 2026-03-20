<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\BusinessAccounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\BusinessAccounts\PhoneNumbersRawContract;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberInitializeVerificationParams;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberInitializeVerificationParams\VerificationMethod;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberListParams;
use Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersRawService implements PhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List phone numbers for a WABA
     *
     * @param string $id Whatsapp Business Account ID
     * @param array{pageNumber?: int, pageSize?: int}|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|PhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/whatsapp/business_accounts/%1$s/phone_numbers', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PhoneNumberListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Initialize Whatsapp phone number verification
     *
     * @param string $id Whatsapp Business Account ID
     * @param array{
     *   displayName: string,
     *   phoneNumber: string,
     *   language?: string,
     *   verificationMethod?: VerificationMethod|value-of<VerificationMethod>,
     * }|PhoneNumberInitializeVerificationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function initializeVerification(
        string $id,
        array|PhoneNumberInitializeVerificationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberInitializeVerificationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['v2/whatsapp/business_accounts/%1$s/phone_numbers', $id],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
