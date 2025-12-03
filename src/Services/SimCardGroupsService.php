<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SimCardGroupsContract;
use Telnyx\Services\SimCardGroups\ActionsService;
use Telnyx\SimCardGroups\SimCardGroupCreateParams;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListParams;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupRetrieveParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

final class SimCardGroupsService implements SimCardGroupsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a new SIM card group object
     *
     * @param array{
     *   name: string, data_limit?: array{amount?: string, unit?: string}
     * }|SimCardGroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SimCardGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupNewResponse {
        [$parsed, $options] = SimCardGroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'sim_card_groups',
            body: (object) $parsed,
            options: $options,
            convert: SimCardGroupNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the details regarding a specific SIM card group
     *
     * @param array{include_iccids?: bool}|SimCardGroupRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardGroupRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupGetResponse {
        [$parsed, $options] = SimCardGroupRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['sim_card_groups/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: SimCardGroupGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a SIM card group
     *
     * @param array{
     *   data_limit?: array{amount?: string, unit?: string}, name?: string
     * }|SimCardGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SimCardGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardGroupUpdateResponse {
        [$parsed, $options] = SimCardGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['sim_card_groups/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: SimCardGroupUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all SIM card groups belonging to the user that match the given filters.
     *
     * @param array{
     *   filter_name_?: string,
     *   filter_private_wireless_gateway_id_?: string,
     *   filter_wireless_blocklist_id_?: string,
     *   page_number_?: int,
     *   page_size_?: int,
     * }|SimCardGroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SimCardGroupListParams $params,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupListResponse {
        [$parsed, $options] = SimCardGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'sim_card_groups',
            query: $parsed,
            options: $options,
            convert: SimCardGroupListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a SIM card group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardGroupDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['sim_card_groups/%1$s', $id],
            options: $requestOptions,
            convert: SimCardGroupDeleteResponse::class,
        );
    }
}
