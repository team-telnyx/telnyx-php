<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AlphanumericSenderIDs\AlphanumericSenderID;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDDeleteResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDGetResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AlphanumericSenderIDsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AlphanumericSenderIDsService implements AlphanumericSenderIDsContract
{
    /**
     * @api
     */
    public AlphanumericSenderIDsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AlphanumericSenderIDsRawService($client);
    }

    /**
     * @api
     *
     * Create a new alphanumeric sender ID associated with a messaging profile.
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
    ): AlphanumericSenderIDNewResponse {
        $params = Util::removeNulls(
            [
                'alphanumericSenderID' => $alphanumericSenderID,
                'messagingProfileID' => $messagingProfileID,
                'usLongCodeFallback' => $usLongCodeFallback,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific alphanumeric sender ID.
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AlphanumericSenderIDGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all alphanumeric sender IDs for the authenticated user.
     *
     * @param string $filterMessagingProfileID filter by messaging profile ID
     * @param int $pageNumber page number
     * @param int $pageSize page size
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AlphanumericSenderID>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterMessagingProfileID = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterMessagingProfileID' => $filterMessagingProfileID,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an alphanumeric sender ID and disassociate it from its messaging profile.
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AlphanumericSenderIDDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
