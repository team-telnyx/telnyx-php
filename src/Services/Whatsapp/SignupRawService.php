<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\SignupRawContract;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse;
use Telnyx\Whatsapp\Signup\SignupListParams;
use Telnyx\Whatsapp\Signup\SignupListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SignupRawService implements SignupRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List finished WhatsApp Embedded Signup sessions, with status `SUCCESS` or `FAILURE`, newest first. Use the `errors` of a failed session to see why provisioning stopped.
     *
     * @param array{
     *   filterCreatedAtGte?: \DateTimeInterface,
     *   filterCreatedAtLte?: \DateTimeInterface,
     *   filterCustomerID?: string,
     *   filterWabaID?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|SignupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SignupListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SignupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SignupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'whatsapp/signup',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCreatedAtGte' => 'filter[created_at][gte]',
                    'filterCreatedAtLte' => 'filter[created_at][lte]',
                    'filterCustomerID' => 'filter[customer_id]',
                    'filterWabaID' => 'filter[waba_id]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: SignupListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the current state and status of a WhatsApp Embedded Signup session.
     *
     * @param string $id Signup session ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SignupGetStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['whatsapp/signup/%1$s/status', $id],
            options: $requestOptions,
            convert: SignupGetStatusResponse::class,
        );
    }
}
