<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberBlocksContract;

final class PhoneNumberBlocksService implements PhoneNumberBlocksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new phone number block.
     *
     * @param array{
     *   activation_ranges: list<array{end_at: string, start_at: string}>,
     *   phone_number_range: array{end_at: string, start_at: string},
     * }|PhoneNumberBlockCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberBlockCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockNewResponse {
        [$parsed, $options] = PhoneNumberBlockCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/phone_number_blocks', $portingOrderID],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberBlockNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all phone number blocks of a porting order.
     *
     * @param array{
     *   filter?: array{
     *     activation_status?: 'New'|'Pending'|'Conflict'|'Cancel Pending'|'Failed'|'Concurred'|'Activate RDY'|'Disconnect Pending'|'Concurrence Sent'|'Old'|'Sending'|'Active'|'Cancelled',
     *     phone_number?: list<string>,
     *     portability_status?: 'pending'|'confirmed'|'provisional',
     *     porting_order_id?: list<string>,
     *     status?: 'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|list<'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'>,
     *     support_key?: string|list<string>,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: '-created_at'|'created_at'},
     * }|PhoneNumberBlockListParams $params
     *
     * @return DefaultPagination<PortingPhoneNumberBlock>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = PhoneNumberBlockListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/phone_number_blocks', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: PortingPhoneNumberBlock::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a phone number block.
     *
     * @param array{porting_order_id: string}|PhoneNumberBlockDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberBlockDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockDeleteResponse {
        [$parsed, $options] = PhoneNumberBlockDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['porting_order_id'];
        unset($parsed['porting_order_id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'porting_orders/%1$s/phone_number_blocks/%2$s', $portingOrderID, $id,
            ],
            options: $options,
            convert: PhoneNumberBlockDeleteResponse::class,
        );
    }
}
