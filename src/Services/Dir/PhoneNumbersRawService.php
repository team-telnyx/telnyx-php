<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams\Document;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListParams;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListParams\Status;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveParams;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\PhoneNumbersRawContract;

/**
 * Associate phone numbers with a verified DIR so calls from those numbers carry the DIR's display identity.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams\Document
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
     * List the phone numbers registered under a DIR. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   pageNumber?: int, pageSize?: int, status?: value-of<Status>
     * }|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
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
            path: ['dir/%1$s/phone_numbers', $dirID],
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
     * Register phone numbers under a DIR. The enterprise is resolved server-side from the DIR id. Same body, failure modes, and batch semantics whichever path form you use.
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   documents: list<Document|DocumentShape>, phoneNumbers: list<string>
     * }|PhoneNumberAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $dirID,
        array|PhoneNumberAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberAddParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/phone_numbers', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Deregister phone numbers from a DIR. The enterprise is resolved server-side from the DIR id. Returns a partial-success envelope.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{phoneNumbers: list<string>}|PhoneNumberRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $dirID,
        array|PhoneNumberRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['dir/%1$s/phone_numbers', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberRemoveResponse::class,
        );
    }
}
