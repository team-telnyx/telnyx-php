<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\PayConnectors\PayConnector;
use Telnyx\PayConnectors\PayConnectorCreateParams;
use Telnyx\PayConnectors\PayConnectorCreateParams\Mode;
use Telnyx\PayConnectors\PayConnectorCreateParams\Type;
use Telnyx\PayConnectors\PayConnectorListParams;
use Telnyx\PayConnectors\PayConnectorResponse;
use Telnyx\PayConnectors\PayConnectorUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PayConnectorsRawContract;

/**
 * Generic payment connector configuration.
 *
 * @phpstan-import-type GenericPayConnectorConfigShape from \Telnyx\PayConnectors\GenericPayConnectorConfig
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PayConnectorsRawService implements PayConnectorsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a generic payment connector in the authenticated organization. The name must be unique in that organization. Authentication supplies ownership; do not send user_id or organization_id. Config is encrypted at rest; passwords and tokens are omitted from responses. This operation stores configuration and does not initiate a payment. See the [processor contract](/docs/voice/programmable-voice/pay#request-sent-to-the-payment-processor).
     *
     * @param array{
     *   config: GenericPayConnectorConfigShape,
     *   name: string,
     *   mode?: Mode|value-of<Mode>,
     *   type?: Type|value-of<Type>,
     * }|PayConnectorCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayConnectorResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PayConnectorCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PayConnectorCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'pay_connectors',
            body: (object) $parsed,
            options: $options,
            convert: PayConnectorResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a connector by name within the authenticated organization. Password and token are omitted. A missing name or a connector owned by another organization returns 404.
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayConnectorResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['pay_connectors/%1$s', $name],
            options: $requestOptions,
            convert: PayConnectorResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a generic connector by name in the authenticated organization. Both test and live connectors can be updated through the API. Omitted fields remain unchanged. Supplying config replaces the entire config; it does not merge keys. Include endpoint_url and the credentials required for the selected auth_type on every config replacement. Omitting config preserves existing credentials, allowing a mode-only update. The path name cannot be renamed. Public updates use PATCH.
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param array{
     *   config?: GenericPayConnectorConfigShape,
     *   mode?: PayConnectorUpdateParams\Mode|value-of<PayConnectorUpdateParams\Mode>,
     *   type?: PayConnectorUpdateParams\Type|value-of<PayConnectorUpdateParams\Type>,
     * }|PayConnectorUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayConnectorResponse>
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array|PayConnectorUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PayConnectorUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['pay_connectors/%1$s', $name],
            body: (object) $parsed,
            options: $options,
            convert: PayConnectorResponse::class,
        );
    }

    /**
     * @api
     *
     * List connectors belonging to the authenticated organization, including connectors created by other users in that organization. Set filter[type]=generic to restrict results to the type covered here. Results default to newest created_at first. Use meta.end_cursor as page[after] for the next page, or meta.start_cursor as page[before] for the preceding page. Omit both cursors for the first page; if both are supplied, page[after] takes precedence. Responses omit passwords and tokens.
     *
     * @param array{
     *   filterCreatedAtEq?: string,
     *   filterCreatedAtGt?: string,
     *   filterCreatedAtGte?: string,
     *   filterCreatedAtLt?: string,
     *   filterCreatedAtLte?: string,
     *   filterMode?: string,
     *   filterName?: string,
     *   filterType?: string,
     *   filterUpdatedAtEq?: string,
     *   filterUpdatedAtGt?: string,
     *   filterUpdatedAtGte?: string,
     *   filterUpdatedAtLt?: string,
     *   filterUpdatedAtLte?: string,
     *   pageAfter?: string,
     *   pageBefore?: string,
     *   pageSize?: int,
     *   sort?: string,
     * }|PayConnectorListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBracketCursorPagination<PayConnector>>
     *
     * @throws APIException
     */
    public function list(
        array|PayConnectorListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PayConnectorListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pay_connectors',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCreatedAtEq' => 'filter[created_at][eq]',
                    'filterCreatedAtGt' => 'filter[created_at][gt]',
                    'filterCreatedAtGte' => 'filter[created_at][gte]',
                    'filterCreatedAtLt' => 'filter[created_at][lt]',
                    'filterCreatedAtLte' => 'filter[created_at][lte]',
                    'filterMode' => 'filter[mode]',
                    'filterName' => 'filter[name]',
                    'filterType' => 'filter[type]',
                    'filterUpdatedAtEq' => 'filter[updated_at][eq]',
                    'filterUpdatedAtGt' => 'filter[updated_at][gt]',
                    'filterUpdatedAtGte' => 'filter[updated_at][gte]',
                    'filterUpdatedAtLt' => 'filter[updated_at][lt]',
                    'filterUpdatedAtLte' => 'filter[updated_at][lte]',
                    'pageAfter' => 'page[after]',
                    'pageBefore' => 'page[before]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: PayConnector::class,
            page: EmailBracketCursorPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a connector by name in the authenticated organization. Both test and live connectors can be deleted. Returns no response body on success; a missing name or a connector in another organization returns 404.
     *
     * @param string $name Connector name, not its UUID. URL-encode the name as a path segment.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['pay_connectors/%1$s', $name],
            options: $requestOptions,
            convert: null,
        );
    }
}
