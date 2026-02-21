<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDDeleteResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDGetResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDListResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AlphanumericSenderIDsContract
{
    /**
     * @api
     *
     * @param string $alphanumericSenderID the alphanumeric sender ID string
     * @param string $messagingProfileID the messaging profile to associate the sender ID with
     * @param string $usLongCodeFallback a US long code number to use as fallback when sending to US destinations
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $alphanumericSenderID,
        string $messagingProfileID,
        ?string $usLongCodeFallback = null,
        RequestOptions|array|null $requestOptions = null,
    ): AlphanumericSenderIDNewResponse;

    /**
     * @api
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AlphanumericSenderIDGetResponse;

    /**
     * @api
     *
     * @param string $filterMessagingProfileID filter by messaging profile ID
     * @param int $pageNumber page number
     * @param int $pageSize page size
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AlphanumericSenderIDListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterMessagingProfileID = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AlphanumericSenderIDDeleteResponse;
}
