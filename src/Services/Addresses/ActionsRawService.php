<?php

declare(strict_types=1);

namespace Telnyx\Services\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsParams;
use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateParams;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Addresses\ActionsRawContract;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Accepts this address suggestion as a new emergency address for Operator Connect and finishes the uploads of the numbers associated with it to Microsoft.
     *
     * @param string $id_ the UUID of the address that should be accepted
     * @param array{id?: string}|ActionAcceptSuggestionsParams $params
     *
     * @return BaseResponse<ActionAcceptSuggestionsResponse>
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $id_,
        array|ActionAcceptSuggestionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionAcceptSuggestionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['addresses/%1$s/actions/accept_suggestions', $id_],
            body: (object) $parsed,
            options: $options,
            convert: ActionAcceptSuggestionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Validates an address for emergency services.
     *
     * @param array{
     *   countryCode: string,
     *   postalCode: string,
     *   streetAddress: string,
     *   administrativeArea?: string,
     *   extendedAddress?: string,
     *   locality?: string,
     * }|ActionValidateParams $params
     *
     * @return BaseResponse<ActionValidateResponse>
     *
     * @throws APIException
     */
    public function validate(
        array|ActionValidateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ActionValidateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'addresses/actions/validate',
            body: (object) $parsed,
            options: $options,
            convert: ActionValidateResponse::class,
        );
    }
}
