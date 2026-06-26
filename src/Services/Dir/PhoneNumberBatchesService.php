<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumberBatches\DirPhoneNumberStatus;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatch;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\PhoneNumberBatchesContract;

/**
 * Phone numbers are submitted to Telnyx for vetting in batches. Batches group all numbers added in a single request under the same Letter of Authorization.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberBatchesService implements PhoneNumberBatchesContract
{
    /**
     * @api
     */
    public PhoneNumberBatchesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberBatchesRawService($client);
    }

    /**
     * @api
     *
     * Get a single phone-number batch by id. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $batchID the batch id (lowercase UUID)
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $batchID,
        string $dirID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberBatchGetResponse {
        $params = Util::removeNulls(['dirID' => $dirID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($batchID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the phone-number batches submitted under a DIR. The enterprise is resolved server-side from the DIR id.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param DirPhoneNumberStatus|value-of<DirPhoneNumberStatus> $filterStatus restrict to batches whose aggregate status equals this value
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberBatch>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        DirPhoneNumberStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterStatus' => $filterStatus,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
