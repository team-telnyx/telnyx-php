<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberBlocksContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param list<ActivationRange> $activationRanges Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     * @param PhoneNumberRange $phoneNumberRange
     */
    public function create(
        string $portingOrderID,
        $activationRanges,
        $phoneNumberRange,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockNewResponse {
        [$parsed, $options] = PhoneNumberBlockCreateParams::parseRequest(
            [
                'activationRanges' => $activationRanges,
                'phoneNumberRange' => $phoneNumberRange,
            ],
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockListResponse {
        [$parsed, $options] = PhoneNumberBlockListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/phone_number_blocks', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberBlockListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a phone number block.
     *
     * @param string $portingOrderID
     */
    public function delete(
        string $id,
        $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberBlockDeleteResponse {
        [$parsed, $options] = PhoneNumberBlockDeleteParams::parseRequest(
            ['portingOrderID' => $portingOrderID],
            $requestOptions
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

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
