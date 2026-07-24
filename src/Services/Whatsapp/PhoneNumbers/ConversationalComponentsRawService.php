<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\ConversationalComponentsRawContract;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentListResponse;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type CommandShape from \Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConversationalComponentsRawService implements ConversationalComponentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get phone number conversational components
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationalComponentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'v2/whatsapp/phone_numbers/%1$s/conversational_components', $phoneNumber,
            ],
            options: $requestOptions,
            convert: ConversationalComponentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Update phone number conversational components
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array{
     *   commands?: list<Command|CommandShape>, iceBreakers?: list<string>
     * }|ConversationalComponentPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationalComponentPatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $phoneNumber,
        array|ConversationalComponentPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationalComponentPatchAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'v2/whatsapp/phone_numbers/%1$s/conversational_components', $phoneNumber,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ConversationalComponentPatchAllResponse::class,
        );
    }
}
