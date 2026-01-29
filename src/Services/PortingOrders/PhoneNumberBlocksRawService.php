<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberBlocksRawContract;

/**
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange
 * @phpstan-import-type PhoneNumberRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   activationRanges: list<ActivationRange|ActivationRangeShape>,
     *   phoneNumberRange: PhoneNumberRange|PhoneNumberRangeShape,
     * }|PhoneNumberBlockCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberBlockNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberBlockCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|SortShape
     * }|PhoneNumberBlockListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingPhoneNumberBlock>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberBlockListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberBlockDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberBlockDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
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
