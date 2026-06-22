<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumberBatches\DirPhoneNumberStatus;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatch;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListParams;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\PhoneNumberBatchesRawContract;

/**
 * Phone numbers are submitted to Telnyx for vetting in batches. Batches group all numbers added in a single request under the same Letter of Authorization.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberBatchesRawService implements PhoneNumberBatchesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a single phone-number batch by id. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $batchID the batch id (lowercase UUID)
     * @param array{dirID: string}|PhoneNumberBatchRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberBatchGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $batchID,
        array|PhoneNumberBatchRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberBatchRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $dirID = $parsed['dirID'];
        unset($parsed['dirID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/phone_number_batches/%2$s', $dirID, $batchID],
            options: $options,
            convert: PhoneNumberBatchGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List the phone-number batches submitted under a DIR. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   filterStatus?: value-of<DirPhoneNumberStatus>,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|PhoneNumberBatchListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberBatch>>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        array|PhoneNumberBatchListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberBatchListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/phone_number_batches', $dirID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterStatus' => 'filter[status]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: PhoneNumberBatch::class,
            page: DefaultFlatPagination::class,
        );
    }
}
