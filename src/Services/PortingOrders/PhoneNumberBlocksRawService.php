<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\ActivationStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\PortabilityStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\PortingOrderSingleStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\UnionMember1;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberBlocksRawContract;

final class PhoneNumberBlocksRawService implements PhoneNumberBlocksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new phone number block.
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number block
     * @param array{
     *   activationRanges: list<array{endAt: string, startAt: string}>,
     *   phoneNumberRange: array{endAt: string, startAt: string},
     * }|PhoneNumberBlockCreateParams $params
     *
     * @return BaseResponse<PhoneNumberBlockNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberBlockCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberBlockCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number blocks
     * @param array{
     *   filter?: array{
     *     activationStatus?: 'New'|'Pending'|'Conflict'|'Cancel Pending'|'Failed'|'Concurred'|'Activate RDY'|'Disconnect Pending'|'Concurrence Sent'|'Old'|'Sending'|'Active'|'Cancelled'|ActivationStatus,
     *     phoneNumber?: list<string>,
     *     portabilityStatus?: 'pending'|'confirmed'|'provisional'|PortabilityStatus,
     *     portingOrderID?: list<string>,
     *     status?: 'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|PortingOrderSingleStatus|list<'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|UnionMember1>,
     *     supportKey?: string|list<string>,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: '-created_at'|'created_at'|Value},
     * }|PhoneNumberBlockListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingPhoneNumberBlock>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberBlockListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Identifies the phone number block to be deleted
     * @param array{portingOrderID: string}|PhoneNumberBlockDeleteParams $params
     *
     * @return BaseResponse<PhoneNumberBlockDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberBlockDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberBlockDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line return.type
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
