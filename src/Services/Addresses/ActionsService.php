<?php

declare(strict_types=1);

namespace Telnyx\Services\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsParams;
use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateParams;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Addresses\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Accepts this address suggestion as a new emergency address for Operator Connect and finishes the uploads of the numbers associated with it to Microsoft.
     *
     * @param array{id?: string}|ActionAcceptSuggestionsParams $params
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $id,
        array|ActionAcceptSuggestionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionAcceptSuggestionsResponse {
        [$parsed, $options] = ActionAcceptSuggestionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['addresses/%1$s/actions/accept_suggestions', $id],
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
     *   country_code: string,
     *   postal_code: string,
     *   street_address: string,
     *   administrative_area?: string,
     *   extended_address?: string,
     *   locality?: string,
     * }|ActionValidateParams $params
     *
     * @throws APIException
     */
    public function validate(
        array|ActionValidateParams $params,
        ?RequestOptions $requestOptions = null
    ): ActionValidateResponse {
        [$parsed, $options] = ActionValidateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'addresses/actions/validate',
            body: (object) $parsed,
            options: $options,
            convert: ActionValidateResponse::class,
        );
    }
}
