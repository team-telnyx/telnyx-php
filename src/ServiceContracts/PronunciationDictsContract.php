<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PronunciationDicts\PronunciationDictGetResponse;
use Telnyx\PronunciationDicts\PronunciationDictListResponse;
use Telnyx\PronunciationDicts\PronunciationDictNewResponse;
use Telnyx\PronunciationDicts\PronunciationDictUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictCreateParams\Item
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictUpdateParams\Item as ItemShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PronunciationDictsContract
{
    /**
     * @api
     *
     * @param list<ItemShape> $items List of pronunciation items (alias or phoneme type). At least one item is required.
     * @param string $name Human-readable name. Must be unique within the organization.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $items,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): PronunciationDictNewResponse;

    /**
     * @api
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PronunciationDictGetResponse;

    /**
     * @api
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param list<ItemShape1> $items updated list of pronunciation items (alias or phoneme type)
     * @param string $name updated dictionary name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $items = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): PronunciationDictUpdateResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20, maximum 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PronunciationDictListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
